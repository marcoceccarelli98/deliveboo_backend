@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4 text-primary">Elenco Ordini</h1>
            </div>
        </div>

        @if ($orders->isEmpty())
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i>Nessun ordine trovato.
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Email</th>
                                    <th>Indirizzo</th>
                                    <th>Totale</th>
                                    <th>Data</th>
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
                                            <div class="btn-group" role="group">
                                                {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a> --}}
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $order->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal per la conferma di eliminazione -->
                                    <div class="modal fade" id="deleteModal-{{ $order->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel-{{ $order->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $order->id }}">
                                                        <i class="fas fa-exclamation-triangle me-2"></i>Conferma
                                                        eliminazione
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler eliminare l'ordine #{{ $order->id }}?
                                                    <br><small class="text-muted">Questa azione non può essere
                                                        annullata.</small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash me-2"></i>Elimina
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
@endpush
