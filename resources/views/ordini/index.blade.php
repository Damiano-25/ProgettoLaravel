<h1>ordini</h1>

<table border="1">
    <thead>
        <tr>
            <th>id ordine</th>
            <th>data</th>
            <th>cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordini as $ordine)
        <tr>
            <td>
                <a href="{{ route('ordini.show', $ordine) }}">
                    {{ $ordine->id }}
                </a>
            </td>
            <td>{{ $ordine->data_ordine }}</td>
            <td>
                <a href="{{ route('clienti.show', $ordine->cliente) }}">
                    {{ $ordine->cliente->nome }} {{ $ordine->cliente->cognome }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>