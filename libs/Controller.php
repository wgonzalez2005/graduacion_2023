<?php
class Controller
{
    public function __construct()
    {

        $model      = get_class($this);
        $this->view = new View();

        if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && isset($_SESSION['MAX_SESSION_TIEMPO']) && ((time() - $_SESSION['ULTIMA_ACTIVIDAD']) > $_SESSION['MAX_SESSION_TIEMPO'])) {
            header('location:inicioweb/cerrarsession');
        }

        $_SESSION['ULTIMA_ACTIVIDAD'] = time();

        if (isset($_POST['token'])) {
            $_SESSION['token'] = $_POST['token'];
        }

        $url = "Models/" . $model . "/" . $model . "Model.php";
        if (file_exists($url)) {
            require $url;
            $modelName   = $model . "Model";
            $this->model = new $modelName;
        }

    }
}
