<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="http://www.ivss.gob.ve/sites/aplicativo/imagen/ivss_logo.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IVSS') }}</title>

    <!-- Scripts -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script> -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

 @include('layouts.header')

</head>
<body>
        @guest        
        @else
        <!-- <div id="app"> -->
        <div id="mySidenav" class="sidenav">    
              
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
        <ul class="nav nav-list">
                 <!-- Usuarios -->
                @if(Auth::user()->hasRole('admin'))
                    @if (Route::has('register'))
            <li class="nav-header"  data-toggle="collapse" data-target="#usuarios_nav"> <a>
                    <i class="fas fa-users"></i>
                    Gestion de Usuarios
                     <i class="fas fa-angle-down"></i>
                </a>
                <ul class="nav nav-list collapse" id="usuarios_nav">                    
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Buscar Usuarios</a></li>

                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Envio de Mesajes</a>
                    @endif
                </ul>
            </li>
            <!-- Beneficiarios -->
             @if(Auth::user()->hasRole('admin'))
                    @if (Route::has('register'))
                    <li class="nav-header"  data-toggle="collapse" data-target="#beneficiarios_nav"> <a>
                    <i class="fas fa-users"></i>
                    Gestion de Beneficiarios
                     <i class="fas fa-angle-down"></i>
                </a>
                <ul class="nav nav-list collapse" id="beneficiarios_nav">                    
                    <li><a class="nav-link" href="{{ route('beneficiarios.index') }}">{{ __('Register') }}</a></li>

                    <!-- <li><a class="nav-link" href="{{ route('datos_personales') }}">Buscar Beneficiario</a></li> -->

                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Envio de Mesajes</a>
                    @endif
                </ul>
            </li>

            <!-- Farmacias -->
             @if(Auth::user()->hasRole('admin'))
                    @if (Route::has('register'))
                    <li class="nav-header"  data-toggle="collapse" data-target="#farmacias_nav"> <a>
                    <i class="fas fa-prescription-bottle-alt"></i>
                    Gestion de Farmacias
                     <i class="fas fa-angle-down"></i>
                </a>
                <ul class="nav nav-list collapse" id="farmacias_nav">                    
                    <li><a class="nav-link" href="{{ route('farmacias.index') }}">{{ __('Register') }}</a></li>
                    <!-- <li><a class="nav-link" href="{{ route('datos_personales') }}">Buscar Farmacia</a></li> -->

                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Envio de Mesajes</a>
                    @endif
                </ul>
            </li>

             <!-- Centro Medico -->
             @if(Auth::user()->hasRole('admin'))
                    @if (Route::has('register'))
                    <li class="nav-header"  data-toggle="collapse" data-target="#centro_medico_nav"> <a>
                    <i class="fas fa-hospital"></i>
                    Gestion de Centro Médico
                     <i class="fas fa-angle-down"></i>
                </a>
                <ul class="nav nav-list collapse" id="centro_medico_nav">                    
                    <li><a class="nav-link" href="{{ route('centro_medico.index') }}">{{ __('Register') }}</a></li>

                    <!-- <li><a class="nav-link" href="{{ route('datos_personales') }}">Buscar Farmacia</a></li> -->

                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Envio de Mesajes</a>
                    @endif
                </ul>
            </li>
             <!-- Centro Medico -->
             @if(Auth::user()->hasRole('admin'))
                    @if (Route::has('register'))
                    <li class="nav-header"  data-toggle="collapse" data-target="#cuerpo_mensajes_nav"> <a>
                    <i class="fas fa-envelope"></i>
                    Cuerpo Mensajes
                     <i class="fas fa-angle-down"></i>
                </a>
                <ul class="nav nav-list collapse" id="cuerpo_mensajes_nav">                    
                    <li><a class="nav-link" href="{{ route('cuerpo_mensajes_index', ['f']) }}">{{ __('Mensaje Farmacia') }}</a></li>
                    <li><a class="nav-link" href="{{ route('cuerpo_mensajes_index', ['d']) }}">{{ __('Mensaje Dialisis') }}</a></li>

                    <!-- <li><a class="nav-link" href="{{ route('datos_personales') }}">Buscar Farmacia</a></li> -->

                    @endif
                    @else
                    <li><a class="nav-link" href="{{ route('datos_personales') }}">Envio de Mesajes</a>
                    @endif
                </ul>
            </li>
        </ul>
        </div>
        @endguest

        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            @guest
            @else
              <div id="main">
                  <span style="font-size:22px;cursor:pointer" onclick="openNav()">&#9776; Menú</span>
              </div>
            @endguest
            <div class="container">
                <img src="http://www.ivss.gob.ve/sites/aplicativo/imagen/ivss_logo.png" style="width: 4%;height: 4%;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        @if(Auth::user()->hasRole('admin'))
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <div>Acceso usuario</div>
                        @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">              
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>
</html>
