<?php

namespace App\Http\Controllers\Vinietas;

use App\Utils\DDBB;
use App\Utils\ConstVar;
use App\Utils\SessionControl;
use App\Http\Controllers\Controller;

class ListaVinController extends Controller
{


    /**
     * Método generico que carga la vista de lista de vinietas con los datos que recibe
     *
     * POST
     * @param listVinietas lista de datos de la DDBB con las vinietas
     * @param page pagina a la que esta accediendo
     * @param totalPages numero de paginas disponibles
     * @param routeUrl seccion en la que se encuentra. Utilizado a la hora de cambiar de pagina
     * @return view vista con la lista de vinietas obtenidas de la base de datos
     *
     */
    function showListVinietas($listVinietas, $page, $totalPages, $routeUrl){

        // return view with the data to load
        return view("vinietas/lista_vinietas", ["listaVinietas" => $listVinietas,
                                                    "page" => $page,
                                                    "totalPages" => $totalPages,
                                                    "routeUrl" => $routeUrl]);
    }


    /**
     * carga la pagina 1 de la pantalla ULTIMOS
     *
     * @return view vista con la lista de vinietas de la pantalla ULTIMOS
     */
    function showUltimos(){

        // if no pagination is specified, show the page 1
        return $this::showUltimosPagination(1);
    }
    /**
     * Carga la pantalla ULTIMOS en una pagina concreta
     *
     * POST
     * @return view vista con la lista de vinietas de la pantalla ULTIMOS en la pagina especificada
     */
    function showUltimosPagination($page){

        // get list of vinietas
        $user = SessionControl::getSessionCod();
        $listVinietas = DDBB::getVinListUltimosVotedByUser($page, $user);

        // number of pages to show
        $totalPages = DDBB::getPagesForUltimos();
        // routing name to pagination
        $routeUrl = ConstVar::ULTIMOS_URL . ConstVar::PAGINATION_URL;

        // call to generic method that returns the view
        return $this::showListVinietas($listVinietas, $page, $totalPages, $routeUrl);
    }


    /**
     * carga la pagina 1 de la pantalla MEJORES
     *
     * POST
     * @return view vista con la lista de vinietas de la pantalla MEJORES
     */
    function showMejores(){

        // if no pagination is specified, show the page 1
        return $this::showMejoresPagination(1);
    }
    /**
     * Carga la pantalla MEJORES en una pagina concreta
     *
     * POST
     * @return view vista con la lista de vinietas de la pantalla MEJORES en la pagina especificada
     */
    function showMejoresPagination($page){

        /** Get necesary data for load MEJORES screen */

        // list of vinietas
        $listVinietas = DDBB::getVinListMejores($page);
        // number of pages to show
        $totalPages = DDBB::getPagesForUltimos();
        // routing name to pagination
        $routeUrl = ConstVar::ULTIMOS_URL;

        // return view with the data to load
        return $this::showListVinietas($listVinietas, $page, $totalPages, $routeUrl);
    }
}
