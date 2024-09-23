@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header main-color">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 fs-6">* Campi Obbligatori</div>

                            <!-- Sezione Dati Utente -->
                            <h4 class="mt-4 mb-3">Dati Utente</h4>
                            <div class="border p-3 mb-4">
                                <!-- Nome -->
                                <div class="form-group row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Conferma Password -->
                                <div class="form-group row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Password match error message -->
                                <div id="password-match-error" class="alert alert-danger" style="display: none;">
                                    Le password non corrispondono.
                                </div>
                            </div>

                            <!-- Sezione Dati Ristorante -->
                            <h4 class="mt-4 mb-3">Dati Ristorante</h4>
                            <div class="border p-3">
                                <!-- Nome Ristorante -->
                                <div class="form-group row mb-3">
                                    <label for="companyName"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="companyName" type="text"
                                            class="form-control @error('companyName') is-invalid @enderror"
                                            name="companyName" value="{{ old('companyName') }}" required maxlength="20">
                                        @error('companyName')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Città -->
                                <div class="form-group row mb-3">
                                    <label for="city"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Città') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" required maxlength="20">
                                        @error('city')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Indirizzo -->
                                <div class="form-group row mb-3">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required maxlength="30">
                                        @error('address')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- P.IVA -->
                                <div class="form-group row mb-3">
                                    <label for="pIva"
                                        class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') . '*' }}</label>
                                    <div class="col-md-6">
                                        <input id="pIva" type="text"
                                            class="form-control @error('pIva') is-invalid @enderror" name="pIva"
                                            value="{{ old('pIva') }}" required pattern="\d{11}" inputmode="numeric">
                                        @error('pIva')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Immagine -->
                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right" for="image">Immagine del
                                        ristorante</label>
                                    <div class="col-md-6 ">
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- TIPOLOGIE --}}
                                <div class="mt-4 form-group my-2">
                                    <div class="mb-3" for="types">Tipologie*</div>
                                    <div class="row gy-2">
                                        @foreach ($types as $type)
                                            <div class="col-3">
                                                <div class="form-check ps-0 text-center">
                                                    <input type="checkbox" name="types[]"
                                                        class="btn-check type-checkbox @error('types') is-invalid @enderror"
                                                        id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                        {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-secondary w-100"
                                                        for="type-{{ $type->id }}">{{ $type->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('types')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div id="types-error" class="text-danger mt-2" style="display: none;">
                                        Seleziona almeno un tipo di cucina.
                                    </div>
                                </div>

                                {{-- REGISTRATI --}}
                                <div class="form-group row mb-0 my-2">
                                    <div class="col my-2 text-center">
                                        <button type="submit" class="btn main-color">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- PASSWORD ---
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password-confirm');
            const passwordMatchError = document.getElementById('password-match-error');

            function validatePasswords() {
                if (password.value !== passwordConfirm.value) {
                    passwordMatchError.style.display = 'block';
                    password.classList.add('is-invalid');
                    passwordConfirm.classList.add('is-invalid');
                    return false;
                } else {
                    passwordMatchError.style.display = 'none';
                    password.classList.remove('is-invalid');
                    passwordConfirm.classList.remove('is-invalid');
                    return true;
                }
            }

            form.addEventListener('submit', function(event) {
                if (!validatePasswords()) {
                    event.preventDefault();
                }
            });

            password.addEventListener('input', validatePasswords);
            passwordConfirm.addEventListener('input', validatePasswords);
        });

        // --- TIPOLOGIE ---
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const typeCheckboxes = document.querySelectorAll('.type-checkbox');
            const typesError = document.getElementById('types-error');

            function validateTypes() {
                let isChecked = Array.from(typeCheckboxes).some(checkbox => checkbox.checked);
                if (!isChecked) {
                    typesError.style.display = 'block';
                    typeCheckboxes.forEach(checkbox => checkbox.classList.add('is-invalid'));
                } else {
                    typesError.style.display = 'none';
                    typeCheckboxes.forEach(checkbox => checkbox.classList.remove('is-invalid'));
                }
                return isChecked;
            }

            form.addEventListener('submit', function(event) {
                if (!validateTypes()) {
                    event.preventDefault();
                }
            });

            typeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', validateTypes);
            });
        });
    </script>
@endsection
