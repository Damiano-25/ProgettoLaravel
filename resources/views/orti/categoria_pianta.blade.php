<h1>Seleziona categoria pianta</h1>

<form method="POST" action="/categorie-piante/attiva">
    @csrf

    <select name="categoria_id">
        @foreach($categorie as $categoria)
            <option value="{{ $categoria->id }}" {{ $categoria->attiva ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>

    <button type="submit">Salva categoria</button>
</form>