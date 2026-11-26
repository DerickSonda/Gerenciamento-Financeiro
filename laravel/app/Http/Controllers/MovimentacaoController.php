<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MovimentacaoController extends Controller
{
    private $categorias = ['Mercado', 'Alimentação', 'Casa', 'Transporte', 'Saúde', 'Educação', 'Lazer', 'Assinaturas', 'Salário', 'Transferência', 'Outros'];

    public function index(Request $request)
    {
        $usuario = Auth::user();
        $busca = $request->input('busca');
        $tipo = $request->input('tipo');

        $consulta = $usuario->movimentacoes()->orderByDesc('data')->orderByDesc('id');
        if ($busca) {
            $consulta->where('descricao', 'like', '%' . $busca . '%');
        }
        if ($tipo == 'entrada' || $tipo == 'saida') {
            $consulta->where('tipo', $tipo);
        }
        $movimentacoes = $consulta->get();

        $doMes = $usuario->movimentacoes()->whereYear('data', now()->year)->whereMonth('data', now()->month)->get();
        $entradas = $doMes->where('tipo', 'entrada')->sum('valor');
        $saidas = $doMes->where('tipo', 'saida')->sum('valor');

        // compara as entradas com as do mês passado
        $mesPassado = now()->startOfMonth()->subMonth();
        $entradasMesPassado = $usuario->movimentacoes()->where('tipo', 'entrada')
            ->whereYear('data', $mesPassado->year)->whereMonth('data', $mesPassado->month)->sum('valor');
        $variacao = null;
        if ($entradasMesPassado > 0) {
            $variacao = round(($entradas - $entradasMesPassado) / $entradasMesPassado * 100);
        }

        return view('movimentacoes.index', [
            'dias' => $movimentacoes->groupBy(fn ($movimentacao) => $movimentacao->data->format('Y-m-d')),
            'busca' => $busca,
            'tipo' => $tipo,
            'mes' => now()->locale('pt_BR')->translatedFormat('F'),
            'entradas' => $entradas,
            'saidas' => $saidas,
            'lancamentos' => $doMes->where('tipo', 'saida')->count(),
            'variacao' => $variacao,
        ]);
    }

    public function criar(Request $request)
    {
        $movimentacao = new Movimentacao([
            'tipo' => $request->input('tipo') == 'entrada' ? 'entrada' : 'saida',
            'data' => now(),
        ]);

        return view('movimentacoes.form', ['movimentacao' => $movimentacao, 'categorias' => $this->categorias]);
    }

    public function salvar(Request $request)
    {
        $dados = $this->validar($request);

        Auth::user()->movimentacoes()->create($dados);

        return redirect()->route('movimentacoes')->with('status', 'Movimentação adicionada.');
    }

    public function editar(Movimentacao $movimentacao)
    {
        if ($movimentacao->usuario_id != Auth::id()) {
            abort(404);
        }

        return view('movimentacoes.form', ['movimentacao' => $movimentacao, 'categorias' => $this->categorias]);
    }

    public function atualizar(Request $request, Movimentacao $movimentacao)
    {
        if ($movimentacao->usuario_id != Auth::id()) {
            abort(404);
        }

        $movimentacao->update($this->validar($request));

        return redirect()->route('movimentacoes')->with('status', 'Movimentação atualizada.');
    }

    public function excluir(Movimentacao $movimentacao)
    {
        if ($movimentacao->usuario_id != Auth::id()) {
            abort(404);
        }

        $movimentacao->delete();

        return redirect()->route('movimentacoes')->with('status', 'Movimentação excluída.');
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|in:entrada,saida',
            'categoria' => ['required', Rule::in($this->categorias)],
            'valor' => 'required|numeric|min:0.01|max:99999999',
            'data' => 'required|date',
        ], [
            'descricao.required' => 'Informe uma descrição.',
            'descricao.max' => 'A descrição pode ter no máximo 255 caracteres.',
            'tipo.required' => 'Escolha se é uma entrada ou uma saída.',
            'tipo.in' => 'Escolha se é uma entrada ou uma saída.',
            'categoria.required' => 'Escolha uma categoria.',
            'categoria.in' => 'Escolha uma categoria da lista.',
            'valor.required' => 'Informe o valor.',
            'valor.numeric' => 'Informe um valor válido.',
            'valor.min' => 'O valor precisa ser maior que zero.',
            'valor.max' => 'O valor é alto demais.',
            'data.required' => 'Informe a data.',
            'data.date' => 'Informe uma data válida.',
        ]);
    }
}
