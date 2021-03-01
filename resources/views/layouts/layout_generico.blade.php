<!DOCTYPE html>
<html>

    <head>
        {{-- Meta datos de la web --}}
        @yield('meta')
    </head>

    <body>

        {{-- Header de la web --}}
        <header>
            @yield('header')
        </header>

        {{-- Contenido principal de la pantalla --}}
        <div class="cont_base">
            @yield('content')
        </div>

        {{-- Contenido inferior de la pantalla --}}
        <div class="sidebar">
            @yield('sidebar')
        </div>

        {{-- Scripts adicionales de la pagina --}}
        @yield('aditionalScript')

    </body>

</html>
