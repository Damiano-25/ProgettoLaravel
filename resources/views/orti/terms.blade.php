<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Terms & Conditions</title>
    <link rel="stylesheet" href="{{ asset('template/templatemo-glass-admin-style.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <div class="login-card">
                <h1 class="login-title">Termini e Condizioni</h1>

                <p>
                    Utilizzando OrtoWare accetti che l’app venga usata per monitorare
                    piante, dati ambientali e gestione dell’irrigazione automatica.
                </p>

                <p>
                    Il sistema mostra dati provenienti dai sensori Arduino e permette
                    di attivare o disattivare programmi di irrigazione.
                </p>

                <p>
                    L’utente è responsabile del corretto collegamento dei componenti
                    elettronici e dell’utilizzo sicuro dell’impianto.
                </p>

                <a href="{{ route('register') }}" class="btn btn-primary">
                    Torna alla registrazione
                </a>
            </div>
        </div>
    </div>
</body>
</html>