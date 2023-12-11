<?php
require 'Controllers/errores/errores.php';
class Autoload
{
    public function __construct()
    {
        $url = ((isset($_GET['url'])) ? $_GET['url'] : "inicio/");
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        /*Creamos la ruta del controlador*/
        $FileController = 'Controllers/' . $url[0] . "/" . $url[0] . ".php";

        if (file_exists($FileController)) {
            require $FileController;
            /*Creamos una instancia del controlador*/
            $controller = new $url[0];

            if (isset($url[1])) {

                $parametros = sizeof($url);
                if ($parametros > 1) {
                    //print_r($parametros);
                    if ($parametros > 2) {
                        $nparam = [];
                        for ($i = 2; $i < $parametros; $i++) {
                            array_push($nparam, $url[$i]);
                        }
                        
                        $controller->{$url[1]}($nparam);
                    } else {
                        $controller->{$url[1]}();
                    }
                }
                $controller->render();

            } else {
                $controller->render();
            }

        } else {
            $controller = new Errores();
            $controller->Error("[" . $url[0] . "]" . constant("ERROR_CONTROLADOR"));
        }
    }
}
