<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Utils\ConstVar;


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
        return view("registro");
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
    function signUp(){

        // get params
        $userName = Request::get('nick');
        $pass = Request::get('pass');
        $rePass = Request::get('repass');
        $genero = Request::get('nick');

        // add new user in database
        $user = new Usuario;
        $user->nick = $userName;
        $user->pass = Hash::make($pass);
        $user->genero = $genero;
        $user->save();


        //adding sesion var
        session()->put(ConstVar::SESSION_USER, $user->nick); 

        // redirect to the previus screen
        return view('index');
    }
}
