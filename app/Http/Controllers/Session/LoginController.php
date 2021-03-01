<?php

namespace App\Http\Controllers\Session;

use App\Models\Usuario;
use App\Utils\SessionControl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Clase encargada del control de sesiones
 * Usada para iniciar o cerrar sesión
 */
class LoginController extends Controller
{

    /**
     * Inicia sesión en la aplicación
     *
     * POST
     * @param userName nick de usuario
     * @param pass password de usuario
     */
    function login(Request $request){

        // get params
        $userName = $request->get('user');
        $pass = $request->get('pass');


        /** Parametros vacíos significa que solo navega a pantalla de login */
        if($userName == '' || $pass == ''){
            return "AQUI DEBERIA CARGAR LA PANTALLA DE LOGIN";
        }


        /** Check if user is already logged */
        if(SessionControl::isSessionActive()){
            return "AQUI DEBERIA CARGAR LA PANTALLA DE LOGIN CON MENSAJE DE ERROR DE QUE YA ESTA LOGUEADO";
        }


        /** Check if user EXIST */
        // get data from database
        $userFound = Usuario::where('nick', '=', $userName)->first();

        // wrong credentials
        if(!$userFound || !Hash::check($pass, $userFound->pass)){

            return "No se ha encontrado al usuario o la contraseña es incorrecta";

        // successful login
        }else{

            // adding session var
            SessionControl::createSession($userFound->cod, $userFound->nick, $userFound->img_perfil);

            // redirect to the previus screen
            return redirect()->back();
        }
    }



    /**
     * Cierra sesión en la aplicación
     *
     * POST
     */
    function logout(){

        // delete session vars
        SessionControl::closeSession();

        // redirect to the previus screen
        return redirect()->back();
    }
}
