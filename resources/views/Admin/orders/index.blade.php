@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Elenco Ordini</h1>

        @if ($orders->isEmpty())
            <p>Nessun ordine trovato.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Ordine</th>
                        <th>Nome Cliente</th>
                        <th>Email Cliente</th>
                        <th>Indirizzo Cliente</th>
                        <th>Totale</th>
                        <th>Data Creazione</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>€ {{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">Dettagli</a> --}}
                                {{-- <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-secondary">Modifica</a> --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal-{{ $order->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal per la conferma di eliminazione -->
                        <div class="modal fade" id="deleteModal-{{ $order->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel-{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-{{ $order->id }}">Conferma
                                            eliminazione</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare l'ordine #{{ $order->id }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
