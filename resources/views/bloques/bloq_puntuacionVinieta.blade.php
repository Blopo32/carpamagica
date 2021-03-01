
{{-- puntuacion del aporte --}}
<div id="div_puntuacion">

    {{-- Usuario no conectado --}}
    @if(SessionControl::isSessionActive())

        <div id="button_minum_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" title="No te gusta">
            <img id="not-like" src="{{ url('images/recursos/minum.png') }}" alt="Fail" width="45" height="55">
        </div>
        <div id="puntuacion"> <p id="txt_puntos_{{ $vinieta['codVinieta'] }}"> {{ $vinieta['puntuacion'] }} </p> </div>
        <div id="button_plusle_{{ $vinieta['codVinieta'] }}" class="boton-puntuar">
            <img id="like" src="{{ url('images/recursos/plusle.png') }}" title="Te gusta" alt="Fail" width="45" height="55">
        </div>

    @elseif($vinieta['votoUsuario'] == -1)

        <div id="button_minum_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" title="No te gusta" style="background: wheat;">
            <img id="not-like" src="{{ url('images/recursos/minum.png') }}" alt="Fail" width="45" height="55">
        </div>
        <div id="puntuacion"> <p id="txt_puntos_{{ $vinieta['codVinieta'] }}"> {{ $vinieta['puntuacion'] }} </p> </div>
        <div id="button_plusle_{{ $vinieta['codVinieta'] }}" class="boton-puntuar">
            <img id="like" src="{{ url('images/recursos/plusle.png') }}" title="Te gusta" alt="Fail" width="45" height="55">
        </div>

    @elseif($vinieta['votoUsuario'] == 1)

        <div id="button_minum_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" title="No te gusta">
            <img id="not-like" src="{{ url('images/recursos/minum.png') }}" alt="Fail" width="45" height="55">
        </div>
        <div id="puntuacion"> <p id="txt_puntos_{{ $vinieta['codVinieta'] }}"> {{ $vinieta['puntuacion'] }} </p> </div>
        <div id="button_plusle_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" style="background: #FFD700;">
            <img id="like" src="{{ url('images/recursos/plusle.png') }}" title="Te gusta" alt="Fail" width="45" height="55">
        </div>

    @else

        <div id="button_minum_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" title="No te gusta" onclick="votar({{ $vinieta['codVinieta'] }}, -1)">
            <img id="not-like" src="{{ url('images/recursos/minum.png') }}" alt="Fail" width="45" height="55">
        </div>
        <div id="puntuacion"> <p id="txt_puntos_{{ $vinieta['codVinieta'] }}"> {{ $vinieta['puntuacion'] }} </p> </div>
        <div id="button_plusle_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" onclick="votar({{ $vinieta['codVinieta'] }}, 1)">
            <img id="like" src="{{ url('images/recursos/plusle.png') }}" title="Te gusta" alt="Fail" width="45" height="55">
        </div>

    @endif


</div>
