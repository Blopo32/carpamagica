<?php
namespace App\Utils;
use Illuminate\Support\Facades\DB;
use App\Utils\ConstVar;


/**
 * Clase que se encarga de las conexiones con la base de datos
 * que requieren sentencias (no es necesaria al usar los Models)
 */
class DDBB {
   

   /**
    * Obtiene un conjunto de vinieras para la pantalla "ULTIMOS"
    * 
    * @param page pagina donde se encuentra el usuario
    */
   public static function ultimosPagination($page){

         // pagination vars
         $firstVin = Util::getNextVinietaFromPage($page);
         $lastVin = $firstVin + ConstVar::VIN_TAM_PAGE;

         // get data from data base
         $data = DB::select('SELECT * FROM ultimos ORDER BY codVinieta DESC LIMIT '. $firstVin .', '. $lastVin);

         // format result to be array
         return Util::parseArray($data);
   }


   /**
    * Obtiene las etiquetas de una vinieta
    * 
    * @param vinCode codigo de la vinieta a la que pertenecen
    */
   public static function etiquetasFromVinieta($vinCode){

      // get data from data base
      $data = DB::select('PENDIENTE DE CREAR SENTENCIA');

      // format result to be array
      return Util::parseArray($data);
   }
}
