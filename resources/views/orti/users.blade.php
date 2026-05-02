<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - 3D Glassmorphism Dashboard</title>
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
                <span class="logo-text">GlassDash</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('index', ['id' => 1]) }}" class="nav-link">
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

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Users</h1>
                    <div class="page-breadcrumb">
                        <a href="{{ route('index', ['id' => 1]) }}">Dashboard</a>
                        <span>/</span>
                        <span>Users</span>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="search-box">
                        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" class="search-input" placeholder="Search users...">
                    </div>
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

            <!-- Stats Cards -->


            <!-- Users Table -->
            <section class="content-grid" style="grid-template-columns: 1fr;">
                <div class="glass-card table-card" style="grid-column: span 1;">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">All Users</h2>
                            <p class="card-subtitle">Manage your user base</p>
                        </div>
                        <div class="card-actions">
                            <button class="card-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" style="margin-right: 6px;">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add User
                            </button>
                            <button class="card-btn">Export</button>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Pianta</th>
                                    <th>Provincia_orto</th>
                                    <th>Stato umidità</th>
                                    <th>Data</th>
                                    <th>ID Pianta</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dati2 as $row): ?>

                                <tr>
                                    <td>
                                        <div class="table-user">
                                            <div class="table-avatar"
                                                style="background: linear-gradient(135deg, var(--success), var(--emerald));">
                                                <?php echo substr($row->NOME_PIANTA, 0, 2); ?>
                                            </div>

                                            <div class="table-user-info">
                                                <span class="table-user-name">
                                                    <?php echo $row->NOME_PIANTA; ?>
                                                </span>

                                                <span class="table-user-email">
                                                    ID: <?php echo $row->ID_PIANTA; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <?php echo $row->PROVINCIA_ORTO; ?>
                                    </td>

                                    <td>
                                        <?php
                                        $status = 'Good';
                                        
                                        if ($row->UMIDITA_RADICI_PERC < 60) {
                                            $status = 'Low';
                                        } elseif ($row->UMIDITA_RADICI_PERC > 75) {
                                            $status = 'High';
                                        }
                                        
                                        $class = 'completed';
                                        if ($status == 'Low') {
                                            $class = 'pending';
                                        }
                                        if ($status == 'High') {
                                            $class = 'processing';
                                        }
                                        ?>

                                        <span class="status-badge <?php echo $class; ?>">
                                            <?php echo $status; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?php echo $row->DATA_RECORD ?? 'N/A'; ?>
                                    </td>

                                    <td>
                                        <?php echo $row->ID_PIANTA; ?>
                                    </td>

                                    <td>
                                        <a href="{{ route('index', ['id' => $row->ID_PIANTA]) }}" class="card-btn"
                                            style="padding: 6px 12px;">
                                            View
                                        </a>

                                    </td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>



                        </table>
                    </div>
                </div>
            </section>
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
