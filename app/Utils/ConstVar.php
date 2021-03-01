<?php
namespace App\Utils;


/**
 * Clase con datos de tipo FINAL / CONSTANT que pueden ser utilizados
 */
class ConstVar {

    const REPLACER = "#{REPLACER}";

     /** User */
     const GENERO_ANON = "anonimo";
     const PERFIL_DEFAULT = "default";

     /** Session Vars */
     const SESSION_VAR = "CarpaMagik";
     // nick
     const SESSION_USER = "CarpaUser";
     const USER_NICK_ANON = "anonimo";
     // id
     const SESSION_ID_USER = "CarpaId";
     const USER_ID_ANON = -23;
     // img perfil
     const SESSION_IMG_USER = "CarpaImg";
     const USER_IMG_ANON = "default";


     /** Configuracion */
     const VIN_TAM_PAGE = 5;
     CONST LIST_SEPARATOR = ";";
     // file configuration
     const EXT_VALID_IMG = array("jpg", "jpeg", "gif", "png");
     const EXP_REGULAR_TYPE_IMG = "/^image\/(pjpeg|jpeg|gif|png)$/";
     const MAX_IMG_TAM = 5 * 1024 * 1024;    // 5 Mb
     const SERVER_ROUTE_VIN = "aportes/publicaciones";


     /** Routing vars */
     const PAGINATION_URL = "/page";
     const ULTIMOS_URL = "/ultimos";
     const mejores_URL = "/mejores";


     /** Data Base */
     const DB_NAME = "mysql";


     /** Vinietas */
     const COLOR_VOTO_POS = "#FFD700";
     const COLOR_VOTO_neg = "wheat";
     // order mode
     const ORDER_MEJORES = "mejores";
     const ORDER_ULTIMOS = "last";
     const ORDER_CRONO = "crono";



     /** URLs */
     const URL_SPRITE_DREAMWORLD = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/" . ConstVar::REPLACER . ".svg";
     const URL_SPRITE_OFICIAL = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" . ConstVar::REPLACER . ".svg";
     const URL_SPRITE = ConstVar::URL_SPRITE_DREAMWORLD;


}
