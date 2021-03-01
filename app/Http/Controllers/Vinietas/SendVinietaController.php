<?php

namespace App\Http\Controllers\Vinietas;

use App\Utils\Util;
use App\Http\Controllers\Controller;

class SendVinietaController extends Controller
{

    /**
     * Carga la pantalla ENVIAR APORTE
     *
     * POST
     * @return view vista de menú de enviar aporte
     */
    function show(){

        // get genero of user logged
        $genUser = Util::getGenUserLogged();

        // return view
        return view("aportes/sendAporteGeneric", ['genero' => $genUser]);
    }


    /**
     * Carga la pantalla ENVIAR IMAGEN
     *
     * POST
     * @return view vista de menú de enviar aporte imagen
     */
    function showImage(){

        // return view
        return view("aportes/sendAporteImage");
    }

    /**
     * Carga la pantalla ENVIAR GIF *es la misma pantalla que imagen*
     *
     * POST
     * @return view vista de menú de enviar aporte imagen
     */
    function showGif(){

        return $this::showImage();
    }
}
