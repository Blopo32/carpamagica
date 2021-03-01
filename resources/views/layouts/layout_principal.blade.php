
@extends('layouts/layout_generico')

{{-- metadatos --}}
@section('meta')

    <title>Carpa MagiK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <link href="{{ url('/css/newcss.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('/css/newcss.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animaciones.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/estilos_predeterminados.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ url('/images/recursos/favicon.png') }}">

@endsection

{{-- menú --}}
@section('header')

    <div id ="header_cuenta">
        <a href="{{ url('/') }}" id="iconoHome"><img src="{{ url('/images/recursos/carpa_meme.png') }}" alt="#" width="96" height="96" id="simbolo"></a>
        <p id = "titulo"><img src="{{ url('/images/recursos/carpa_title.png') }}" alt="#" width="550" height="96"></p>

        <!-- Si el usuario esta logueado le da la bienvenida -->
        @if(SessionControl::isSessionActive())

            <div id="logout">
                <div id="perfil_name">
                    <p>{{ SessionControl::getSessionNick() }}</p>
                </div>
                <div id="welcome" class="redondo">
                    <a href="{{  url('/perfil') }}"><img src="{{ Util::getUrlImgPerfil(SessionControl::getSessionImg()) }}" alt="#"></a>
                </div>
                <div id="form_logout">
                    <form method='POST' action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" name='logout' value='logout'><img src="{{ url('/images/recursos/exit_kof.png') }}" alt="#"></button>
                    </form>
                </div>
            </div>

        @else

            <!-- si no lo esta muestra enlace para iniciar sesión -->
            <div id="login">
                <form method='POST' action="{{ url('/login') }}">
                    @csrf
                    <p id ="sin_cuenta">No tienes cuenta? <a href="{{ url('/signUp') }}">REGISTRATE</a></p>
                    <p>
                        <input type="text" name="user" id="inicio_rapido" placeholder="usuario">
                        <input type="password" name="pass" id="inicio_rapido" placeholder="contrase&ntilde;a">
                    </p>
                    <div class="bubble-float-left"> <input type="submit" name="login" value="login"> </div>
                </form>
            </div>
        @endif
    </div>


    <!-- menú de navegacion -->
    <nav id="menu">
        <ul>
            <a href="{{ url('/ultimos') }}" name="ultimos"><li>Ultimos</li></a>
            <a href="{{ url('/mejores') }}" name="mejores"><li>Mejores</li></a>
            <a href="{{ url('/enviar') }}" name="aporte"><li>Enviar Aporte</li></a>
            <a href="{{ url('/moderar') }}" name="moderar"><li>Moderar</li></a>

            <!-- buscar aporte -->
            <div id="busqueda_container">
                <div id="busqueda_container_container">
                    <form id="form_busqueda" action="busqueda.php" method="post">
                        @csrf
                        <input type="text" name="string_buscar" placeholder="Buscar">
                        <button class="rotar" type="submit" name="buton_lupa">
                            <img src="{{ asset('/images/recursos/icon_lupa.png') }}" alt="#" width="25" height="24">
                        </button>
                    </form>
                </div>
            </div>
        </ul>
    </nav>

@endsection

@section('aditionalScript')

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="{{ url('/script/myScript.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"> type="text/javascript"></script>

@endsection





