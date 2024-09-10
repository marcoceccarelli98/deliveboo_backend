@extends('layouts.app')

@section('content')
    <h1>Modifica Ristorante: {{ $restaurant->name }}</h1>

    <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome del Ristorante:</label>
        <input type="text" name="name" value="{{ old('name', $restaurant->name) }}" required>

        <label for="address">Indirizzo:</label>
        <input type="text" name="address" value="{{ old('address', $restaurant->address) }}" required>

        <label for="piva">PIVA:</label>
        <input type="text" name="piva" value="{{ old('piva', $restaurant->piva) }}" required>

        <button type="submit" class="btn btn-primary">Aggiorna Ristorante</button>
    </form>
@endsection
