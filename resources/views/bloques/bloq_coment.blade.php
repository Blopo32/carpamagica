
<!-- comentario -->
<div id="comentario">

    <!-- img de autor fecha y titulo -->
    <div id="presentacion-comentario">
        <div id="coment-autor">
            <a href="#"><img src="{{ Util::getUrlImgPerfil($coment["img_perfil"]) }}" alt="#"><img></a>
        </div>
        <div id="comentario-datos">
            <div id="comentario-fecha">
                {{ substr($coment["hora"], 0, 5) }} | {{ $coment["fecha"] }}
            </div>
            <div id="comentario-orden">
                #{{ $coment["orden"] }}<p>{{ $coment["nick"] }}</p>
            </div>
        </div>
    </div>

    <!-- contenido del comentario -->
    <div id="coment-text">
        {{ $coment["contenido"] }}
    </div>



    <!-- puntos del comentario y botones de like dislike -->
    <div id="coment-puntos">
        @php
            //calculo los puntos
            $puntuacion = $coment['voto_pos'] - $coment['voto_neg'];
            $votos = $coment['voto_pos'] + $coment['voto_neg'];
            //$votoComentario = BD::getVotoComent($user, $comentario['cod']);
            //$comenVotado = ($votoComentario == 'negativo' || $votoComentario == 'positivo');
        @endphp

        <!-- puntos del comentario y botones de like dislike -->
        <div id="coment-puntuacion-final"
                <?php
                if($puntuacion < 0){
                    echo "class='puntuacion_negativa'";
                    $puntuacion = $puntuacion * -1;

                }else echo "class='puntuacion_positiva'"
                    ?>>
            <p id="comentPuntuacionFinal_{{ $coment["cod"] }}">{{ $puntuacion }}</p>
        </div>
        <p


        >
            <img src="img/dislike.png" alt="Error" class="votar-comentario">
        </p>


        <div id="coment-votos">
            <p id ="comentadores_{{ $coment["cod"] }}">({{ $votos }} votos de usuarios)</p>

        </div>
    </div>
</div>
