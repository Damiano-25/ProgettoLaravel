<h1>dettaglio ordine: {{ $ordine->id }}</h1>

<p>
    data: {{ $ordine->data_ordine }} <br>

    cliente:
    <a href="{{ route('clienti.show', $ordine->cliente) }}">
        {{ $ordine->cliente->nome }} {{ $ordine->cliente->cognome }}
    </a>
</p>

<h2>articoli</h2>

<table border="1">
    <thead>
        <tr>
            <th>articolo</th>
            <th>prezzo</th>
            <th>quantità</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordine->articoli as $articolo)
        <tr>
            <td>{{ $articolo->nome }}</td>
            <td>€ {{ number_format($articolo->prezzo, 2) }}</td>
            <td>{{ $articolo->pivot->quantita }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>

<a href="{{ route('ordini.index') }}">torna agli ordini</a>