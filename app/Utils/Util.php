<?php
namespace App\Utils;

use App\Utils\ConstVar;
use App\Utils\FileControl;
use App\Utils\PokeApiManager;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;

/**
 * Clase con metodos genericos de utilidad
 */
class Util {


    #region comprobaciones utiles
    /**
     * Comprueba si el archivo es valido respecto a la configuracion de la pagina
     *
     * @param file archivo cargado en post
     * @return bool si el archivo es valido para subirse
     */
    public static function isValidImg($file){

        // se obtienen los datos a comprobar del archivo
        $fileName = $file->getClientOriginalName();
        $fileType = $file->getMimeType();
        $fileTam = $file->getSize();

        // devuelve si pasa todas las comprobaciones
        return FileControl::hasValidExtension($fileName) &&
                FileControl::isValidImgType($fileType) &&
                FileControl::maxImgTamExceded($fileTam);
    }
    #endregion


    #region obtener datos utiles
    /**
     * Obtiene el numero de la primera vinieta que debe mostrarse en la pagina
    *
    * @param page pagina actual
    */
    public static function getNextVinietaFromPage($page){

        return ($page - 1) * ConstVar::VIN_TAM_PAGE;
    }


    /**
     * Obtiene el genero del usuairo logueado si es que lo esta
     *
     * @return genero el genero del usuario logueado o anonimo si no loe sta
     */
    public static function getGenUserLogged(){

        // get genero of the user
        if(SessionControl::isSessionActive()){
            return DDBB::userData(SessionControl::getSessionNick())['genero'];
        }else{
            return ConstVar::GENERO_ANON;
        }
    }


    /**
     * obtiene la url de carga de la imagen del autor
     *
     * @param imgPerfil codigo de la imagen de perfil
     * @return String url de la imagen
     */
    public static function getUrlImgPerfil($imgPerfil){

        if($imgPerfil == ConstVar::PERFIL_DEFAULT)
            return url('images/avatares/'. ConstVar::PERFIL_DEFAULT . '.jpg');
        else
            return Str::of(ConstVar::URL_SPRITE)->replace(ConstVar::REPLACER, $imgPerfil);
    }


    /**
     * Devuelve la fecha de hoy en un string con formato aaaa-mm-dd
     *
     * @return String texto con el dia de hoy en formato aaaa-mm-dd
     */
    public static function getActualDay(){

        //dia
        $dia = date("j");
        //mes
        $mes = date("m");
        //año
        $anio = date("Y");

        //fecha formateada
        $fecha = $anio . "-" . $mes . "-" . $dia;
        //devuelve la fecha
        return $fecha;
    }
    #endregion


    #region transformacion de datos
    /**
     * Formatea los datos obtenidos de la base de datos para devolverlos como array
    *
    * @param data conjunto de datos obtenidos de la base de datos
    */
    public static function parseArray($data){

        // format result to be array
        $result = array_map(function ($value) {
            return (array)$value;
        }, $data);

        // return array
        return $result;
    }


    /**
     * Crea una list de elementos a partir de una cadena con separadores
     *
     * @param cadena list original con separadores (Ej: uno;dos;tres)
     * @return lista lista de strings ya separados
     */
    public static function getListFromString($cadena) {

        return preg_split("~" . ConstVar::LIST_SEPARATOR . "~", $cadena, null, PREG_SPLIT_NO_EMPTY);
    }


    /**
       * Calcula el numero de paginas que serian necesarias para mostrar un numero de vinietas dado
       *
       * @param numVin numero de vinietas a mostrar
       * @return pages paginas que serian necesarias para mostrar ese numero de vinietas
     */
    public static function getPagesFor($numVin){

        // calc how many pages we need
        return ceil((float) $numVin / ConstVar::VIN_TAM_PAGE);
    }

    /**
     * De una cadena con un valor remplazable lo reemplaza por otra cadena dada
     *
     * @param originString cadena que contiene un valor remplazable como #{REPLACE}
     */
    public static function REPLACE($originString, $newValue){
        return str_replace(ConstSentences::REPLACER, $newValue, $originString);
    }


    /**
     * Comprueba que ball asigna a la vinieta segun el ratio de votos y comentarios
     *
     * @param votos_pos votos positivos de la vinieta
     * @param votos_neg votos negativos de la vinieta
     * @param nComentarios numero de comentarios en la vinietas
     * @return String clase que asigna la ball correspondiente
     */
    public static function getBallFromVinieta($votos_pos, $votos_neg, $nComentarios){

        // calc necesary data
        $votos = $votos_pos + $votos_neg;
        $puntuacion = $votos_pos - $votos_neg;

        // devuelve la pokeball correspondiente
        if($votos >= 230 && $puntuacion > $votos * 90 / 100 && $nComentarios > 50)
            return "vin-master";
        else if($votos >= 100 && $puntuacion > $votos * 75 / 100 && $nComentarios > 23)
            return "vin-ultra";
        else if($votos >= 23 && $puntuacion > $votos / 2 && $nComentarios > 1)
            return "vin-super";
        else
            return "vin-poke";
    }


    /**
     * Dictamina cual es el texto a mostrar de un dato concreto.
     * Como comentarios, votos, fecha...
     *
     * @param nComentarios numero de comentarios en la vinieta
     * @return String texto a mostrar del numero de comentarios
     */
    public static function getNumComentToShow($nComentarios){

        if($nComentarios < 99)
            return $nComentarios;
        else
            return "+99";
    }
    public static function getNumLikesToShow($puntuacion){

        if($puntuacion < 999)
            return $puntuacion;
        else
            return "+999";
    }
    public static function getDateToShow($date, $hora){

        if(Util::getActualDay() != $date){
            return $date;
        }else{
            return substr($hora, 0, 5);
        }
    }
    public static function getNickToShow($nick){

        if(strlen($nick) < 15){
            return $nick;
        }else{
            return substr($nick, 0, 12) . "...";
        }
    }
    #endregion
}
