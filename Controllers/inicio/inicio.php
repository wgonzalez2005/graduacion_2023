<?php
class inicio extends Controller
{
    private $datos = [];

    public function __construct()
    {
        parent::__construct();

    }

    public function render()
    {
        $this->view->render("inicio/index");
    }

    

}
