<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>Seleção Colégio Polícia Militar</title>    
    <meta name="description" content="Página de informação do processo seletivo do Colégio Polícia Militar do Tocantins"/>
    <meta name="viewport" content="width=device-width, initia-scale=2.0"/>
    <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
    
    <script type="text/javascript" src="js/jquery/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/js_militar.js"></script>
    
    
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style_militar.css"/>
    <link rel="stylesheet" href="css/style_militar_responsive.css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container" id="header">
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <!--{{ config('app.name', 'Laravel') }}-->
                        Seleção Colégio Polícia Militar 2017/2018
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><img style="margin: 5px; height: 40px" class="right" title="Logo Colégio Polícia Militar" alt="[Logo Colégio Polícia Militar]" src="image/brasao-tocantins150x150.png" /></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a href="{{ route('polos.list') }}">Polos</a></li>
                            <li><a href="{{ route('unidades.list') }}">Unidades</a></li>
                            <li><a href="{{ route('cursos.list') }}">Cursos</a></li>
                            <li><a href="{{ route('seletivos.list') }}">Seletivos</a></li>
                            {{-- <li><a href="{{ route('arquivos.list') }}">Arquivos</a></li> --}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif 
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

     @yield('script')
</body>
</html>
