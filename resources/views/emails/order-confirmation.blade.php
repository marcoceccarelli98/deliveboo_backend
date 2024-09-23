<!DOCTYPE html>
<html>

<head>
    <title>Conferma Ordine</title>
</head>

<body>
    <h1>Grazie per il tuo ordine!</h1>
    <p>Caro cliente,</p>
    <p>Il tuo ordine con ID {{ $order->id }} è stato confermato.</p>
    <p>Dettagli dell'ordine:</p>
    <ul>
        <li>Totale: €{{ number_format($order->total, 2) }}</li>
        <li>Stato: {{ $order->status_order }}</li>
        <li>Indirizzo di consegna: {{ $order->customer_address }}</li>
    </ul>
    <p>Grazie per aver scelto il nostro servizio!</p>
</body>

</html>
