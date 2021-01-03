     /* funciones de prueba */

function mostrarMensaje1(){
alert('Bienvenido al curso JavaScript de aprenderaprogramar.com');
}

function mostrarMensaje2(){
alert('Ha hecho click sobre el párrafo inferior');
}


                    /* previsualizar imagenes al seleccionarla para subirla */

function previsualizar(evt) {
    
    var files = evt.target.files; // FileList objeto

    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        
        //Solo admitimos imágenes.
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

function votar($user, $voto, $vin){
  
    if($user != 0){
        $.ajax ({
            
            url:    'control/votar.php',                   /* URL a invocar asíncronamente */
            type:   'post',                           /* Método utilizado para el requerimiento */
            data:   {user: $user, voto: $voto, vinieta: $vin},    /* Información local a enviarse con el requerimiento */
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
        });  // Fin de la invocación al método ajax
    } 
}				