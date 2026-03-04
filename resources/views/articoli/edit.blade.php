<h1>modifica articolo</h1>

<form method="POST" action="{{ route('articoli.update', $articoli->id) }}">
    @csrf
    @method('PUT')

    nome:<input type="text" name="nome" value="{{ old('nome', $articoli->nome) }}"><br>
    descrizione:<input type="text" name="descrizione" value="{{ old('descrizione', $articoli->descrizione) }}"><br>

    <button type="submit">Aggiorna</button>
</form>

<p><a href="{{ route('articoli.index') }}">Torna alla lista</a></p>