<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteo - Glass Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

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
                <div class="logo">G</div>
                <span class="logo-text">GlassDash</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('index') }}" class="nav-link">
                                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="3" width="7" height="7" rx="1" />
                                        <rect x="14" y="3" width="7" height="7" rx="1" />
                                        <rect x="3" y="14" width="7" height="7" rx="1" />
                                        <rect x="14" y="14" width="7" height="7" rx="1" />
                                    </svg>
                                    Pianta
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('meteo') }}" class="nav-link active">
                                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M17.5 19H7a5 5 0 1 1 1.2-9.85A6 6 0 0 1 19 12.5A3.5 3.5 0 0 1 17.5 19z" />
                                        <path d="M13 14l-2 4h3l-2 4" />
                                    </svg>
                                    Meteo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('analytics') }}" class="nav-link">
                                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M12 2L2 7l10 5 10-5-10-5z" />
                                        <path d="M2 17l10 5 10-5" />
                                        <path d="M2 12l10 5 10-5" />
                                    </svg>
                                    Analytics
                                    <span class="nav-badge">New</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users') }}" class="nav-link">
                                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    Users
                                </a>
                            </li>
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
                        </ul>
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
                    <div class="user-avatar">TM</div>
                    <div class="user-info">
                        <div class="user-name">
                            {{ session('utente_nome') }}
                        </div>
                        <div class="user-role">Utente</div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main-content">

            <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Meteo</h1>
                    <div class="page-breadcrumb">
                        <a href="{{ route('index') }}">Dashboard</a>
                        <span>/</span>
                        <span>Meteo</span>
                    </div>
                </div>
            </nav>

            <section class="content-grid" style="grid-template-columns: 1fr;">
                <div class="glass-card table-card" style="grid-column: span 1; padding: 30px;">

                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Meteo in tempo reale</h2>
                            <p class="card-subtitle">Inserisci il comune per ottenere i dati meteo esterni</p>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <div class="search-box" style="max-width: 500px;">
                            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>

                            <input type="text" id="cittaInput" class="search-input"
                                placeholder="Inserire nome città">
                        </div>

                        <button class="card-btn" onclick="cercaMeteo()" style="margin-top: 18px;">
                            Cerca meteo
                        </button>
                    </div>

                </div>
            </section>

            <section class="stats-grid" style="margin-top: 25px;">

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Città</h3>
                            <div class="stat-value" id="citta">--</div>
                            <span class="stat-change positive">Località selezionata</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Temperatura</h3>
                            <div class="stat-value" id="temp">--</div>
                            <span class="stat-change positive">Dato OpenWeather</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Condizione</h3>
                            <div class="stat-value" id="meteo" style="font-size: 28px;">--</div>
                            <span class="stat-change positive">Descrizione meteo</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Umidità</h3>
                            <div class="stat-value" id="umidita">--</div>
                            <span class="stat-change positive">Umidità aria esterna</span>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Theme Toggle -->
            <button class="theme-toggle-float" id="theme-toggle" title="Toggle Light/Dark Mode">
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    style="display: none;">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                </svg>
            </button>
        </main>
    </div>



    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <script>
        function cercaMeteo() {
            const citta = document.getElementById('cittaInput').value;

            if (citta === "") {
                alert("Inserisci una città");
                return;
            }

            fetch(`/api/meteo-esterno?citta=${citta}`)
                .then(res => res.json())
                .then(data => {

                    console.log(data);

                    document.getElementById('citta').innerText = data.name;
                    document.getElementById('temp').innerText = data.main.temp + "°C";
                    document.getElementById('meteo').innerText = data.weather[0].description;
                    document.getElementById('umidita').innerText = data.main.humidity + "%";

                })
                .catch(err => {
                    console.error("Errore:", err);
                });
        }


        function resetMeteo() {

            document.getElementById("cittaInput").value = "";
            document.getElementById("citta").innerText = "--";
            document.getElementById("temp").innerText = "--";
            document.getElementById("meteo").innerText = "--";
            document.getElementById("umidita").innerText = "--";
        }

        document.addEventListener("DOMContentLoaded", resetMeteo);
    </script>

    <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>

</body>

</html>
