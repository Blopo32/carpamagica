<?php

namespace App\Http\Controllers;

use App\Utils\ConstVar;
use Illuminate\Http\Request;
use App\Utils\Util;
use App\Utils\DDBB;
use App\Utils\SessionControl;
header('Content-type: text/html');

/**
 * Clase que gestiona todo el control de datos de la pagina
 * como puede ser la subida o moderacion de vinietas
 */
class ControlDataController extends Controller
{


    /**
     * Carga la pantalla ENVIAR IMAGEN
     *
     * POST
     * @return view vista de menú de enviar aporte imagen
     */
    function subirImg(Request $request){

        echo "subiedno";

        /** comprobacion de que el archivo se ha cargado correctamente */
        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){

            // se obtiene el archivo que se pretende subir
            $file = $request->file('archivo');


            /** Comprbando si es un archivo valido */
            if(Util::isValidImg($file)){
                echo "es img";

                // obtenemos los datos del formulario
                $titulo = $request->input('title');
                $eiquetas = $request->input('etiquetas');

                // insert en la DDBB
                DDBB::nuevoAporte($file, $titulo, $eiquetas, "img");

            }else{

            echo "no es img";
            }

        }else{


            echo "archivo no valido";


            $file = $request->file('archivo');

            // datos del archivo
            $nombre = $file->getClientOriginalName();
            $nombre2 = $file->getBasename();
            $nombre3 = $file->getFilename();
            $nombre4 = $file->getPathname();


            echo 'put no ha cargado bien: ';
            echo 'Nombre 1: ' . $nombre . '<br/>';
            echo 'Nombre 2: ' . $nombre2 . '<br/>';
            echo 'Nombre 3: ' . $nombre3. '<br/>';
            echo 'Nombre 4: ' . $nombre4;

        }

    }




    function votarAporte(Request $request){

        /** Obtener datos para la votacion */
        $user = SessionControl::getSessionCod();
        $vin = $request->input("vinieta");
        $voto = $request->input("voto");

        // votar vinieta
        $votoCorrecto = DDBB::votarVinieta($user, $vin, $voto);

        echo $votoCorrecto;

        exit(0);
    }




}
