@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Modifica il tuo ristorante</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('dashboard') }}" class="btn main-color btn-lg">Torna al menù</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- @include('shared.errors') --}}

        <section class="py-5">
            <form action="{{ route('restaurant.update', $restaurant->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="companyName">Nome del Ristorante :</label>
                    <input type="text" class="form-control" name="companyName" id="companyName"
                        value="{{ old('companyName', $restaurant->companyName) }}" required>
                </div>
                <div class="mb-3">
                    <label for="city">Città :</label>
                    <input type="text" class="form-control" name="city" id="city"
                        value="{{ old('city', $restaurant->city) }}" required>
                </div>
                <div class="mb-3">
                    <label for="address">Indirizzo :</label>
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address', $restaurant->address) }}" required>
                </div>
                <div class="mb-3">
                    <label for="pIva">PIVA :</label>
                    <input type="number" class="form-control" name="pIva" id="pIva"
                        value="{{ old('pIva', $restaurant->pIva) }}" required>
                </div>


                <!-- Types     -->
                <div class="mt-5  form-group">
                    <label for="types">Tipi : </label>
                    @foreach ($types as $type)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="types[]" class=" btn-check" id="type-{{ $type->id }}"
                                value="{{ $type->id }}" autocomplete="off"
                                {{ $restaurant->types->contains($type->id) ? 'checked' : '' }}>
                            <label class="btn " for="type-{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group mb-3">
                    <label for="image">Immagine del ristorante</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($restaurant->path_img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $restaurant->path_img) }}"
                                alt="{{ $restaurant->companyName }}" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn main-color my-5">Aggiorna Ristorante</button>
            </form>
        </section>
    </div>
@endsection
