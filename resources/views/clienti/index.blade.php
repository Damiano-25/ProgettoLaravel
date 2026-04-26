<h1>clienti</h1>

<table border="1">
    <thead>
        <tr>
            <th>nome</th>
            <th>cognome</th>
            <th>citta</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clienti as $cliente)
        <tr>
            <td>
                <a href="{{ route('clienti.show', $cliente) }}">
                    {{ $cliente->nome }}
                </a>
            </td>
            <td>{{ $cliente->cognome }}</td>
            <td>{{ $cliente->indirizzo_citta }}</td>
        </tr>
        @endforeach
    </tbody>
</table>