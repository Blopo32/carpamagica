<?php

namespace App\Http\Controllers\Session;

use App\Models\Usuario;
use App\Utils\SessionControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


/**
 * Clase encargada del registro de nuevos usuarios
 *
 * PENDIENTE DE HACER EN CONDICIONES CON AJAX PARA
 * MOSTRAR MENSAJES DE ERROR SI RECARGAR PANTALLA
 */
class RegistroController extends Controller
{

    /**
     * Carga la pantalla de registro de usuairo
     */
    function show(){

        // return view
        return view("session/registro");
    }


    /**
     * Gestiona el registro de un nuevo usuario
     *
     * POST
     * @param nick nombre de usuario
     * @param pass password
     * @param repass password repetida por seguridad
     * @param genero genero del usuario
     */
    function signUp(Request $request){

        // get params
        $userName = $request->get('nick');
        $pass = $request->get('pass');
        $rePass = $request->get('repass');
        $genero = $request->get('genero');

        // add new user in database
        $user = new Usuario;
        $user->nick = $userName;
        $user->pass = Hash::make($pass);
        $user->genero = $genero;
        $user->save();

        //adding sesion var
        SessionControl::createSession($user->cod, $user->nick);

        return view("index");
    }
}
