<?php
namespace App\Utils;

use App\Utils\ConstVar;


/**
 * Clase con metodos genericos de utilidad
 */
class Util {

     /**
      * Obtiene la primera vinieta que debe mostrarse en la pagina
      * 
      * @param page pagina actual
      */
     public static function getNextVinietaFromPage($page){

          return ($page - 1) * ConstVar::VIN_TAM_PAGE;
     }


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
}
