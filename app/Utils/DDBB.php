<?php
namespace App\Utils;
use Illuminate\Support\Facades\DB;
use App\Utils\Util;

class DDBB {
   const VIN_TAM_PAGE = 5;



   public static function ultimosPagination($page){

        // pagination vars
        $firstVin = Util::getNextVinietaFromPage($page);
        $lastVin = $firstVin + Util::VIN_TAM_PAGE;

        // get data from data base
        $data = DB::select('SELECT * FROM ultimos ORDER BY codVinieta DESC LIMIT '. $firstVin .', '. $lastVin);

        // format result to be array
        return Util::parseArray($data);
   }




}
