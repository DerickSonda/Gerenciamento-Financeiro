<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'saldo' => 0,
            'entradas' => 0,
            'saidas' => 0,
            'movimentacoes' => collect(),
        ]);
    }
}