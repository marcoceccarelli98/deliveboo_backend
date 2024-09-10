@extends('layouts.app')

@section('content')
<h1>Elenco Ristoranti</h1>

<a href="{{ route('restaurants.create') }}" class="btn btn-primary">Aggiungi Ristorante</a>

<ul>
    @foreach ($restaurants as $restaurant)
        <li>
            <a href="{{ route('restaurants.show', $restaurant->slug) }}">
                {{ $restaurant->name }} - {{ $restaurant->address }}
            </a>
            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-secondary">Modifica</a>
            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
