@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- COMPANY NAME --}}
                            <div class="form-group row">
                                <label for="companyName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="companyName" type="text"
                                        class="form-control @error('companyName') is-invalid @enderror" name="companyName"
                                        value="{{ old('companyName') }}" required maxlength="20">

                                    @error('companyName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- CITY --}}
                            <div class="form-group row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" required maxlength="20">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ADDRESS --}}
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required maxlength="30">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PIVA --}}
                            <div class="form-group row">
                                <label for="pIva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="pIva" type="number"
                                        class="form-control @error('pIva') is-invalid @enderror" name="pIva"
                                        value="{{ old('pIva') }}" required minlength="11" maxlength="11"
                                        pattern="\d{11}" inputmode="numeric">

                                    @error('pIva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- IMAGE --}}
                            <div class="form-group">
                                <label for="image">Immagine del ristorante</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            
                            <div class="mt-5  form-group">
                                <label for="types">Tipologie : </label>
                                @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="types[]" class=" btn-check"
                                    id="type-{{ $type->id }}" value="{{ $type->id }}"
                                    autocomplete="off">
                                    <label class="btn " for="type-{{ $type->id }}">{{ $type->name }}</label>
                                </div>
                                @endforeach
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4 my-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
