<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ultimos;
use App\Models\Vinieta;
use App\Utils\Util;
use App\Utils\DDBB;

class UltimosController extends Controller
{
    // first page
    function show(){

        // if no pagination is specified show the page 1
        return $this::showPagination(1);
    }

    // specifique page of creen ultimos
    function showPagination($page){

        // get vinietas from data base
        $listVinietas = DDBB::ultimosPagination($page);

        // return view
        return view("lista_vinietas", ["listaVinietas" => $listVinietas]);
    }
}
