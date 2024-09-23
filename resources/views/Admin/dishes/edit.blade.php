@extends ('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Aggiorna piatto</strong></h2>
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

        <section class="py-5">
            <form action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome del piatto:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $dish->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="6"
                        name="description">{{ old('description', $dish->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" step="0.01" value="{{ old('price', $dish->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Visibilità</label>
                    <div>
                        <input type="radio" name="visibility" value="1"
                            {{ old('visibility', $dish->visibility) == 1 ? 'checked' : '' }}> Sì
                        <input type="radio" name="visibility" value="0"
                            {{ old('visibility', $dish->visibility) == 0 ? 'checked' : '' }}> No
                    </div>
                    @error('visibility')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Immagine del piatto</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($dish->path_img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $dish->path_img) }}" alt="{{ $dish->name }}"
                                style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn main-color">Aggiorna piatto</button>
            </form>
        </section>
    </div>
@endsection
