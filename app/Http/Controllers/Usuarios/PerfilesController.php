<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Utils\PokeApiManager;
use App\Http\Controllers\Controller;
use App\Utils\SessionControl;
use App\Utils\DDBB;

class PerfilesController extends Controller
{
    //
    function miPerfil(){

        //PokeApiManager::getExample();
        //echo PokeApiManager::getSprite("totodile");

        $pokeData = PokeApiManager::getSpriteList("151");
        $listAvatares = array_values($pokeData);

        return view("usuarios.miPerfil", ["listAvatares" => $listAvatares]);
    }



    //
    function setPerfil($numPoke){

        $user = SessionControl::getSessionCod();

        DDBB::setPerfil($user, $numPoke);
        SessionControl::updateSessionImgPerfil($numPoke);

        //echo SessionControl::getSessionImg();

        return view("index");
    }
}
