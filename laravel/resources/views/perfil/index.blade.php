@extends('layouts.app')

@section('titulo', 'Meu perfil')

@section('conteudo')
    <div class="modulo-topo">
        <div>
            <span class="eyebrow">Configurações</span>
            <h1>Meu perfil</h1>
            <small>Gerencie seus dados, preferências e segurança.</small>
        </div>
    </div>

    @if (session('status'))
        <div class="alerta" role="status">{{ session('status') }}</div>
    @endif

    <div class="perfil">
        <aside class="perfil__resumo">
            <span class="perfil__avatar">{{ $usuario->iniciais() }}</span>
            <p>{{ $usuario->nome }}</p>
            <small>{{ $usuario->email }}</small>
            <span class="perfil__plano">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3 1.7 4.8L18 10l-4.3 2.2L12 17l-1.7-4.8L6 10l4.3-2.2Z"/></svg>
                Plano Norte Essencial
            </span>
            <button type="button" disabled title="Em breve">Alterar foto</button>
        </aside>

        <div class="config">
            <h2>Dados pessoais</h2>

            <form action="{{ route('perfil.atualizar') }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                <div class="config__campos">
                    <label>
                        <span>Nome completo</span>
                        <input type="text" name="nome" value="{{ old('nome', $usuario->nome) }}" autocomplete="name" required
                            @error('nome') aria-invalid="true" @enderror>
                        @error('nome') <em class="erro">{{ $message }}</em> @enderror
                    </label>
                    <label>
                        <span>E-mail</span>
                        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" autocomplete="email" required
                            @error('email') aria-invalid="true" @enderror>
                        @error('email') <em class="erro">{{ $message }}</em> @enderror
                    </label>
                    <label>
                        <span>Telefone</span>
                        <input type="tel" name="telefone" value="{{ old('telefone', $usuario->telefone) }}" placeholder="(00) 00000-0000" autocomplete="tel"
                            @error('telefone') aria-invalid="true" @enderror>
                        @error('telefone') <em class="erro">{{ $message }}</em> @enderror
                    </label>
                    <label>
                        <span>CPF</span>
                        @if ($usuario->cpf)
                            <input type="text" value="{{ $usuario->cpfEscondido() }}" disabled>
                        @else
                            <input type="text" name="cpf" value="{{ old('cpf') }}" placeholder="000.000.000-00" inputmode="numeric"
                                @error('cpf') aria-invalid="true" @enderror>
                        @endif
                        @error('cpf') <em class="erro">{{ $message }}</em> @enderror
                    </label>
                </div>
                <button type="submit" class="config__salvar">Salvar alterações</button>
            </form>

            <div class="config__divisoria"></div>

            <h2>Preferências e segurança</h2>

            <form action="{{ route('perfil.preferencias') }}" method="POST" id="formPreferencias">
                @csrf
                @method('PUT')
                <label class="config__linha">
                    <span>
                        <b>Notificações de gastos</b>
                        <small>Receba alertas sobre movimentações importantes.</small>
                    </span>
                    <input type="checkbox" name="notificacoes_gastos" value="1" @checked($usuario->notificacoes_gastos)>
                </label>
                <label class="config__linha">
                    <span>
                        <b>Resumo semanal</b>
                        <small>Uma visão rápida da sua semana financeira.</small>
                    </span>
                    <input type="checkbox" name="resumo_semanal" value="1" @checked($usuario->resumo_semanal)>
                </label>
                <noscript><button type="submit" class="config__salvar">Salvar preferências</button></noscript>
            </form>

            <details class="senha" @if ($errors->senha->any()) open @endif>
                <summary class="senha__botao">
                    <span>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="14" height="11" x="5" y="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                        <b>Alterar minha senha</b>
                    </span>
                    <svg class="senha__seta" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                </summary>

                <form action="{{ route('perfil.senha') }}" method="POST" class="senha__form" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="config__campos">
                        <label>
                            <span>Senha atual</span>
                            <input type="password" name="senha_atual" autocomplete="current-password" required
                                @error('senha_atual', 'senha') aria-invalid="true" @enderror>
                            @error('senha_atual', 'senha') <em class="erro">{{ $message }}</em> @enderror
                        </label>
                        <span class="config__vazio"></span>
                        <label>
                            <span>Nova senha</span>
                            <input type="password" name="nova_senha" placeholder="Mínimo de 8 caracteres" autocomplete="new-password" required
                                @error('nova_senha', 'senha') aria-invalid="true" @enderror>
                            @error('nova_senha', 'senha') <em class="erro">{{ $message }}</em> @enderror
                        </label>
                        <label>
                            <span>Confirmar nova senha</span>
                            <input type="password" name="nova_senha_confirmation" autocomplete="new-password" required>
                        </label>
                    </div>
                    <button type="submit" class="config__salvar">Salvar nova senha</button>
                </form>
            </details>

            <form action="{{ route('usuario.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sair-mobile">Sair da conta</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('#formPreferencias input[type="checkbox"]').forEach((caixa) => {
            caixa.addEventListener('change', () => document.getElementById('formPreferencias').submit());
        });
    </script>
@endpush
