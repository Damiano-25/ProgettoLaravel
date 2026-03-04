<h1>{{ $cliente->nome }} {{ $cliente->cognome }}</h1>

<p>
    {{ $cliente->indirizzo_via }} {{ $cliente->indirizzo_civico }},
    {{ $cliente->indirizzo_citta }}
</p>

<h2>ordini cliente:</h2>

<table border="1">
    <thead>
        <tr>
            <th>id ordine</th>
            <th>data</th>
        </tr>
    </thead>

    <tbody>
        @forelse($cliente->ordini as $ordine)
        <tr>
            <td>
                <a href="{{ route('ordini.show', $ordine) }}">
                    {{ $ordine->id }}
                </a>
            </td>
            <td>{{ $ordine->data_ordine }}</td>
        </tr>
        @empty
        <tr>
            <td>nessun ordine!</td>
        </tr>
        @endforelse
    </tbody>
</table>

<br>

<a href="{{ route('clienti.index') }}">torna ai clienti</a>