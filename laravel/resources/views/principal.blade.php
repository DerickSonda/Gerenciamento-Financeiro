<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Norte | Um norte para o seu dinheiro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@700;800&display=swap" rel="stylesheet">
    @vite('resources/css/principal.css')
</head>
<body>
<main class="landing">
    <header class="nav">
        <a href="{{ route('principal') }}" class="logo" aria-label="Norte">
            <span class="logo__mark"><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 24V8l16 16V8"/></svg></span>
            <span class="logo__name">norte</span>
        </a>

        <nav class="nav__links" aria-label="Seções">
            <a href="#recursos">Recursos</a>
            <a href="#seguranca">Segurança</a>
            <a href="#como-funciona">Como funciona</a>
        </nav>

        <div class="nav__actions">
            <a href="{{ route('login') }}" class="nav__login">Entrar</a>
            <a href="{{ route('register') }}" class="btn-cta btn-cta--small">Criar conta</a>
        </div>
    </header>

    <section class="hero">
        <div class="hero__copy">
            <span class="hero__pill">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3 1.7 4.8L18 10l-4.3 2.2L12 17l-1.7-4.8L6 10l4.3-2.2Z"/></svg>
                Sua vida financeira mais leve
            </span>
            <h1 class="hero__title">Um norte para o seu <em>dinheiro.</em></h1>
            <p class="hero__text">Organize seus gastos, planeje seus sonhos e entenda suas finanças sem complicação. Tudo em um só lugar.</p>

            <div class="hero__actions">
                <a href="{{ route('register') }}" class="btn-cta">
                    Começar gratuitamente
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                </a>
                <a href="#recursos" class="hero__demo">
                    <span>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19V9"/><path d="M10 19V5"/><path d="M16 19v-7"/><path d="M22 19H2"/></svg>
                    </span>
                    Ver demonstração
                </a>
            </div>

            <div class="hero__trust">
                <div class="faces" aria-hidden="true">
                    <span>MA</span>
                    <span>JL</span>
                    <span>AS</span>
                </div>
                <p><strong>+20 mil pessoas</strong><br>cuidando melhor do dinheiro</p>
            </div>
        </div>

        <div class="showcase" aria-hidden="true">
            <div class="showcase__glow"></div>

            <div class="float-card float-card--goal">
                <span>
                    <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg>
                </span>
                <div>
                    <small>Meta da viagem</small>
                    <strong>72% concluída</strong>
                </div>
            </div>

            <div class="float-card float-card--saving">
                <span>
                    <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V9"/><path d="M10 19V5"/><path d="M16 19v-7"/><path d="M22 19H2"/></svg>
                </span>
                <div>
                    <small>Economia este mês</small>
                    <strong>+ R$ 840,00</strong>
                </div>
            </div>

            <div class="phone">
                <div class="phone__speaker"></div>
                <div class="phone__screen">
                    <div class="phone__header">
                        <span class="logo">
                            <span class="logo__mark"><svg viewBox="0 0 32 32"><path d="M8 24V8l16 16V8"/></svg></span>
                            <span class="logo__name">norte</span>
                        </span>
                        <span class="phone__avatar">MA</span>
                    </div>

                    <div class="phone__greeting">
                        <small>Boa tarde,</small>
                        <strong>Mariana</strong>
                    </div>

                    <div class="phone__balance">
                        <div>
                            <span>Saldo disponível</span>
                            <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/></svg>
                        </div>
                        <strong>R$ 7.284,50</strong>
                        <div class="phone__balance-row">
                            <span>↗ Entradas <b>R$ 6.250</b></span>
                            <span>↘ Saídas <b>R$ 2.184</b></span>
                        </div>
                    </div>

                    <div class="phone__shortcuts">
                        <span>
                            <i><svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg></i>
                            Adicionar
                        </span>
                        <span>
                            <i><svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v18l3-2 3 2 3-2 3 2V3l-3 2-3-2-3 2Z"/><path d="M9 10h6M9 14h5"/></svg></i>
                            Pagar
                        </span>
                        <span>
                            <i><svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg></i>
                            Planejar
                        </span>
                    </div>

                    <div class="phone__title">
                        <strong>Movimentações</strong>
                        <span>Ver todas</span>
                    </div>

                    <div class="phone__item">
                        <span class="phone__icon phone__icon--coral">C</span>
                        <div>
                            <strong>Casa Verde</strong>
                            <small>Mercado • Hoje</small>
                        </div>
                        <b>− R$ 186,42</b>
                    </div>
                    <div class="phone__item">
                        <span class="phone__icon phone__icon--green">P</span>
                        <div>
                            <strong>Pagamento recebido</strong>
                            <small>Transferência • Ontem</small>
                        </div>
                        <b class="positivo">+ R$ 4.850,00</b>
                    </div>
                    <div class="phone__item">
                        <span class="phone__icon phone__icon--red">N</span>
                        <div>
                            <strong>Netflix</strong>
                            <small>Assinaturas • 12 Mai</small>
                        </div>
                        <b>− R$ 39,90</b>
                    </div>

                    <div class="phone__nav">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg>
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v18l3-2 3 2 3-2 3 2V3l-3 2-3-2-3 2Z"/><path d="M9 10h6M9 14h5"/></svg>
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg>
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="proof">
        <span>Controle simples</span>
        <i></i>
        <span>Dados protegidos</span>
        <i></i>
        <span>Planejamento inteligente</span>
        <i></i>
        <span>Feito para você</span>
    </section>

    <section class="features" id="recursos">
        <div class="features__heading">
            <span class="eyebrow">Tudo que você precisa</span>
            <h2>Clareza para decidir.<br>Liberdade para viver.</h2>
            <p>A Norte traduz números em escolhas simples para você focar no que realmente importa.</p>
        </div>

        <div class="features__grid">
            <article class="card card--featured">
                <span class="card__icon">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12a9 9 0 1 1-9-9v9Z"/><path d="M12 3a9 9 0 0 1 9 9h-9Z"/></svg>
                </span>
                <h3>Veja para onde seu dinheiro vai</h3>
                <p>Categorias automáticas e uma visão clara dos seus hábitos, sem precisar de planilhas.</p>
                <div class="chart">
                    <div class="chart__ring">
                        <span>58%<small>usado</small></span>
                    </div>
                    <div class="chart__legend">
                        <span><i></i>Casa <b>32%</b></span>
                        <span><i class="chart__dot--yellow"></i>Lazer <b>18%</b></span>
                        <span><i class="chart__dot--soft"></i>Outros <b>8%</b></span>
                    </div>
                </div>
            </article>

            <article class="card">
                <span class="card__icon card__icon--coral">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg>
                </span>
                <h3>Transforme sonhos em metas</h3>
                <p>Defina objetivos, acompanhe seu progresso e celebre cada conquista.</p>
                <div class="goal">
                    <span>Reserva de emergência <b>R$ 8.600 de R$ 12.000</b></span>
                    <strong>72%</strong>
                    <i><b></b></i>
                </div>
            </article>

            <article class="card" id="seguranca">
                <span class="card__icon card__icon--blue">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg>
                </span>
                <h3>Segurança em primeiro lugar</h3>
                <p>Seus dados protegidos por criptografia e controle de acesso em todas as etapas.</p>
                <div class="secure">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
                    <span><b>Seus dados estão seguros</b>Criptografia de ponta a ponta</span>
                </div>
            </article>
        </div>
    </section>

    <section class="cta-final" id="como-funciona">
        <span class="eyebrow eyebrow--light">Comece hoje</span>
        <h2>Seu futuro financeiro<br>começa com uma direção.</h2>
        <p>Crie sua conta gratuitamente e dê o primeiro passo.</p>
        <a href="{{ route('register') }}" class="cta-final__btn">
            Criar minha conta
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
        </a>
    </section>
</main>
</body>
</html>
