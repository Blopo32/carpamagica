@extends('layouts/layout_principal')

@section('content')


    <div id="container_aporte_menu">
        <ul id="menu_aporte">
        <li class="indicador-float-left"><a href="{{ URL('enviar/imagen') }}"><img src="{{ URL('images/recursos/img_nuevo_aporte/img_menu_aportes/icon_texto_menu_aportes_imagen.png') }}" alt="#" width="300" height="40"></a></li>
        <li class="indicador-float-left"><a href="{{ URL('enviar/gif') }}"><img src="{{ URL('images/recursos/img_nuevo_aporte/img_menu_aportes/icon_texto_menu_aportes_gift.png') }}" alt="#" width="300" height="40"></a></li>
        <li class="indicador-float-left"><a href="control/guardar_video.php"><img src="{{ URL('images/recursos/img_nuevo_aporte/img_menu_aportes/icon_texto_menu_aportes_video.png') }}" alt="#" width="300" height="40"></a></li>
        <li class="indicador-float-left"><a href="#"><img src="{{ URL('images/recursos/img_nuevo_aporte/img_menu_aportes/icon_texto_menu_aportes_creador.png') }}" alt="#" width="300" height="40"></a></li>
        <li class="indicador-float-left"><a href="index.php"><img src="{{ URL('images/recursos/img_nuevo_aporte/img_menu_aportes/icon_texto_menu_aportes_atras.png') }}" alt="#" width="300" height="40"></a></li>
    </ul>

   <img src="{{ URL('images/recursos/img_nuevo_aporte/carpa_aporte_menu_'. $genero .'.png') }}" alt="#" width="1050" height="500">

@endsection()


