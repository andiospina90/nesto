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
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/Nesto blanco.svg') }}" alt="logo" width="200">
            <div class="logo-text-container"><span class="logo-text">N</span></div>
        </div>

        <ul class="nav-list">
            <li>
                <a href="{{ url('/dashboard') }}">
                    <i class="fab fa-microsoft"></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
                    <li>
          <div class="icon-link">
            <a href="#">
              <i class="fas fa-laptop-code"></i>
              <span class="link-name">Usuarios</span>
            </a>
            <i class="fas fa-caret-down arrow"></i>
          </div>

          <ul class="sub-menu">
            <li><a href="{{url('/usuarios')}}">Consultar Usuarios</a></li>
            <li><a href="{{url('/usuario/registrar')}}">Registrar usuarios</a></li>
          </ul>
        </li>

        </ul>
    </div>
        <div class="home-section">
        <div class="home-content">
            <i class="fas fa-bars"></i>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nesto.js') }}" defer></script>
</body>

</html>
