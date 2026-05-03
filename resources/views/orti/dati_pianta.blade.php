<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlassAdmin Dashboard - 3D Glassmorphism Dashboard</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/templatemo-glass-admin-style.css') }}">
    <!--

TemplateMo 607 Glass Admin

https://templatemo.com/tm-607-glass-admin

-->
</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">OW</div>
                <span class="logo-text">OrtoWare</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>

                        <!-- PIANTA -->
                        <li class="nav-item">
                            <a href="{{ route('dati_pianta') }}"
                                class="nav-link {{ request()->routeIs('dati_pianta') ? 'active' : '' }}">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <!-- foglia -->
                                    <path d="M5 21c10-2 14-10 14-16C13 5 7 9 5 21z" />
                                    <path d="M5 21c0-7 7-10 14-10" />
                                </svg>
                                Dati Pianta
                            </a>
                        </li>

                        <!-- METEO -->
                        <li class="nav-item">
                            <a href="{{ route('meteo') }}"
                                class="nav-link {{ request()->routeIs('meteo') ? 'active' : '' }}">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <!-- nuvola + sole -->
                                    <circle cx="18" cy="6" r="3" />
                                    <path d="M3 15a4 4 0 0 1 4-4 5 5 0 0 1 9-1 3 3 0 0 1 1 6H5a2 2 0 0 1-2-1z" />
                                </svg>
                                Meteo
                            </a>
                        </li>

                        <!-- ISTRUZIONI -->
                        <li class="nav-item">
                            <a href="{{ route('istruzioni') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <!-- libro / guida -->
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                    <path d="M6.5 2H20v15H6.5A2.5 2.5 0 0 0 4 19.5V4.5A2.5 2.5 0 0 1 6.5 2z" />
                                </svg>
                                Istruzioni
                            </a>
                        </li>

                        <!-- ORTO -->
                        <li class="nav-item">
                            <a href="{{ route('dati_orto') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <!-- piantine multiple -->
                                    <path d="M12 20v-6" />
                                    <path d="M8 20v-4" />
                                    <path d="M16 20v-4" />
                                    <path d="M12 14c4-1 6-4 6-8-4 0-6 3-6 8z" />
                                    <path d="M12 14c-4-1-6-4-6-8 4 0 6 3 6 8z" />
                                </svg>
                                Il Tuo Orto
                            </a>
                        </li>

                        <!-- SETTINGS -->
                        <li class="nav-item">
                            <a href="{{ route('settings') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="3" />
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                                </svg>
                                Settings
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="nav-section-title">Account</span>
                            <ul>
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">
                                        <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                            <polyline points="16 17 21 12 16 7" />
                                            <line x1="21" y1="12" x2="9" y2="12" />
                                        </svg>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="sidebar-footer">
                        <div class="user-profile">
                            <div class="user-avatar">{{ strtoupper(substr(session('utente_nome'), 0, 2)) }}</div>
                            <div class="user-info">
                                <div class="user-name">
                                    {{ session('utente_nome') }}
                                </div>
                                <div class="user-role">Utente</div>
                            </div>
                        </div>
                    </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <nav class="navbar">
                <h1 class="page-title">{{ $nomePianta ?? 'Nessuna pianta' }}</h1>
                <div class="navbar-right">
                    <div class="search-box">
                    </div>

                    @if (session('success'))
                        <div
                            style="margin: 20px 0; padding: 12px; background: #16a34a; color: white; border-radius: 10px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button class="nav-btn" id="theme-toggle" title="Toggle Light/Dark Mode">
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="M4.93 4.93l1.41 1.41" />
                            <path d="M17.66 17.66l1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                            <path d="M6.34 17.66l-1.41 1.41" />
                            <path d="M19.07 4.93l-1.41 1.41" />
                        </svg>
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" style="display: none;">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </button>
                </div>
            </nav>

            @if (!$pianta)
                <section class="settings-grid" style="display:block;">
                    <div class="glass-card"
                        style="max-width: 700px; margin: 40px auto; text-align: center; padding: 35px;">
                        <h2 style="margin-bottom: 15px;">Nessuna pianta disponibile</h2>

                        <p style="line-height: 1.7; margin-bottom: 25px;">
                            Non hai selezionato nessuna pianta dal tuo orto.
                            Aggiungi una pianta per visualizzare i dati rilevati dai sensori e gestire il programma di
                            irrigazione.
                        </p>

                        <a href="{{ route('piante.create') }}" class="card-btn" style="padding: 10px 18px;">
                            Aggiungi pianta
                        </a>
                    </div>
                </section>
            @else
                <!-- Stats Cards -->
                <section class="stats-grid">

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Temperatura</h3>
                                <div class="stat-value">{{ $dati->temperatura ?? 'Nessun dato' }} °C</div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Umidità aria</h3>
                                <div class="stat-value">{{ $dati->umidita_aria ?? 'Nessun dato' }} %</div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Umidità suolo</h3>
                                <div class="stat-value">{{ $dati->suolo ?? 'Nessun dato' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Acqua</h3>
                                <div class="stat-value">{{ $dati->acqua ?? 'Nessun dato' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Relè</h3>
                                <div class="stat-value">
                                    {{ isset($dati->rele) ? ($dati->rele ? 'ACCESO' : 'SPENTO') : 'Nessun dato' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card glass-card-3d stat-card">
                        <div class="stat-card-inner">
                            <div class="stat-info">
                                <h3>Programma irrigazione</h3>

                                @if ($pianta && $pianta->attiva)
                                    <!-- Stato attivo -->
                                    <button type="button" class="card-btn btn-irrigazione attivo" disabled>
                                        Programma già attivo
                                    </button>

                                    <!-- Bottone rimuovi -->
                                    <form method="POST"
                                        action="{{ route('piante.disattiva', ['id' => $pianta->id]) }}">
                                        @csrf

                                        <button type="submit" class="card-btn btn-irrigazione rimuovi">
                                            Rimuovi programma
                                        </button>
                                    </form>
                                @else
                                    <!-- Bottone attiva -->
                                    @if ($pianta)
                                        <form method="POST"
                                            action="{{ route('piante.attiva', ['id' => $pianta->id]) }}">
                                            @csrf

                                            <button type="submit" class="card-btn btn-irrigazione non-attivo">
                                                Attiva programma per questa pianta
                                            </button>
                                        </form>
                                    @else
                                        <p>Nessuna pianta disponibile. Aggiungi una pianta dal tuo orto.</p>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>

                </section>
                @endif

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>

                <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>
                <!-- TemplateMo 607 Glass Admin -->
</body>

</html>
