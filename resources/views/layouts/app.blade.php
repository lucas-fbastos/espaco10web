<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
  

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    
			
</head>
<body class='fundo'>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="/">Espaço 10</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style='background-color: rgba(255,255,255,0.5);' id='btnNav'>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" >
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item " id="home-bttn" >
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" id="sobre-bttn" href="/sobre">Sobre a cidade </a>
                    </li>
                    @guest
                        <li class="nav-item" id="cadastro-bttn">
                            <a class="nav-link" href="/cadastro" >Cadastre-se </a>
                        </li>
                    @endauth
                    @auth
                        <li class="nav-item" id="cadastro-bttn">
                            <a class="nav-link" href="/home" >Perfil </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <main>
            @yield('content')
        </main>
</body>
@yield('script')
</html>
