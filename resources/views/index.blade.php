<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Lj') }}</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>

</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name', 'Lj') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Hai, {{ Auth::user()->nama }}</a>
                    </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    {{-- AmpeSini --}}


    

    <div class="welcome-banner">
        <div class="container">
            <div class="text-center">
                <h2 class="selamat-text">Selamat Datang di {{ config('app.name') }}</h2>
                <p class="selamat-subtext">
                    @auth
                        Senang bertemu kembali, {{ Auth::user()->nama }}! ✨
                    @else
                        Silakan login atau daftar untuk mulai menggunakan sistem
                    @endauth
                </p>
            </div>
        </div>
    </div>
    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>