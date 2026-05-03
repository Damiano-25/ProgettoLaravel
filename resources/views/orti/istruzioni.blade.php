<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informazioni - OrtoWare</title>
    <link rel="stylesheet" href="{{ asset('template/templatemo-glass-admin-style.css') }}">
</head>

<body>
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">
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
                            <a href="{{ route('dati_pianta') }}" class="nav-link">
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
                        <div class="user-name">{{ session('utente_nome') }}</div>
                        <div class="user-role">Utente</div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main-content">
            <nav class="navbar">
                <h1 class="page-title">Guida OrtoWare</h1>

                <div class="navbar-right">
                    <button class="nav-btn" id="theme-toggle" title="Toggle Light/Dark Mode">
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="M4.93 4.93l1.41 1.41" />
                            <path d="M17.66 17.66l1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                        </svg>
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            style="display: none;">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </button>
                </div>
            </nav>

            <section class="settings-grid" style="display:block;">
    <div class="glass-card" style="max-width: 950px; margin: 0 auto;">

        <!-- Chi siamo -->
        <div class="settings-section">
            <h3 class="settings-section-title">Chi siamo</h3>
            <p style="line-height: 1.7;">
                <strong>OrtoWare</strong> è un progetto che integra hardware e software per la gestione intelligente dell’irrigazione.
                Il sistema è basato su Arduino ed è collegato a una web app chiamata <strong>OrtoWare</strong>, che permette di monitorare e controllare le piante dell’orto.
                <br><br>
                L’obiettivo è ottimizzare l’uso dell’acqua, adattando l’irrigazione alle reali condizioni del terreno e alle esigenze delle diverse tipologie di piante.
            </p>
        </div>

        <!-- Come usare l'app -->
        <div class="settings-section">
            <h3 class="settings-section-title">Come usare l’app</h3>

            <div class="settings-row">
                <div class="settings-label">
                    <span class="settings-label-title">1. Aggiungi le piante</span>
                    <span class="settings-label-desc">
                        Accedi alla sezione Users e seleziona “Aggiungi Pianta”. Inserisci nome, orto e categoria.
                    </span>
                </div>
            </div>

            <div class="settings-row">
                <div class="settings-label">
                    <span class="settings-label-title">2. Visualizza i dati</span>
                    <span class="settings-label-desc">
                        Premi “View” per accedere alla dashboard della pianta e visualizzare:
                        temperatura, umidità dell’aria, umidità del suolo, livello dell’acqua e stato del relè.
                    </span>
                </div>
            </div>

            <div class="settings-row">
                <div class="settings-label">
                    <span class="settings-label-title">3. Attiva il programma di irrigazione</span>
                    <span class="settings-label-desc">
                        Dalla pagina della pianta puoi attivare il programma automatico. Il sistema utilizza la categoria selezionata per determinare soglia di umidità, durata e frequenza.
                    </span>
                </div>
            </div>

            <div class="settings-row">
                <div class="settings-label">
                    <span class="settings-label-title">4. Gestione automatica</span>
                    <span class="settings-label-desc">
                        È possibile attivare un solo programma alla volta: l’attivazione di una nuova pianta disattiva automaticamente quella precedente.
                    </span>
                </div>
            </div>
        </div>

        <!-- Come funziona -->
        <div class="settings-section">
            <h3 class="settings-section-title">Come funziona l’irrigatore automatico</h3>

            <p style="line-height: 1.7;">
                Il sistema è composto da:
                <br>• sensore di umidità del suolo
                <br>• sensore DHT11 (temperatura e umidità aria)
                <br>• sensore livello acqua
                <br>• relè
                <br>• pompa
                <br><br>
                Arduino legge i dati dei sensori e riceve dalla piattaforma OrtoWare la configurazione della pianta attiva.
                Il funzionamento si basa su una logica decisionale:
            </p>



            <p style="line-height: 1.7;">
                Quando il terreno è secco, Arduino attiva il relè che accende la pompa, irrigando automaticamente la pianta.
                Ogni rilevazione viene inviata alla web app insieme all’ID della pianta e salvata nel database, permettendo il monitoraggio nel tempo.
            </p>
        </div>

        <!-- Scelte ecologiche -->
        <div class="settings-section">
            <h3 class="settings-section-title">Scelte ecologiche</h3>

            <p style="line-height: 1.7;">
                Il progetto integra il concetto di ecosistema dell’orto, andando oltre la semplice irrigazione.
                <br><br>
                Sono state considerate piante da fiore utili come:
                <br>• rose, che permettono di individuare precocemente la presenza di parassiti
                <br>• lavanda, che attira insetti utili e contribuisce all’equilibrio naturale
                <br><br>
                L’irrigazione intelligente riduce gli sprechi d’acqua, mentre l’integrazione tra piante e ambiente favorisce una gestione sostenibile dell’orto.
                <br><br>
                Questo approccio dimostra come tecnologia e natura possano collaborare per creare un sistema efficiente, automatico e rispettoso dell’ambiente.
            </p>
        </div>

        <!-- Bottoni -->
        <div class="btn-group">
            <a href="{{ route('dati_orto') }}" class="btn btn-primary" style="width:auto;">
                Vai alle piante
            </a>

            <a href="{{ route('meteo') }}" class="btn btn-secondary" style="width:auto;">
                Vai al meteo
            </a>
        </div>

    </div>
</section>
        </main>
    </div>

    <button class="mobile-menu-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>
</body>

</html>
