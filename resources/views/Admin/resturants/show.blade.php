@extends('layouts.app')

@section('content')
<h1>{{ $restaurant->name }}</h1>

<p>Indirizzo: {{ $restaurant->address }}</p>
<p>PIVA: {{ $restaurant->piva }}</p>

<a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-secondary">Modifica</a>

<form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Elimina</button>
</form>
@endsection
