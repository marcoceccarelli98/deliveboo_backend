@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Statistiche Ristorante</h1>

        <form method="GET" action="{{ route('admin.statistics.index') }}" class="mb-4">
            <div class="form-group">
                <label for="period">Periodo:</label>
                <select id="period" name="period" class="form-control" onchange="this.form.submit()">
                    <option value="mensile" {{ $period == 'mensile' ? 'selected' : '' }}>Mensile</option>
                    <option value="annuale" {{ $period == 'annuale' ? 'selected' : '' }}>Annuale</option>
                </select>
            </div>
        </form>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Andamento Ordini e Incassi
                    </div>
                    <div class="card-body">
                        <canvas id="statsChart"></canvas>
                    </div>
                </div>

                <!-- Statistiche Aggiuntive -->
                <div class="card">
                    <div class="card-header">
                        Statistiche Aggiuntive
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5>Media ordini giornaliera</h5>
                                <p class="h4">{{ number_format($averageDailyOrders, 2) }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Valore medio dell'ordine</h5>
                                <p class="h4">€{{ number_format($averageOrderValue, 2) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5>Piatto più popolare</h5>
                                <p class="h4">{{ $mostPopularDish->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Tasso clienti abituali</h5>
                                <p class="h4">{{ number_format($returningCustomersRate, 2) }}%</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5>Confronto con il periodo precedente</h5>
                                <p>Ordini: <span
                                        class="h5 {{ $orderGrowth >= 0 ? 'text-success' : 'text-danger' }}">{{ $orderGrowth >= 0 ? '+' : '' }}{{ number_format($orderGrowth, 2) }}%</span>
                                </p>
                                <p>Fatturato: <span
                                        class="h5 {{ $revenueGrowth >= 0 ? 'text-success' : 'text-danger' }}">{{ $revenueGrowth >= 0 ? '+' : '' }}{{ number_format($revenueGrowth, 2) }}%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <div class="card flex-grow-1">
                    <div class="card-header">
                        Top 10 Piatti Ordinati
                    </div>
                    <div class="card-body">
                        @if ($hasDishesData)
                            <canvas id="pieChart"></canvas>
                        @else
                            <div class="alert alert-info">
                                <h4 class="alert-heading">Nessun dato disponibile per i piatti</h4>
                                <p class="mb-0">Non ci sono ancora ordini registrati per i piatti. Il grafico sarà
                                    disponibile quando ci saranno dati sufficienti.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Dati Dettagliati
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
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
            </div>
        </div>
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
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

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
