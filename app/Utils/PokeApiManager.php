<?php
namespace App\Utils;
use GuzzleHttp\Client;
use App\Exceptions\Handler;
use Exception;

/**
 * Clase con datos de tipo FINAL / CONSTANT que pueden ser utilizados
 */
class PokeApiManager{


    public static function getApiData($url){

        // poke request
        $client = new Client();
        $response = $client->get($url);

        // get data
        return $response->getBody();
    }

    public static function getSprite($name){

        try{
            // url for pokemon data
            $pokeApiUrl = "https://pokeapi.co/api/v2/pokemon/" . $name;
            $client = new Client();
            $response = $client->get($pokeApiUrl);
            $response2 = json_decode($response->getBody());
            //$response3 = json_decode($response);

            //var_dump($response2->{'sprites'}->{'other'}->{'official-artwork'}->{'front_default'});

            // return default sprite
            //return $response2->{'sprites'};
            return $response2->{'sprites'}->{'other'}->{'official-artwork'}->{'front_default'};

        }catch(Exception $e){
            return $name;
        }

    }

    public static function getSpriteList($limit){

        try{
            // url for pokemon data
            $pokeApiUrl = "https://pokeapi.co/api/v2/pokemon/?limit=" . $limit;
            $client = new Client();
            $response = $client->get($pokeApiUrl);
            $response2 = json_decode($response->getBody());
            //$response3 = json_decode($response);

            //var_dump($response2->{'sprites'}->{'other'}->{'official-artwork'}->{'front_default'});

            // return default sprite
            //return $response2->{'sprites'};
            return $response2->{'results'};

        }catch(Exception $e){
            return null;
        }

    }

}
