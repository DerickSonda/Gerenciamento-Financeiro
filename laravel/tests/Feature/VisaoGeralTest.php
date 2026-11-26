<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class VisaoGeralTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    private function usuario(): Usuario
    {
        return Usuario::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@email.com',
            'senha' => Hash::make('segredo123'),
        ]);
    }

    public function test_sem_login_vai_para_o_login(): void
    {
        $this->get('/visao-geral')->assertRedirect(route('login'));
    }

    public function test_abre_com_usuario_logado(): void
    {
        $this->actingAs($this->usuario())
            ->get('/visao-geral')
            ->assertOk()
            ->assertSee('Olá, Maria')
            ->assertSee('Saldo disponível');
    }

    public function test_login_leva_para_a_visao_geral(): void
    {
        $this->usuario();

        $this->post('/login', ['email' => 'maria@email.com', 'senha' => 'segredo123'])
            ->assertRedirect(route('visao-geral'));
        $this->assertAuthenticated();
    }

    public function test_rota_que_nao_existe_com_login_volta_para_a_visao_geral(): void
    {
        $this->actingAs($this->usuario())
            ->get('/qualquer-coisa')
            ->assertRedirect(route('visao-geral'));
    }

    public function test_menu_leva_para_a_visao_geral(): void
    {
        $this->actingAs($this->usuario())
            ->get('/perfil')
            ->assertSee('href="' . route('visao-geral') . '"', false);
    }
}
