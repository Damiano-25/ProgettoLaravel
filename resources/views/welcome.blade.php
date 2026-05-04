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

    <main style="display:flex; align-items:center; justify-content:center; min-height:100vh; padding:20px;">

        <div class="glass-card" style="max-width:900px; width:100%; overflow:hidden; padding:0;">

            <!-- HERO IMAGE -->
            <div style="width:100%; height:280px; position:relative;">
                <img src="{{ asset('ortoware_logo.jpeg') }}" alt="Orto automatico"
                    style="
        width:100%;
        height:100%;
        object-fit:contain;
        object-position:center;
        background:white;
    ">

                <!-- overlay -->
                <div
                    style="
                    position:absolute;
                    inset:0;
                    background:linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
                    display:flex;
                    align-items:flex-end;
                    padding:25px;
                ">

                </div>
            </div>

            <!-- CONTENUTO -->
            <div style="padding:35px; text-align:center;">

                <h2 style="margin-bottom:15px;">Chi siamo</h2>

                <p style="line-height:1.8; font-size:15px;">
                    <strong>OrtoWare</strong> è un sistema intelligente per la gestione automatica dell’irrigazione.
                    Integra sensori, Arduino e una piattaforma web per monitorare e controllare le piante in modo
                    semplice ed efficiente.
                </p>

                <p style="line-height:1.8; margin-top:15px;">
                    Il nostro obiettivo è ottimizzare l’uso dell’acqua e migliorare la cura dell’orto,
                    rendendola automatizzata, precisa e sostenibile.
                </p>

<div style="margin-top:30px; display:flex; flex-direction:column; gap:10px;">

    <a href="{{ route('login') }}" 
       class="btn btn-primary" 
       style="padding:12px 30px; font-size:15px;">
        Accedi
    </a>

    <a href="{{ route('register') }}" 
       class="btn btn-primary" 
       style="padding:12px 30px; font-size:15px;">
        Registrati
    </a>

</div>

            </div>
        </div>

    </main>

    <script src="{{ asset('template/templatemo-glass-admin-script.js') }}"></script>
</body>

</html>
