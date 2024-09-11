@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>DASHBOARD</h1>

        @if ($restaurant->path_img)
            <img src="{{ asset('storage/' . $restaurant->path_img) }}" alt="{{ $restaurant->name }}" style="max-width: 300px;">
        @endif

        <div class="d-flex justify-content-evenly">
            <a href="{{ route('restaurant.edit') }}" class="btn btn-warning">
                Modifica Dati Ristorante
            </a>

            <a href="{{ route('dishes.create') }}" class="btn btn-success">
                Aggiungi Piatto
            </a>
        </div>

        @if ($dishes->isEmpty())
            <p>Non ci sono piatti disponibili.</p>
        @else
            <div class="d-flex flex-column">
                <div class="row">
                    @foreach ($dishes as $dish)
                        <div class="col py-3">
                            <div class="card bg-dark-subtle h-100">
                                @if ($dish->path_img)
                                    <img src="{{ asset('storage/' . $dish->path_img) }}" alt="{{ $dish->name }}"
                                        style="max-width: 300px;">
                                @endif
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <h6 class="card-text">{{ $dish->price }} €</h6>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-primary"><i
                                                class="fa-solid fa-pen"></i></a>
                                    </div>

                                    {{-- Pulsante di cancellazione --}}
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
            </div>
        @endif
    @endsection
