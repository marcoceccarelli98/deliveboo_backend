@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>DASHBOARD</h1>
        <div class="d-flex justify-content-evenly">
            <a href="{{ route('restaurant.edit') }}" class="btn btn-warning">
                Modifica Ristorante
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
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <h6 class="card-text">{{ $dish->price }} €</h6>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-primary"><i
                                                class="fa-solid fa-pen"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
