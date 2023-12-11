<?php
use Firebase\JWT\JWT;

require_once './Data/JWT.php';
class Auth
{
    private static $key     = "**Sdw1s9x8@**";
    private static $encrypt = ["HS256"];

    /*RECIBE UN ARRAY POR LO MENOS 3 CLAVES Y VALOR*/
    public static function Aut($data)
    {
        return JWT::encode($data, self::$key);
    }

    /*DEVUELVE UN ARRAY*/
    public static function getData($token)
    {
        return JWT::decode($token, self::$key, self::$encrypt);
    }

}
