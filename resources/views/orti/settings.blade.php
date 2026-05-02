<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - 3D Glassmorphism Dashboard</title>
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
                <div class="logo">G</div>
                <span class="logo-text">OrtoWare</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>

                        <!-- PIANTA -->
                        <li class="nav-item">
                            <a href="{{ route('index', ['id' => 1]) }}" class="nav-link">
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
                            <a href="{{ route('analytics') }}" class="nav-link">
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
                            <a href="{{ route('users') }}" class="nav-link">
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
                @if (session('success'))
                    <div style="margin: 20px; padding: 10px; background: green; color: white;">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div style="margin: 20px; padding: 10px; background: red; color: white;">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="page-header">
                    <h1 class="page-title">Settings</h1>
                </div>
                <div class="navbar-right">
                    <button class="nav-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <span class="notification-dot"></span>
                    </button>
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

            <!-- Settings Content -->
            <div class="settings-grid">
                <!-- Settings Navigation -->
                <div class="glass-card settings-nav-card">
                    <ul class="settings-nav">
                        <li class="settings-nav-item">
                            <a href="{{ route('settings') }}#profile" class="settings-nav-link active"
                                data-tab="profile">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                Profile
                            </a>
                        </li>

                        <li class="settings-nav-item">
                            <a href="{{ route('settings') }}#orto" class="settings-nav-link" data-tab="orto">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 20v-8" />
                                    <path d="M8 20v-5" />
                                    <path d="M16 20v-5" />
                                    <path d="M12 12c4-1 6-4 6-8-4 0-6 3-6 8z" />
                                    <path d="M12 12c-4-1-6-4-6-8 4 0 6 3 6 8z" />
                                </svg>
                                Orto
                            </a>
                        </li>

                    </ul>
                </div>

                <!-- Settings Content -->
                <div class="glass-card">
                    <!-- Profile Tab -->
                    <div class="settings-tab-content active" id="tab-profile">
                        <div class="profile-header">
                            <div class="profile-avatar-large">
                                {{ strtoupper(substr(session('utente_nome'), 0, 2)) }}
                                <div class="profile-avatar-edit">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="profile-info">
                                <h2>{{ session('utente_nome') }}</h2>
                                <p>Utente loggato</p>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Profile Information</h3>

                            <form method="POST" action="{{ route('settings.profile.update') }}">
                                @csrf

                                <div class="form-grid">

                                    <div class="form-group-settings">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="{{ $utente->nome ?? '' }}">
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Cognome</label>
                                        <input type="text" name="cognome" value="{{ $utente->cognome ?? '' }}">
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ $utente->email ?? '' }}">
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Telefono</label>
                                        <input type="text" name="telefono" value="{{ $utente->telefono ?? '' }}">
                                    </div>

                                    <div class="form-group-settings full-width">
                                        <label>Bio</label>
                                        <textarea name="bio">{{ $utente->bio ?? '' }}</textarea>
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Password attuale</label>
                                        <input type="password" name="password_attuale">
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Nuova password</label>
                                        <input type="password" name="nuova_password">
                                    </div>

                                    <div class="form-group-settings">
                                        <label>Conferma nuova password</label>
                                        <input type="password" name="nuova_password_confirmation">
                                    </div>

                                </div>

                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" style="width:auto;">
                                        Salva profilo
                                    </button>
                                </div>
                            </form>
                        </div>


                        



                        <!-- Appearance Tab -->
                        <div class="settings-tab-content" id="tab-appearance">
                            <div class="settings-section">
                                <h3 class="settings-section-title">Theme</h3>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Color Mode</span>
                                        <span class="settings-label-desc">Choose your preferred color mode</span>
                                    </div>
                                    <select class="settings-select" id="theme-select">
                                        <option value="dark">Dark Mode</option>
                                        <option value="light">Light Mode</option>
                                        <option value="system">System Default</option>
                                    </select>
                                </div>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Accent Color</span>
                                        <span class="settings-label-desc">Choose your preferred accent color</span>
                                    </div>
                                    <select class="settings-select">
                                        <option>Emerald (Default)</option>
                                        <option>Blue</option>
                                        <option>Purple</option>
                                        <option>Orange</option>
                                        <option>Pink</option>
                                    </select>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3 class="settings-section-title">Display</h3>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Compact Mode</span>
                                        <span class="settings-label-desc">Reduce spacing for more content</span>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Animations</span>
                                        <span class="settings-label-desc">Enable smooth animations and
                                            transitions</span>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Blur Effects</span>
                                        <span class="settings-label-desc">Enable glassmorphism blur effects</span>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <div class="settings-row">
                                    <div class="settings-label">
                                        <span class="settings-label-title">Floating Orbs</span>
                                        <span class="settings-label-desc">Show animated background orbs</span>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-primary" style="width: auto;">Apply Changes</button>
                                <button class="btn btn-secondary" style="width: auto;">Reset to Default</button>
                            </div>
                        </div>

                        
                    </div> 

        <!-- ORTO TAB -->
        <div class="settings-tab-content" id="tab-orto">
            <div class="profile-header">
                <div class="profile-avatar-large">OW</div>

                <div class="profile-info">
                    <h2>{{ $orto->nome ?? 'Orto principale' }}</h2>
                    <p>{{ $orto->provincia ?? 'Provincia non specificata' }}</p>
                </div>
            </div>

            <div class="settings-section">
                <h3 class="settings-section-title">Informazioni orto</h3>

                <form method="POST" action="{{ route('settings.orto.update') }}">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group-settings">
                            <label>Nome orto</label>
                            <input type="text" name="nome_orto" value="{{ $orto->nome ?? '' }}" required>
                        </div>

                        <div class="form-group-settings">
                            <label>Provincia</label>
                            <input type="text" name="provincia" value="{{ $orto->provincia ?? '' }}">
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="width:auto;">
                            Salva orto
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div> <!-- fine glass-card -->
</div> <!-- fine settings-grid -->
                    </div>
                </div>
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

    <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>
    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>
