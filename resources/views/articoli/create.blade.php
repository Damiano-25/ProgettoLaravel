<h1>nuovo articolo</h1>

<form method="POST" action="{{ route('articoli.store') }}">
    @csrf
    nome: <input type="text" name="nome" value="{{ old('nome') }}"><br>
    descrizione: <input type="text" name="descrizione" value="{{ old('descrizione') }}"><br>

    <button type="submit">Salva</button>
</form>

<p><a href="{{ route('articoli.index') }}">torna alla lista</a></p>
