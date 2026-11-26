@extends('layouts.app')

@section('titulo', 'Visão geral')

@section('conteudo')

<div class="dashboard">

    <header class="dashboard-header">
        <div>
            <h1>Visão Geral</h1>
            <p>Bem-vindo de volta, {{ Auth::user()->nome ?? 'Usuário' }}!</p>
        </div>

        <div class="dashboard-date">
            {{ now()->translatedFormat('l, d \d\e F \d\e Y') }}
        </div>
    </header>

    <section class="dashboard-summary">

        <div class="summary-card balance-card">
            <span>Saldo disponível</span>
            <h2>R$ {{ number_format($saldo ?? 0, 2, ',', '.') }}</h2>
            <small>Seu saldo atual</small>
        </div>

        <div class="summary-card">
            <span>Entradas do mês</span>
            <h2>R$ {{ number_format($entradas ?? 0, 2, ',', '.') }}</h2>
            <small>Valores recebidos</small>
        </div>

        <div class="summary-card">
            <span>Saídas do mês</span>
            <h2>R$ {{ number_format($saidas ?? 0, 2, ',', '.') }}</h2>
            <small>Valores gastos</small>
        </div>

    </section>

    <section class="dashboard-actions">

        <h2>Ações rápidas</h2>

        <div class="actions-grid">
            <button type="button">+ Adicionar</button>
            <button type="button">Pagar</button>
            <button type="button">Planejar</button>
            <button type="button">Mais</button>
        </div>

    </section>

    <section class="dashboard-content">

        <div class="dashboard-panel">
            <h2>Insight da Norte</h2>

            <p>
                @if(($saldo ?? 0) > 0)
                    Você possui um saldo positivo. Continue acompanhando
                    suas movimentações para manter sua organização financeira.
                @else
                    Acompanhe suas entradas e saídas para entender melhor
                    sua situação financeira.
                @endif
            </p>
        </div>

        <div class="dashboard-panel">
            <h2>Orçamento do mês</h2>

            <p>
                Total gasto:
                R$ {{ number_format($saidas ?? 0, 2, ',', '.') }}
            </p>

            <p>Os dados do orçamento serão integrados posteriormente.</p>
        </div>

    </section>

    <section class="dashboard-panel movements-panel">

        <h2>Movimentações recentes</h2>

        <div class="movement-header">
            <span>Descrição</span>
            <span>Data</span>
            <span>Valor</span>
        </div>

        @forelse($movimentacoes ?? [] as $movimentacao)

            <div class="movement-row">

                <span>{{ $movimentacao->descricao }}</span>

                <span>
                    {{ \Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y') }}
                </span>

                <span>
                    R$ {{ number_format($movimentacao->valor, 2, ',', '.') }}
                </span>

            </div>

        @empty

            <p>Nenhuma movimentação cadastrada.</p>

        @endforelse

    </section>

</div>

@endsection
