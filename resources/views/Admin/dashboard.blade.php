@extends('layouts.app')

@section('content')
    <div class="container text-center">

        {{-- --------------- --}}
        {{-- RESTAURANT INFO --}}
        {{-- --------------- --}}

        <div class="restaurant-info bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="main-color text-black p-4">
                <h2 class="text-2xl  font-bold mb-0">Informazioni Ristorante</h2>
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            @php
                                $infoItems = [
                                    [
                                        'icon' => 'fas fa-utensils',
                                        'label' => 'Nome',
                                        'value' => $restaurant->companyName,
                                    ],
                                    ['icon' => 'fas fa-city', 'label' => 'Città', 'value' => $restaurant->city],
                                    [
                                        'icon' => 'fas fa-map-marker-alt',
                                        'label' => 'Indirizzo',
                                        'value' => $restaurant->address,
                                    ],
                                    ['icon' => 'fas fa-id-card', 'label' => 'P.IVA', 'value' => $restaurant->pIva],
                                    [
                                        'icon' => 'fas fa-concierge-bell',
                                        'label' => 'Tipologia',
                                        'value' => $restaurant->types->isNotEmpty()
                                            ? $restaurant->types->pluck('name')->implode(', ')
                                            : 'Nessun tipo di cucina specificato',
                                    ],
                                ];
                            @endphp

                            @foreach ($infoItems as $item)
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="{{ $item['icon'] }} fa-fw text-primary me-3"></i>
                                        <span class="font-weight-bold ">{{ $item['label'] }}:</span>
                                    </div>
                                    <span class="text-muted">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center mt-4 mt-md-0">
                        <div class="text-center">
                            <img src="{{ $restaurant->path_img
                                ? asset('storage/' . $restaurant->path_img)
                                : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png' }}"
                                alt="{{ $restaurant->name }}" class="img-fluid rounded-circle shadow"
                                style="max-width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-light">
                <a href="{{ route('restaurant.edit', $restaurant->slug) }}" class="btn main-color btn-lg btn-block">
                    <i class="fas fa-edit mr-2"></i> Modifica Dati
                </a>
            </div>
        </div>

        {{-- --------------- --}}
        {{--     BUTTONS     --}}
        {{-- --------------- --}}

        <div class="menu my-5">
            <h2 class="mb-4">Menù</h2>
            <a href="{{ route('dishes.create') }}" class="btn btn-success mb-3">
                Aggiungi Piatto
            </a>

            @if ($dishes->isEmpty())
                <p>Non ci sono piatti disponibili.</p>
            @else
                <div class="container mt-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($dishes as $dish)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    @if ($dish->path_img)
                                        <img src="{{ asset('storage/' . $dish->path_img) }}" class="card-img-top"
                                            alt="{{ $dish->name }}" style="height: 200px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <i class="fas fa-utensils fa-3x"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $dish->name }}</h5>
                                        <p class="card-text">{{ Str::limit($dish->description, 100) }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted fw-bold">{{ number_format($dish->price, 2) }} €</span>
                                            <div>
                                                <a href="{{ route('dishes.edit', $dish->slug) }}"
                                                    class="btn btn-outline-primary btn-sm me-2">
                                                    <i class="fa-solid fa-pen"></i> Modifica
                                                </a>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $dish->id }}">
                                                    <i class="fas fa-trash-can"></i> Elimina
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @foreach ($dishes as $dish)
                    <!-- Modal per la conferma di eliminazione -->
                    <div class="modal fade" id="deleteModal-{{ $dish->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel-{{ $dish->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $dish->id }}">Conferma
                                        eliminazione</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare il piatto "{{ $dish->name }}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('dishes.destroy', $dish) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    @endif
@endsection
