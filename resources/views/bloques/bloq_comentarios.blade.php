
<div class="cajon-comentarios">

    <!-- cabecera de los comentarios con la opcion de ordenacion -->
    <div id="cabecera-comentarios">
        <h1>{{ count($comentList) }} Comentarios</h1>
        <div id="div-ordenar-comentarios">
            <ul>
                <li>Ordenar: </li>
                <a @if($orderMode == "last"){ echo "class='orden-actual'"; } @else{ echo "class='orden-elegir'"; } @endif href="comentar.php?vin=<?php echo $vinieta["codVinieta"] ?>&order=last#cabecera-comentarios"><li class="elegir-orden">Ultimos</li></a>
                <a @if($orderMode == "mejores"){ echo "class='orden-actual'"; } @else{ echo "class='orden-elegir'"; } @endif href="comentar.php?vin=<?php echo $vinieta["codVinieta"] ?>&order=mejores#cabecera-comentarios"><li class="elegir-orden">Mejores</li></a>
                <a @if($orderMode == "crono"){ echo "class='orden-actual'"; } @else{ echo "class='orden-elegir'"; } @endif href="comentar.php?vin=<?php echo $vinieta["codVinieta"] ?>&order=crono#cabecera-comentarios"><li class="elegir-orden">Todos</li></a>
            </ul>
        </div>
    </div>

    <!-- lista de los comentarios -->
    <div id="listado-comentarios">

        @foreach ($comentList as $coment)

            @include('bloques.bloq_coment', $coment)

        @endforeach
    </div>



    <div id="publica-comentario">
        <h1>Deja el tuyo!</h1>
            <!--
                lugar donde el autor ingresa un nuevo comentario
            -->

        <form method='POST' action="control/comentar.php">
            @if (SessionControl::isSessionActive())

                <p id ="sin_cuenta">�Quieres dejar tu comentario? Ve a <a href="#header_cuenta">la parte superior</a> para iniciar sesion o registrarte. <b>Gracias!</b></p>


            @else

                <div id="comentario">

                    <!-- img del usuario actualmente conectado -->
                    <div id="presentacion-comentario">
                        <div id="coment-autor">
                            <a href="#"><img src="img/perfiles/default.jpg" alt="#"><img></a>
                        </div>
                    </div>

                        <!-- text area donde se escribe el comentario -->
                    <div id="coment-text">
                        <textarea placeholder="Escribe aqui tu opinion sobre el aporte." maxlength="950" name="contenido"></textarea>
                    </div>
                </div>

                <input type="hidden" name="autor" value="<?php echo BD::getUserByNick($_SESSION['usuario']); ?>">
                <input type="hidden" name="vinieta" value="<?php echo $vinieta["codVinieta"] ?>">
                <div class="enviar-comentario"> <input type="submit" name="comentar" value="Enviar"> </div>

            @endif


        </form>
    </div>
</div>
