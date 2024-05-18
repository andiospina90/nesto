<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nesto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Poppins', sans-serif;
            color: #808080;
            height: 100%;
        }
    </style>
</head>

<body>
    @if (Auth::check())
        <div class="sidebar">
            <div style="padding-top: 5%; padding-left: 12%;">
                <div class="logo">
                    <img src="{{ asset('img/NestoWhite.svg') }}" alt="logo" width="100">
                    <div class="logo-text-container"><span class="logo-text">N</span></div>
                </div>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="{{ url('/proyectos') }}">
                        <i class="fa-solid fa-chalkboard"></i>
                        <span class="link-name" style="font-size:15px">Proyectos</span>
                    </a>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ url('/usuarios') }}">
                            <i class="fa-solid fa-user"></i>
                            <span class="link-name" style="font-size:15px">Colaboradores</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ url('/empresas') }}">
                            <i class="fa-solid fa-building"></i>
                            <span class="link-name" style="font-size:15px">Empresa</span>
                        </a>
                    </div>

                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-sign-out-alt"></i>
                        <span class="link-name" style="font-size:15px">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="home-section">

            <div class="home-content" style="padding-top: 5px; display: flex; justify-content: space-between">
                <i class="fas fa-bars"></i> <div style="font-size:20px; margin-right: 20px">
                    <i class="fa-solid fa-circle-user" style="margin-right:5px"></i>
                    <span style="color:black">{{ Auth::user()->name }}</span>
                </div>
            </div>

            <div class="content-container">
                @yield('content')
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        @yield('contentLogin')
    @endif
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nesto.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
