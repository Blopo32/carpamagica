@extends('layouts/layout_generico')

{{-- se supone que es un comentario --}}
@section('meta')

<!--
    <title>Carpa MagiK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link href="{{ url('/css/newcss.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animaciones.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ url('/images/recursos/favicon.png') }}">
    <link href="{{ url('/css/fonts.css') }}" rel="stylesheet" type="text/css">

-->



    <title>Carpa MagiK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link href="{{ url('/css/newcss.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animaciones.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/fonts.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ url('/images/recursos/favicon.png') }}">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script>google.load("jquery", "1");</script>
    <script type="text/javascript" src="{{ url('/script/myScript.css') }}"></script>

@endsection


@section('header')

    <div id ="header_cuenta">
        <a href="index.php" id="iconoHome"><img src="{{ url('/images/recursos/carpa_meme.png') }}" alt="#" width="96" height="96" id="simbolo"></a>
        <p id = "titulo"><img src="{{ url('/images/recursos/carpa_title.png') }}" alt="#" width="550" height="96"></p>


        <!-- Si el usuario esta logueado le da la bienvenida -->
        @auth()

            {{ $user = Session::get('usuario') }}

            <div id="logout">
                <div id="perfil_name">
                    <p>{{ $user }} </p>
                </div>
                <div id="welcome" class="redondo">
                    <a href="selectAvatar.php"><img src="{{ url('/images/avatares/totodile.jpg') }}" alt="#"></a>
                </div>
                <div id="form_logout">
                    <form method='POST' action="control/logout.php">
                        <button type="submit" name='logout' value='logout'><img src="{{ url('/images/recursos/exit_kof.png') }}" alt="#"></button>
                    </form>
                </div>
            </div>
        @endauth

        <!-- si no lo esta muestra enlace para iniciar sesión -->
        @guest()

            <div id="login">
                <form method='POST' action="login.php">
                    <p id ="sin_cuenta">No tienes cuenta? <a href="registro.php">REGISTRATE</a></p>
                    <p>
                        <input type="text" name="usuario" id="inicio_rapido" placeholder="usuario">
                        <input type="password" name="clave" id="inicio_rapido" placeholder="contrase&ntilde;a">
                    </p>
                    <div class="bubble-float-left"> <input type="submit" name="login" value="login"> </div>

                </form>
            </div>
        @endguest
    </div>


    <nav id="menu">
        <ul>
            <a href="ultimos.php" name="ultimos"><li>Ultimos</li></a>
            <a href="mejores.php" name="mejores"><li>Mejores</li></a>
            <a href="nuevo_aporte.php" name="aporte"><li>Enviar Aporte</li></a>
            <a href="moderar.php" name="moderar"><li>Moderar</li></a>
            <div id="busqueda_container">
                <div id="busqueda_container_container">
                    <form id="form_busqueda" action="busqueda.php" method="post">
                        <input type="text" name="string_buscar" placeholder="Buscar">
                        <button class="rotar" type="submit" name="buton_lupa">
                            <img src="{{ url('/images/recursos/icon_lupa.png') }}" alt="#" width="25" height="24">
                        </button>
                    </form>
                </div>
            </div>
        </ul>
    </nav>

@endsection


