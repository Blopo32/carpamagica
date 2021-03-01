
{{-- ball en la esquia indicando rareza --}}
<div class="vinieta {{ Util::getBallFromVinieta($vinieta['votos_pos'], $vinieta['votos_pos'], $vinieta['nComentarios']) }}">

    {{-- encabezado de la publicacion --}}
    <h1> {{ $vinieta['title']}} </h1>
    <div class="info-vinieta">

        {{-- enlace a comentarios --}}
        <div id="div_comentar" title="{{ $vinieta['nComentarios'] }} comentarios en este aporte. No olvides dejar el tuyo!">
            <a href="{{ url("cajaComentarios/" . $vinieta['codVinieta'] . "#cabecera-comentarios") }}">
                <p>{{ Util::getNumComentToShow($vinieta['nComentarios']) }}</p>
                <img src="{{ url('images/recursos/comentar.png') }}" alt="#" width="75" height="75">
            </a>
        </div>

        {{-- puntuacion del aporte --}}
        @include('bloques.bloq_puntuacionVinieta', $vinieta)

        {{-- penlace a perfil de autor --}}
        <div id="datosAutor">
            <div id="autorDatos">
                <div id="autor-nombre"> {{ Util::getNickToShow($vinieta['autorName']) }} </div>
                <div id="autor-fecha"> {{ Util::getDateToShow($vinieta['date'], $vinieta['hour']) }}</div>
            </div>
            <div id="div_autor" class="redondo publicadoPor" title="Enviado por {{ $vinieta['autorName'] }}">
                <a href="{{ url("perfil/" . $vinieta['autorId']) }}">
                    <img src="{{ Util::getUrlImgPerfil($vinieta['autorPerfil']) }}" alt="#">
                </a>
            </div>
        </div>
    </div>

    {{-- vinieta propiamente dicha --}}
    <img class="img-vinieta" src="{{ url('aportes/publicaciones/'. $vinieta['fileName']) }}" alt="Error">


    {{-- etiquetas --}}
    @include('bloques.bloq_cajon_etiquetas', ['etiquetas', $vinieta['etiquetas']])
</div>
