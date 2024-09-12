@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>DASHBOARD</h1>

        {{-- --------------- --}}
        {{-- RESTAURANT INFO --}}
        {{-- --------------- --}}

        <div class="restaurant-info text-start bg-secondary rounded p-5 text-white">
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="fs-5">Nome : </div>
                            <div class="fs-4">{{ $restaurant->companyName }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between list-group-item-dark">
                            <div class="fs-5">Città : </div>
                            <div class="fs-4">{{ $restaurant->city }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="fs-5">Indirizzo : </div>
                            <div class="fs-4">{{ $restaurant->address }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between list-group-item-dark">
                            <div class="fs-5">P.IVA : </div>
                            <div class="fs-4">{{ $restaurant->pIva }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between list-group-item-dark">
                            <div class="fs-5">Tipologia : </div>
                            <div class="fs-4">
                                @if ($restaurant->types->isNotEmpty())
                                    {{ $restaurant->types->pluck('name')->implode(', ') }}
                                @else
                                    Nessun tipo di cucina specificato
                                @endif
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('restaurant.edit') }}" class="btn btn-warning mt-3">
                        Modifica Dati
                    </a>
                </div>
                <div class="col text-center">
                    @if ($restaurant->path_img)
                        <img src="{{ asset('storage/' . $restaurant->path_img) }}" alt="{{ $restaurant->name }}"
                            style="max-width: 200px;">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png"
                            alt="{{ $restaurant->name }}" style="max-width:300px; min-width:300px">
                    @endif
                </div>
            </div>
        </div>

        {{-- --------------- --}}
        {{--     BUTTONS     --}}
        {{-- --------------- --}}

        <div class="d-flex justify-content-evenly my-5">


            <a href="{{ route('dishes.create') }}" class="btn btn-success">
                Aggiungi Piatto
            </a>
        </div>
        <div class="menu mb-5">
            <h2 class="mb-5">Menù</h2>

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
                                    <form action="{{ route('dishes.destroy', $dish->slug) }}" method="POST">
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

    {{-- <div class="d-flex flex-column">
                <div class="row">
                    @foreach ($dishes as $dish)
                        <div class="col py-3">
                            <div class="card bg-dark-subtle h-100">
                                @if ($dish->path_img)
                                    <img src="{{ asset('storage/' . $dish->path_img) }}" alt="{{ $dish->name }}"
                                        style="max-width: 150px;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <h6 class="card-text">{{ $dish->price }} €</h6>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-primary"><i
                                                class="fa-solid fa-pen"></i></a>
                                    </div>

                                    
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"
                                        type="submit">
                                        <i class="fas fa-trash-can"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Modal -->

            <div class="modal" id="exampleModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Are u sure u want to delete : {{ $dish->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Abort</button>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"
                                    type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
    @endif
@endsection
