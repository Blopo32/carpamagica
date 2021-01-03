<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vinieta;

class VinietasController extends Controller
{
    //
    function show(){

        $listVinietas = Vinieta::all();
        return view("ultimos", ["listaVinietas" => $listVinietas]);
        //return Vinieta::all();
    }
}
