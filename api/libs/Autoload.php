<?php
require 'Controllers/errores/errores.php';
class Autoload
{
    public function __construct()
    {
        $url = ((isset($_GET['url'])) ? $_GET['url'] : "autobus/getAutobus");
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        /*Creamos la ruta del controlador*/
        $FileController = 'Controllers/' . $url[0] . "/" . $url[0] . ".php";

        if ($this->ExistePermiso($url[0]) == true) {

            if (file_exists($FileController)) {
                require $FileController;
                /*Creamos una instancia del controlador*/
                $controller = new $url[0];

                if (isset($url[1])) {

                    $parametros = sizeof($url);
                    if ($parametros > 1) {

                        if ($parametros > 2) {
                            $nparam = [];
                            for ($i = 2; $i < $parametros; $i++) {
                                echo  $url[$i];
                                array_push($nparam, $url[$i]);
                            }

                            $controller->{$url[1]}($nparam);
                        } else {
                            $controller->{$url[1]}();
                        }
                    }
                    $controller->render($url[1]);

                } else {
                    $controller->render("index");
                }

            } else {
                $controller                     = new errores();
                $controller->view->mensajeError = "[" . $url[0] . "]" . constant("ERROR_CONTROLADOR");
                $controller->render();
            }

        } else {

            $controller                     = new Errores();
            $controller->view->mensajeError = "[" . $url[0] . "]" . constant("ERROR_CONTROLADOR");
            $controller->render();

        }
    }

    public function ExistePermiso($clave)
    {

        if (isset($_SESSION['seguridad'])) {

            return ((array_search($clave, array_column($_SESSION['seguridad'], 'permiso')) > -1) ? true : false);

        } else {
            return true;
        }
    }
}
