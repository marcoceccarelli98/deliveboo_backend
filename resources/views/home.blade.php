<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        @if (Route::has('login'))
            <div class="position-fixed top-0 end-0 p-4 text-end">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-link ms-3">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
