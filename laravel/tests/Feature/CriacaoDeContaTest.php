<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CriacaoDeContaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    private function dados(array $mudar = []): array
    {
        return array_merge([
            'nome' => 'Maria Souza',
            'email' => 'maria@email.com',
            'senha' => 'segredo123',
            'termos' => '1',
        ], $mudar);
    }

    public function test_pagina_de_criar_conta_abre(): void
    {
        $this->get('/register')
            ->assertOk()
            ->assertSee('Crie sua conta');
    }

    public function test_cria_conta_e_volta_para_o_login(): void
    {
        $resposta = $this->post('/register', $this->dados());

        $resposta->assertRedirect(route('login'));
        $resposta->assertSessionHas('status');

        $usuario = Usuario::where('email', 'maria@email.com')->first();
        $this->assertNotNull($usuario);
        $this->assertTrue(Hash::check('segredo123', $usuario->senha));
    }

    public function test_nao_deixa_criar_com_email_repetido(): void
    {
        Usuario::create([
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'senha' => Hash::make('segredo123'),
        ]);

        $this->post('/register', $this->dados(['nome' => 'Outra Maria']))
            ->assertSessionHasErrors(['email' => 'Já existe uma conta com este e-mail.']);

        $this->assertSame(1, Usuario::count());
    }

    public function test_senha_curta_da_erro(): void
    {
        $this->post('/register', $this->dados(['senha' => '1234567']))
            ->assertSessionHasErrors(['senha' => 'A senha precisa ter pelo menos 8 caracteres.']);

        $this->assertSame(0, Usuario::count());
    }

    public function test_precisa_aceitar_os_termos(): void
    {
        $dados = $this->dados();
        unset($dados['termos']);

        $this->post('/register', $dados)->assertSessionHasErrors('termos');

        $this->assertSame(0, Usuario::count());
    }

    public function test_conta_criada_consegue_entrar(): void
    {
        $this->post('/register', $this->dados());

        $this->assertTrue(auth()->attempt([
            'email' => 'maria@email.com',
            'password' => 'segredo123',
        ]));
    }
}
