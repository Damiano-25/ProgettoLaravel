<h1>articoli:</h1>

<table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>descrizione</th>
            <th>azioni</th>
        </tr>

        @foreach ($articoli as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->nome }}</td>
                <td>{{ $a->descrizione }}</td>
                <td>
                    <a href="{{ route('articoli.edit', $a->id) }}">modifica</a>

                    <form action="{{ route('articoli.destroy', $a->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('confermi eliminazione?')">
                            elimina
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
   
</table>

<p>
    <a href="{{ route('articoli.create') }}">aggiungi articolo</a>
</p>