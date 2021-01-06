<?php

namespace App\Http\Controllers;

use App\Utils\DDBB;


/**
 * Controlador de la pantalla: ULTIMOS
 */
class UltimosController extends Controller
{
    /**
     * carga la pagina 1 de la pantalla ULTIMOS
     */
    function show(){

        // if no pagination is specified, show the page 1
        return $this::showPagination(1);
    }

    
    /**
     * Carga la pantalla ULTIMOS en una pagina concreta
     */
    function showPagination($page){

        // get vinietas from data base
        $listVinietas = DDBB::ultimosPagination($page);

        // return view with the data to load
        return view("lista_vinietas", ["listaVinietas" => $listVinietas]);
    }
}
