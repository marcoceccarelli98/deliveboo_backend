@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DASHBOARD</h1>
        <a href="{{ route('restaurant.edit') }}" class="btn btn-warning m-3">
            Modifica Ristorante
        </a>

        <a href="{{ route('dishes.create') }}" class="btn btn-success mb-3">
            Aggiungi Nuovo Piatto
        </a>

        @if ($dishes->isEmpty())
            <p>Non ci sono piatti disponibili.</p>
        @else
            <ul>
                @foreach ($dishes as $dish)
                    <li>{{ $dish->name }} - {{ $dish->price }} €
                        <a href="{{ route('dishes.edit', $dish->slug) }}" class="btn btn-warning m-3">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
