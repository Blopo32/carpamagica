
{{-- decide que pokeball ha coseguido la publicacion --}}
@if ($vinieta['votos'] >= 230 && $vinieta['puntuacion'] > ($vinieta['votos'] * 90 / 100))
    @php $classVinieta = 'vinieta vin-master' @endphp
@elseif ($vinieta['votos'] >= 100 && $vinieta['puntuacion'] > ($vinieta['votos'] * 75 / 100))
    @php $classVinieta = 'vinieta vin-ultra' @endphp
@elseif ($vinieta['votos'] >= 23 && $vinieta['puntuacion'] > ($vinieta['votos'] / 2))
    @php $classVinieta = 'vinieta vin-super' @endphp
@else
    @php $classVinieta = 'vinieta vin-poke' @endphp
@endif



<div class="{{ $classVinieta }}">
    {{-- encabezado de la publicacion --}}
    <h1> {{ $vinieta['title']}} </h1>
    <div class="info-vinieta">

        <!--
        enlace a comentarios
        -->
        <div id="div_comentar" title="{{ $vinieta['nComentarios'] }} comentarios en este aporte. No olvides dejar el tuyo!">
            <a href="comentar.php?vin=1&order=mejores#cabecera-comentarios">    <!-- AQUI AÑADIR ENLACE A LOS COMENTARIOS -->
                {{-- controla que el número de comentarios no quepa en la imagen --}}
                @if ($vinieta['nComentarios'] < 99)
                    <p>{{ $vinieta['nComentarios'] }}</p>
                @else
                    <p>+99</p>
                @endif

                <img src="{{ url('images/recursos/comentar.png') }}" alt="#" width="75" height="75">
            </a>
        </div>

        <!--
        puntuacion del aporte
        -->
        <div id="div_puntuacion">
            <!-- < ?php $haVotado = BD::getVotoVin($user, $elemento['cod']); ?>        AQUI CONTROLAR SI EL USUARIO HA VOTADO LA VINIETA -->
            <div id="button_minum_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" title="No te gusta" onclick="votar({{ $vinieta['autorId'] }}, 0, {{ $vinieta['codVinieta'] }})">     <!-- < ?php if($haVotado == 'negativo') echo 'style="background: wheat;"'; ?>  AQUI AÑADIR QUE CAMBIE DE COLOR SI EL USUARIO HA VOTADO -->
                <img id="not-like" src="{{ url('images/recursos/minum.png') }}" alt="Fail" width="45" height="55">
            </div>
            <div id="puntuacion"> <p id="txt_puntos_{{ $vinieta['codVinieta'] }}"> {{ $vinieta['puntuacion'] }} </p> </div>
            <div id="button_plusle_{{ $vinieta['codVinieta'] }}" class="boton-puntuar" onclick="votar({{ $vinieta['autorId'] }}, 1, {{ $vinieta['codVinieta'] }})">     <!-- < ?php if($haVotado == 'negativo') echo 'style="background: wheat;"'; ?>  AQUI AÑADIR QUE CAMBIE DE COLOR SI EL USUARIO HA VOTADO -->
                <img id="like" src="{{ url('images/recursos/plusle.png') }}" title="Te gusta" alt="Fail" width="45" height="55">
            </div>
        </div>

        <!--
        enlace a perfil de autor
        -->
        <div id="datosAutor">


            <div id="autorDatos">
                <div id="autor-nombre"> {{ $vinieta['autorName'] }} </div>
                <div id="autor-fecha"> {{ $vinieta['date'] }}
                    <!-- AQUI FALTA AÑADIR QUE SI ES UNA VINIETA DE HOY PONER LA HORA EN VEZ DE LA FECHA
                    < ?php
                    if(BD::getDia() != $elemento['fecha']){
                        echo $elemento['fecha'];
                    }else{
                        echo substr($elemento['hora'], 0, 5);
                    }
                    ?>  -->
                </div>
            </div>


            <div id="div_autor" class="redondo publicadoPor" title="Enviado por {{ $vinieta['autorName'] }}">
                <a href="enviadosPor.php?us={{ $vinieta['autorId'] }}">
                    <img src="{{ url('images/avatares/'. $vinieta['autorPerfil']) }}" alt="#">
                </a>
            </div>
        </div>


        <!--
        vinieta propiamente dicha
        -->
        <img class="img-vinieta" src="{{ url('aportes/publicaciones/'. $vinieta['fileName']) }}" alt="Error">



        <!--
        etiquetas de la aportacion
        -->
        <div class="cajon-etik">

            <!--
            <div id="etiqueta">
                <p> prueba </p>
            </div>

                < ?php
                $listEtik = BD::etiquetas($elemento['cod']);

                if ($listEtik != null) {
                    $etiqueta = $listEtik->fetch();

                    while ($etiqueta) {
                        ?>

                        <div id="etiqueta">
                            <p> < ?php echo $etiqueta['nombre'] ?> </p>
                        </div>

                        < ?php
                        $etiqueta = $listEtik->fetch();
                        ?>
                        < ?php
                    }
                }
                ?>
            -->
        </div>
    </div>
</div>
