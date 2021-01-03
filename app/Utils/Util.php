<?php
namespace App\Utils;

class Util {
   const VIN_TAM_PAGE = 5;



   public static function getNextVinietaFromPage($page){

        return ($page - 1) * Util::VIN_TAM_PAGE;
   }



   public static function parseArray($data){

        // format result to be array
        $result = array_map(function ($value) {
            return (array)$value;
        }, $data);

        // return array
        return $result;
   }
}
