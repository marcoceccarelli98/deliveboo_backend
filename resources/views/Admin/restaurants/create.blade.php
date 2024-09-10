@extends('layouts.app')

@section('content')
<h1>Aggiungi Nuovo Ristorante</h1>

<form action="{{ route('restaurants.store') }}" method="POST">
    @csrf
    <label for="name">Nome del Ristorante:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label for="address">Indirizzo:</label>
    <input type="text" name="address" value="{{ old('address') }}" required>

    <label for="piva">PIVA:</label>
    <input type="text" name="piva" value="{{ old('piva') }}" required>

    <label for="slug">Slug:</label>
    <input type="text" name="slug" value="{{ old('slug') }}" required>

    <button type="submit" class="btn btn-primary">Crea Ristorante</button>
</form>
@endsection
