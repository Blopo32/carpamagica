<?php
namespace App\Utils;

use App\Utils\ConstVar;

/**
 * Clase con metodos genericos de utilidad
 */
class FileControl {


    /**
     * Devuelve la extension de un archivo dado el nombre
    *
    * @param fileName el nombre completo del archivo (Ej: archivo.jpg)
    * @return extension la extension del archivo (Ej: jpg)
    */
    public static function getExtensionFromFileName($fileName)
    {
        // se separan las partes del nombre
        $partsName = explode(".", $fileName);
        // devuelve el texto despues del ultimo .
        return end($partsName);
    }


    /**
     * Comprueba si una extension se encuentra en las extensiones aceptadas configuradas por la pagina
     *
     * @param ext extension a valorar (Ej: jpg)
     * @return extension la extension del archivo (Ej: jpg)
     */
    public static function isAcceptedExtension($ext)
    {
        return in_array($ext, cONSTvAR::EXT_VALID_IMG);
    }


    /**
     * Comprueba si un archivo tiene una extension permitida en la configuracion de la pagina
     *
     * @param fileName nombre completo del archivo subido (Ej: archivo.jpg)
     * @return boolean si la extension del archivo es aceptada
     */
    public static function hasValidExtension($fileName)
    {
        // obtenemos la extension del archivo
        $ext = FileControl::getExtensionFromFileName($fileName);
        // devuelve si es correcta
        return FileControl::isAcceptedExtension($ext);
    }


    /**
     * Comprueba si el tipo de un archivo es uno de los aceptados por la configuracion de la pagina
     *
     * @param fileType tipo del archivo a validar
     * @return boolean si el tipo es permitdo
     */
    public static function isValidImgType($fileType)
    {
        // devuelve si es correcta
        return preg_match(ConstVar::EXP_REGULAR_TYPE_IMG, $fileType);
    }


    /**
     * Comprueba si el tipo de un archivo es uno de los aceptados por la configuracion de la pagina
     *
     * @param fileType tipo del archivo a validar
     * @return boolean si el tipo es permitdo
     */
    public static function maxImgTamExceded($fileTam)
    {
        // devuelve si es correcta
        return !($fileTam > ConstVar::MAX_IMG_TAM);
    }
}
