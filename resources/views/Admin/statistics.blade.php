@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Statistiche Ristorante</h1>

        <form method="GET" action="{{ route('statistics') }}">
            <div class="mb-3">
                <label for="period">Periodo:</label>
                <select id="period" name="period" onchange="this.form.submit()">
                    <option value="mensile" {{ $period == 'mensile' ? 'selected' : '' }}>Mensile</option>
                    <option value="annuale" {{ $period == 'annuale' ? 'selected' : '' }}>Annuale</option>
                </select>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                <canvas id="statsChart"></canvas>
            </div>
            <div class="col-md-6">
                @if ($hasDishesData)
                    <canvas id="pieChart"></canvas>
                @else
                    <div class="alert alert-info">
                        <h4>Nessun dato disponibile per i piatti</h4>
                        <p>Non ci sono ancora ordini registrati per i piatti. Il grafico sarà disponibile quando ci saranno
                            dati sufficienti.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Tabella dei dati grezzi -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>{{ $period == 'mensile' ? 'Mese' : 'Anno' }}</th>
                    <th>Totale Ordini</th>
                    <th>Totale Incasso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $stat)
                    <tr>
                        <td>{{ $stat->{$period == 'mensile' ? 'mese' : 'anno'} }}</td>
                        <td>{{ $stat->totale_ordini }}</td>
                        <td>€{{ number_format($stat->totale_incasso, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('statsChart').getContext('2d');
                var stats = @json($stats);

                console.log('Dati statistiche:', stats);

                if (stats.length === 0) {
                    console.log('Nessun dato disponibile per le statistiche generali');
                    return;
                }

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: stats.map(s => s.{{ $period == 'mensile' ? 'mese' : 'anno' }}),
                        datasets: [{
                            label: 'Totale Ordini',
                            data: stats.map(s => s.totale_ordini),
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }, {
                            label: 'Totale Incasso (€)',
                            data: stats.map(s => s.totale_incasso),
                            backgroundColor: 'rgba(153, 102, 255, 0.6)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Grafico a torta per le percentuali dei piatti
                @if ($hasDishesData)
                    var pieCtx = document.getElementById('pieChart').getContext('2d');
                    var dishesData = @json($dishesData);

                    console.log('Dati dishes:', dishesData);

                    new Chart(pieCtx, {
                        type: 'pie',
                        data: {
                            labels: dishesData.map(d => d.name),
                            datasets: [{
                                data: dishesData.map(d => d.percentage),
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(75, 192, 192, 0.8)',
                                    'rgba(153, 102, 255, 0.8)',
                                    'rgba(255, 159, 64, 0.8)',
                                    'rgba(201, 203, 207, 0.8)',
                                    'rgba(255, 99, 132, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)'
                                ]
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'right',
                                },
                                title: {
                                    display: true,
                                    text: 'Top 10 Dishes Ordered (%)'
                                }
                            }
                        }
                    });
                @else
                    console.log('Nessun dato disponibile per i dishes');
                @endif
            });
        </script>
    @endpush
@endsection
