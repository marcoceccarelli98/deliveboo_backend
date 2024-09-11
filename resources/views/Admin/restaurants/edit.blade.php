@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Modifica il tuo ristorante</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Torna al menù</a>
        </div>

        {{-- @include('shared.errors') --}}

        <section class="py-5">
            <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="companyName">Nome del Ristorante:</label>
                    <input type="text" class="form-control" name="companyName" id="companyName"
                        value="{{ old('companyName', $restaurant->companyName) }}" required>
                </div>
                <div class="mb-3">
                    <label for="address">Indirizzo:</label>
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address', $restaurant->address) }}" required>
                </div>
                <div class="mb-3">
                    <label for="pIva">PIVA:</label>
                    <input type="number" class="form-control" name="pIva" id="pIva"
                        value="{{ old('pIva', $restaurant->pIva) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Aggiorna Ristorante</button>
            </form>
        </section>
    </div>
@endsection
