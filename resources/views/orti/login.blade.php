<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 3D Glassmorphism Dashboard</title>
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

    <div class="login-page">
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

        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h1 class="login-title">Welcome Back</h1>
                    <p class="login-subtitle">Sign in to continue to OrtoWare</p>
                </div>

                @if ($errors->any())
                    <div
                        style="margin-bottom: 15px; padding: 10px; background: rgba(255,0,0,0.2); color: #ffcccc; border-radius: 8px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-input"
                            placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-input"
                            placeholder="Enter your password" required>
                    </div>



                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>
                </form>



                <p class="login-footer">
                    Don't have an account? <a href="{{ route('register') }}">Create Account</a>
                </p>
            </div>
        </div>


    </div>

    <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>
    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>
