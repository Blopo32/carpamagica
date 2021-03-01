<?php
namespace App\Utils;
use Illuminate\Support\Facades\DB;
use App\Utils\ConstVar;
use App\Utils\ConstSentences;
use App\Models\Vinieta;
use App\Models\Usuario;
use App\Models\User_puntua;
use Exception;


/**
 * Clase que se encarga de las conexiones con la base de datos
 * que requieren sentencias (no es necesaria al usar los Models)
 */
class DDBB {


    /**
     * Metodo generico que realiza una consulta en la base de datos de devuelve los datos obtenidos
     *
     * @param sentence sentencia que se va a ejecutar en la base de datos
     * @return Array Datos obtenidos en la consulta
     */
    public static function execSelect($sentence){

        // realiza la coonsulta en la BD y obtiene los datos
        $data = DB::select($sentence);

        // devuelve los datos de la base de datos en forma de array
        return Util::parseArray($data);
    }



    #region user
    /**
     * Obtiene los datos del usuario dado un nick
     *
     * @param userNick nick del usuario a buscar
     * @return Array los datos del usuario
     */
    public static function userData($userNick){

        // se devuelven los datos del primer usuario encontrado (solo deberia devolver 1)
        $sentence = str_replace(ConstSentences::REPLACER, $userNick, ConstSentences::USUARIO_DATOS);
        return DDBB::execSelect($sentence)[0];
    }


    /**
     * Update del atributo img_perfil del usuario con condigo $user
     *
     * @param user codigo del usuario al que le vamos a cambiar el perfil
     * @param perfil nueva imagen de perfil
     */
    public static function setPerfil($user, $perfil){

        // begin transaction
        $con = DB::connection('mysql');
        $con->beginTransaction();

        try{

            // get the user
            $user = Usuario::find($user);
            $user->img_perfil = $perfil;
            $user->save();

            // commit changes in database
            $con->commit();

        }
        catch(Exception $e){

            // rollback if there are any exception
            $con->rollback();
        }
    }
    #endregion



    #region vinietas
    /**
     * Obtiene de la base de datos una lista de vinietas añadiendo una paginación
     * adecuada para la pagina actuañ
     *
     * @param sentence sentencia que obtiene la lsita de vinietas
     * @param page pagina actual
     * @return Array lista de vinietas
     */
    public static function getPaginatedListOfVin($sentence, $page){

        // pagination vars
        $firstVin = Util::getNextVinietaFromPage($page);
        $lastVin = $firstVin + ConstVar::VIN_TAM_PAGE;

        // get data from data base
        $pagSentence = $sentence . ' LIMIT '. $firstVin .', '. $lastVin;
        return DDBB::execSelect($pagSentence);
    }


    /**
     * Obtiene un conjunto de vinietas para la pantalla "ULTIMOS"
     *
     * @param page pagina donde se encuentra el usuario
     * @return Array lista de vinietas de la pantalla "ULTIMOS" para la pagina actual
     */
    public static function getVinListUltimos($page){

        $sentence = ConstSentences::ULTIMOS_GENERIC;
        return DDBB::getPaginatedListOfVin($sentence, $page);
    }
    public static function getVinListUltimosVotedByUser($page, $user){

        $sentence = Util::REPLACE(ConstSentences::ULTIMOS_VOTO_USUARIO, $user);
        return DDBB::getPaginatedListOfVin($sentence, $page);
    }


    /**
     * Obtiene un conjunto de vinietas para la pantalla "MEJORES"
     *
     * @param page pagina donde se encuentra el usuario
     * @return Array lista de vinietas de la pantalla "MEJORES" para la pagina actual
     */
    public static function getVinListMejores($page){

        $sentence = ConstSentences::ULTIMOS_GENERIC . " ORDER BY puntuacion DESC";
        return DDBB::getPaginatedListOfVin($sentence, $page);
    }
    public static function getVinListMejoresVotedByUser($page, $user){

        $sentence = str_replace(ConstSentences::REPLACER, $user, ConstSentences::ULTIMOS_VOTO_USUARIO) . " ORDER BY puntuacion DESC";
        return DDBB::getPaginatedListOfVin($sentence, $page);
    }


    /**
     * Obtiene las paginas necesarias para mostrar todas las vinietas
     *
     * @return pages paginas necesarias para mostrar todas las vinietas
     */
    public static function getPagesForUltimos(){

        // get num of vinietas
        $sentence = Util::REPLACE(ConstSentences::VINIETAS_TABLE_COUNT, "lista_vinietas");
        $data = (DDBB::execSelect($sentence))[0]["vinietas"];

        // return how many pages we need
        return Util::getPagesFor($data);
    }


    /**
     * Obtiene los datos de una viñeta
     *
     * @param vinCod codigo de la vinieta a buscar
     * @param autor codigo del autor para comprobar si la ha votado
     */
    public static function getVinData($vinCod, $autor){

        $sentence = UTIL::REPLACE(ConstSentences::ULTIMOS_VOTO_USUARIO, $autor) . " HAVING U.codVinieta = " . $vinCod;
        return DDBB::execSelect($sentence)[0];
    }


    public static function getComentFromVin($vin, $order){

        $sentence = "SELECT C.*, (C.voto_pos + C.voto_neg) as puntos, U.nick, U.img_perfil FROM comentarios C, usuarios U WHERE C.usuario = U.cod AND C.vinieta = " . $vin . " ORDER BY " . $order;
        return DDBB::execSelect($sentence);
    }


    /**
     * Inserta en la base de datos el aporte del usuario y carga el archivo en el servidor
     *
     * @param file archivo que el usuario ha cargado
     * @param titulo titulo que el usuario le ha puesto a la vinieta
     * @param etiqueas lista de etiquetas que el usuario ha indicado para la vinieta
     * @param categoria tipo de archivo que esta subiendo (img, video...)
     */
    public static function nuevoAporte($file, $titulo, $etiquetas, $categoria){

        // get user logged like autor
        $autor = SessionControl::getSessionCod();

        // begin transaction
        $con = DB::connection('mysql');
        $con->beginTransaction();


        try{

            // add new vinieta in database
            $vinieta = new Vinieta;
            $vinieta->titulo = $titulo;
            $vinieta->autor = $autor;
            $vinieta->categoria = $categoria;
            $vinieta->etiquetas = ConstVar::LIST_SEPARATOR . $etiquetas . ConstVar::LIST_SEPARATOR;
            $vinieta->save();

            // set name of the vinieta
            $vinieta->nombre = "vin_" . $vinieta->cod . ".jpeg";
            $vinieta->save();

            // load the file in the server
            $file->move(public_path('/aportes/publicaciones'),  $vinieta->nombre);

            // commit changes in database
            $con->commit();

            echo "comiteado";

        } catch(Exception $e){

            // rollback if there are any exception
            $con->rollback();
        }
    }
    #endregion



    public static function votarVinieta($user, $vin, $voto){

        // begin transaction
        $con = DB::connection('mysql');
        $con->beginTransaction();
        $problema = "El usuario " . $user . "va a votar la vinieta " . $vin . " con un " . $voto;

        try{

            // add new vinieta in database
            $votacion = new User_puntua;
            $votacion->user = $user;
            $votacion->vinieta = $vin;
            $votacion->valor = $voto;
            $votacion->save();

            // commit changes in database
            $con->commit();
            $problema = "ha comiteado";
            return true;

        } catch(Exception $e){

            // rollback if there are any exception
            $con->rollback();
            return $e;
        }
    }



    #region votacion aportes


    public static function vinietaVotada($user, $vin){


    }

    #endregion
}
