<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index', ['usuario' => Auth::user()]);
    }

    public function atualizar(Request $request)
    {
        $usuario = Auth::user();

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios')->ignore($usuario->id)],
            'telefone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9()+\-\s]{8,20}$/'],
            'cpf' => ['nullable', 'string', 'regex:/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/'],
        ], [
            'nome.required' => 'Informe seu nome.',
            'nome.max' => 'O nome pode ter no máximo 255 caracteres.',
            'email.required' => 'Informe seu e-mail.',
            'email.email' => 'Informe um e-mail válido.',
            'email.max' => 'O e-mail pode ter no máximo 255 caracteres.',
            'email.unique' => 'Já existe uma conta com este e-mail.',
            'telefone.max' => 'O telefone pode ter no máximo 20 caracteres.',
            'telefone.regex' => 'Informe um telefone válido.',
            'cpf.regex' => 'Informe o CPF no formato 000.000.000-00.',
        ]);

        $usuario->nome = $dados['nome'];
        $usuario->email = $dados['email'];
        $usuario->telefone = $dados['telefone'] ?? null;

        // o CPF só pode ser informado uma vez, depois fica bloqueado
        if (! $usuario->cpf && ! empty($dados['cpf'])) {
            $cpf = preg_replace('/\D/', '', $dados['cpf']);
            $cpfEmUso = $usuario->newQuery()->where('cpf', $cpf)->where('id', '!=', $usuario->id)->exists();
            if ($cpfEmUso) {
                return back()->withErrors(['cpf' => 'Este CPF já está em outra conta.'])->withInput();
            }
            $usuario->cpf = $cpf;
        }

        $usuario->save();

        return redirect()->route('perfil')->with('status', 'Dados atualizados.');
    }

    public function preferencias(Request $request)
    {
        $usuario = Auth::user();
        $usuario->notificacoes_gastos = $request->boolean('notificacoes_gastos');
        $usuario->resumo_semanal = $request->boolean('resumo_semanal');
        $usuario->save();

        return redirect()->route('perfil')->with('status', 'Preferências salvas.');
    }

    public function senha(Request $request)
    {
        $dados = $request->validateWithBag('senha', [
            'senha_atual' => 'required|current_password',
            'nova_senha' => 'required|string|min:8|confirmed',
        ], [
            'senha_atual.required' => 'Informe sua senha atual.',
            'senha_atual.current_password' => 'A senha atual está errada.',
            'nova_senha.required' => 'Informe a nova senha.',
            'nova_senha.min' => 'A nova senha precisa ter pelo menos 8 caracteres.',
            'nova_senha.confirmed' => 'As senhas novas não são iguais.',
        ]);

        $usuario = Auth::user();
        $usuario->senha = Hash::make($dados['nova_senha']);
        $usuario->save();

        return redirect()->route('perfil')->with('status', 'Senha alterada.');
    }
}
