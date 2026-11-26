<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar conta | Norte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/login.css')
</head>
<body>
<main class="login">
    <section class="brand">
        <span class="brand__ring brand__ring--top" aria-hidden="true"></span>
        <span class="brand__ring brand__ring--bottom" aria-hidden="true"></span>

        <a href="{{ url('/') }}" class="logo" aria-label="Norte">
            <span class="logo__mark">N</span>
            <span class="logo__name">norte</span>
        </a>

        <div class="brand__content">
            <p class="eyebrow eyebrow--light">Seu dinheiro, na direção certa</p>
            <h1 class="brand__title">Clareza hoje.<br>Liberdade amanhã.</h1>
            <p class="brand__text">
                Organize sua vida financeira sem planilhas complicadas e tome decisões melhores todos os dias.
            </p>

            <div class="stat">
                <span class="stat__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M9 20V4M14 20v-8M19 20v-5M3 20h18"/></svg>
                </span>
                <div>
                    <strong class="stat__value">+12% este mês</strong>
                    <span class="stat__label">Economia média dos nossos usuários</span>
                </div>
            </div>
        </div>

        <p class="brand__footer">Simples. Seguro. Feito para você.</p>
    </section>

    <section class="form-side">
        <div class="form-box">
            <a href="{{ url('/') }}" class="back">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
                Voltar
            </a>

            <p class="eyebrow">Comece agora</p>
            <h2 class="form-box__title">Crie sua conta</h2>
            <p class="form-box__subtitle">Leva menos de dois minutos. O futuro agradece.</p>

            <form action="{{ route('usuario.register') }}" method="POST" class="form" novalidate>
                @csrf
                <div class="field">
                    <label for="nome" class="field__label">Nome completo</label>
                    <div class="input">
                        <svg class="input__icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Como podemos te chamar?" autocomplete="name" required
                            @error('nome') aria-invalid="true" aria-describedby="nome-erro" @enderror>
                    </div>
                    @error('nome')
                        <span class="field__error" id="nome-erro">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="email" class="field__label">E-mail</label>
                    <div class="input">
                        <svg class="input__icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="voce@email.com" autocomplete="email" required
                            @error('email') aria-invalid="true" aria-describedby="email-erro" @enderror>
                    </div>
                    @error('email')
                        <span class="field__error" id="email-erro">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="senha" class="field__label">Crie uma senha</label>
                    <div class="input">
                        <svg class="input__icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg>
                        <input type="password" id="senha" name="senha" placeholder="Mínimo de 8 caracteres" autocomplete="new-password" minlength="8" required
                            @error('senha') aria-invalid="true" aria-describedby="senha-erro" @enderror>
                        <button type="button" class="input__toggle" id="toggleSenha" aria-label="Mostrar senha">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('senha')
                        <span class="field__error" id="senha-erro">{{ $message }}</span>
                    @enderror
                </div>

                <div class="terms">
                    <label class="check">
                        <input type="checkbox" name="termos" value="1" @checked(old('termos'))
                            @error('termos') aria-invalid="true" aria-describedby="termos-erro" @enderror>
                        <span>Li e concordo com os <a href="#" class="link">Termos de Uso</a> e a <a href="#" class="link">Política de Privacidade</a>.</span>
                    </label>
                    @error('termos')
                        <span class="field__error" id="termos-erro">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn--primary">
                    Criar minha conta
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </button>
            </form>

            <p class="signup">Já tem uma conta? <a href="{{ route('login') }}" class="link">Entrar</a></p>
        </div>
    </section>
</main>

<script>
    const toggle = document.getElementById('toggleSenha');
    const senha = document.getElementById('senha');
    toggle.addEventListener('click', () => {
        const show = senha.type === 'password';
        senha.type = show ? 'text' : 'password';
        toggle.setAttribute('aria-label', show ? 'Ocultar senha' : 'Mostrar senha');
    });
</script>
</body>
</html>
