<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma Ordine</title>
    <style>
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #00ccbc;
            border-bottom: 2px solid #00ccbc;
            padding-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
            margin-left: 50px;
        }

        .highlight {
            font-weight: bold;
            color: #e8b44d;
        }

        .title {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Grazie per il tuo ordine!</h1>
    <p>Caro cliente,</p>
    <p>Il ristorante <span class="highlight">"{{ $order->restaurant->companyName }}"</span> ha confermato il tuo ordine
        con ID <span class="highlight">{{ $order->id }}</span></p>
    <h4 class="title">Dettagli dell'ordine:</h4>
    <ul>
        <li>Totale: <span class="highlight">€{{ number_format($order->total, 2) }}</span></li>
        <li>Indirizzo di consegna: {{ $order->customer_address }}</li>
    </ul>
    <p>Grazie per aver scelto il nostro servizio!</p>
</body>

</html>
