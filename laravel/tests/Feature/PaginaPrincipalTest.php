<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaginaPrincipalTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_pagina_principal_abre(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Um norte para o seu')
            ->assertSee('Clareza para decidir.');
    }

    public function test_tem_links_para_entrar_e_criar_conta(): void
    {
        $this->get('/')
            ->assertSee('href="' . route('login') . '"', false)
            ->assertSee('href="' . route('register') . '"', false);
    }

    public function test_rota_que_nao_existe_volta_para_o_login(): void
    {
        $this->get('/qualquer-coisa')->assertRedirect(route('login'));
    }
}
