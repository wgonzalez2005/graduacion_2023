<?php
class Errores extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->view->render("errores/index");

    }
    public function Error($error)
    {
        echo $error;
    }

}
