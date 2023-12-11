<?php
class errores extends Controller
{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function render()
    {
        $this->view->render("errores/index");
    }
    
    public function Error($error)
    {
        echo $error;
    }

}
