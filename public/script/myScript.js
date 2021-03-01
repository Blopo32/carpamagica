

            /* previsualizar imagenes al seleccionarla para subirla */

function previsualizar(evt) {

    var files = evt.target.files; // FileList objeto

    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {

        //Solo admitimos im�genes.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
              // Insertamos la imagen
             document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}


/**
 * Realiza una votacion del usuario logueado a la vinieta correspondiente
 *
 */
function votar($vin, $voto){

    $.ajax ({

        url:    "/votar",                   /* URL a invocar as�ncronamente */
        type:   'post',                           /* M�todo utilizado para el requerimiento */
        data:   {
            vinieta: $vin,
            voto: $voto
        },    /* Informaci�n local a enviarse con el requerimiento */
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:    function(request, settings)
        {
            if(request != true){
                $('#txt_puntos_' + $vin).html(request);
            }else{

                if($voto == 1){
                    $('#button_plusle_' + $vin).css('background', '#FFD700');
                }else{
                    $('#button_minum_' + $vin).css('background', 'wheat');
                }

                // actualiza la puntuacion con tu voto (sin tener en cuenta si alguien mas ha votado entre medias)
                $('#txt_puntos_' + $vin).html(parseInt($('#txt_puntos_' + $vin).html()) + $voto);
            }
        },
        error:  function(request, settings)
        {
            $('#txt_puntos_' + $vin).html('Error');
        }
    });  // Fin de la invocaci�n al m�todo ajax

}



function votar2($user, $voto, $vin){

    if($user != 0){
        $.ajax ({

            url:    'votar',                   /* URL a invocar as�ncronamente */
            type:   'post',                           /* M�todo utilizado para el requerimiento */
            data:   {voto: $voto, vinieta: $vin},    /* Informaci�n local a enviarse con el requerimiento */
            success:    function(request, settings)
            {
                if(request == 'fail'){

                }else{

                    if($voto == 1){
                        $('#button_plusle_' + $vin).css('background', '#FFD700');
                    }else{
                        $('#button_minum_' + $vin).css('background', 'wheat');
                    }
                    $('#txt_puntos_' + $vin).html(request);
                }
            },
            error:  function(request, settings)
            {
                $('#txt_puntos_' + $vin).html('Error: ');
            }
        });  // Fin de la invocaci�n al m�todo ajax
    }
}
