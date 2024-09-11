@extends ('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Crea un nuovo piatto</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Torna al menù</a>
        </div>

        {{-- @include('shared.errors') --}}

        <section class="py-5">
            <form action="{{ route('dishes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="6" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" name="price"></input>
                </div>
                <div class="mb-3">
                    <input type="radio" name="visibility" value="1"> Sì
                    <input type="radio" name="visibility" value="0"> No
                </div>

                <button type="submit" class="btn btn-primary">Crea un nuovo piatto</button>
            </form>
        </section>
    </div>
@endsection
