@extends('layouts.app')

@section('content')
    <h1>Modifica Ristorante: {{ $restaurant->name }}</h1>

    <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="companyName">Nome del Ristorante:</label>
        <input type="text" name="companyName" id="companyName" value="{{ old('companyName', $restaurant->companyName) }}"
            required>

        <label for="address">Indirizzo:</label>
        <input type="text" name="address" id="address" value="{{ old('address', $restaurant->address) }}" required>

        <label for="pIva">PIVA:</label>
        <input type="number" name="pIva" id="pIva" value="{{ old('pIva', $restaurant->pIva) }}" required>

        <button type="submit" class="btn btn-primary">Aggiorna Ristorante</button>
    </form>
@endsection
