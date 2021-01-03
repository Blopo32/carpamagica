<!DOCTYPE html>
<html>

    <head>
        @yield('meta')
    </head>

    <body>

        <header>
            @yield('header')
        </header>

        <div class="cont_base">
            @yield('content')
        </div>

        <div class="sidebar">
            @yield('sidebar')
        </div>

    </body>

</html>
