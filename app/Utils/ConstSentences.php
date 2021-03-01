<?php
namespace App\Utils;


/**
 * Clase con datos de tipo FINAL / CONSTANT que pueden ser utilizados
 */
class ConstSentences {


    /** REPLACER */
    const REPLACER = "#{REPLACER}";


    /** USUARIO */
    // datos del usuario
    const USUARIO_DATOS = "SELECT * FROM usuarios WHERE nick = \"" . ConstSentences::REPLACER . "\"";


    /** LISTA VINIETAS */
    // todas las vinietas
    const ULTIMOS_GENERIC = "SELECT * FROM lista_vinietas";
    // recuento de vinietas
    const VINIETAS_TABLE_COUNT = "SELECT COUNT(*) AS vinietas FROM " . ConstSentences::REPLACER;
    // Interaccion vinietas usuario logged
    const ULTIMOS_VOTO_USUARIO = "SELECT U.*, UP.valor AS 'votoUsuario'
                                    FROM lista_vinietas U LEFT OUTER JOIN user_puntua UP
                                    ON U.codVinieta = UP.vinieta AND UP.user = " . ConstSentences::REPLACER;
    const COMENTARIOS_VINIETA = "SELECT * FROM comentarios WHERE vinieta = " . ConstSentences::REPLACER;


}
