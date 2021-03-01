<?php
namespace App\Utils;

use App\Utils\ConstVar;

/**
 * Clase que gestiona el tratamiento de las variables de session
 */
class SessionControl {

    #region modificar session
    /**
     * Crea la sesión del usuario que ha iniciaod sesion
     * Crea las variables de sesion
     *
     * @param userId codigo del usuario que inicia sesion
     * @param userName nick del usuario que inicia sesion
     * @param imgPerfil codigo de la imagen que tiene el usuario peusta de perfil
     */
    public static function createSession($userId, $userName, $imgPerfil){

        session()->put(ConstVar::SESSION_VAR,
                                [
                                    ConstVar::SESSION_ID_USER => $userId,
                                    ConstVar::SESSION_USER => $userName,
                                    ConstVar::SESSION_IMG_USER => $imgPerfil
                                ]);
    }


    /**
     * Cierra la sesion
     * Elimina las variables de sesion de la pagina
     *
     */
    public static function closeSession(){

        session()->forget(ConstVar::SESSION_VAR);
        session()->flush();
    }


    /**
     * Añade una variable de session nueva con el array de datos obtenido
     */
    public static function replaceSessionVar($sessionArrayVars){

        session()->put(ConstVar::SESSION_VAR, $sessionArrayVars);
    }


    /**
     * Modifica el valor de la variable de session de la imagen del usuario
     * @param newImg codigo de la nueva iagen del usuario
     *
     */
    public static function updateSessionImgPerfil($newImg){

        // comprobacion de que el usuario esté logueado
        if(SessionControl::isSessionActive()){

            // obtenemos los datos de session actuales
            $sessionData = SessionControl::getSessionArrayData();
            // remplazamos el dato de la imagen
            $sessionData[ConstVar::SESSION_IMG_USER] = $newImg;

            // actualizar session
            SessionControl::replaceSessionVar($sessionData);
        }
    }
    #endregion


    #region obtener info de sesion
    /**
     * Comprueba si la sesión del usuario esta activa
     * Comprueba que las variables de sesión existen
     *
     * @return bool si la sesión del usuario esta actualmente activa
     */
    public static function isSessionActive(){

        return session()->has(ConstVar::SESSION_VAR);
    }


    /**
     * Metodos que obtienen datos de la sesion
     * Obtienen los valores de las variables de sesion
     *
     * @return cod cod del usuairo logueado
     * @return nick nick del usuario logueado
     * @return imgPerfil codigo de la imagen de perfil que tiene el usuario asignada
     */
    public static function getSessionArrayData(){

        return session(ConstVar::SESSION_VAR, ConstVar::USER_ID_ANON);
    }
    // obtiene solo el identificador del usuario
    public static function getSessionCod(){

        if(SessionControl::isSessionActive())
            return session(ConstVar::SESSION_VAR)[ConstVar::SESSION_ID_USER];
        else
            return ConstVar::USER_ID_ANON;
    }
    public static function getSessionNick(){

        if(SessionControl::isSessionActive())
            return session(ConstVar::SESSION_VAR)[ConstVar::SESSION_USER];
        else
            return ConstVar::USER_NICK_ANON;
    }
    public static function getSessionImg(){

        if(SessionControl::isSessionActive())
            return session(ConstVar::SESSION_VAR)[ConstVar::SESSION_IMG_USER];
        else
            return ConstVar::USER_IMG_ANON;
    }
    #endregion

}
