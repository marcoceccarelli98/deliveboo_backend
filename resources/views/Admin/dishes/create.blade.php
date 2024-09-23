@extends ('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Crea un nuovo piatto</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('dashboard') }}" class="btn main-color btn-lg">Torna al menù</a>
        </div>

        <section class="py-5">
            <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione (opzionale)</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="6"
                        name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo *</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" step="0.01" value="{{ old('price') }}" required min="0">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="me-5">Visibilità *</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility1" value="1"
                            {{ old('visibility') == '1' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="visibility1">Sì</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility0" value="0"
                            {{ old('visibility') == '0' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="visibility0">No</label>
                    </div>
                    @error('visibility')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine del piatto (opzionale)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn main-color">Crea un nuovo piatto</button>
            </form>
        </section>
    </div>
@endsection
