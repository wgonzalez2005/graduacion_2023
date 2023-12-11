<?php
class autobus extends Controller
{
    private $datos = [];
    public function __construct()
    {
        parent::__construct();
        $this->view->datos="";
    }

    public function render()
    {
        $this->view->render("autobus/index");
    }

    public function getAutobus(){
        $d                  = $this->model->getAutobus();
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();

    }

    public function UpdateAutobus(){
        $id = $_POST["id"];
        $d                  = $this->model->UpdateAutobus($id);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getCoordinadores(){ 
        $d                  = $this->model->getCoordinadores();
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function BuscarCoordinadores(){
        $bus = "%".$_POST["bus"]."%";
        $d                  = $this->model->BuscarCoordinadores($bus);

        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getCantidad(){
        $autobusId = $_POST["autobusId"];
        $d                  = $this->model->getCantidad($autobusId);

        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   
    
   
}