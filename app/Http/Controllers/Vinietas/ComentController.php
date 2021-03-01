<?php

namespace App\Http\Controllers\Vinietas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\ConstVar;
use App\Utils\DDBB;
use App\Utils\SessionControl;
use Illuminate\Contracts\Session\Session;

class ComentController extends Controller
{

    /**
     * Carga la pantalla COMENTARIOS
     *
     * POST
     * @return view vista de menú de enviar aporte
     */
    function show($vin){

        $autor = SessionControl::getSessionCod();
        $orderMode = ConstVar::ORDER_MEJORES;
        $vinData = DDBB::getVinData($vin, $autor);
        $comentList = DDBB::getComentFromVin($vinData["codVinieta"], "puntos");


        // return view
        return view("vinietas.detalle_vinieta", ['vinieta' => $vinData, 'comentList' => $comentList, 'orderMode' => $orderMode]);
    }
}
