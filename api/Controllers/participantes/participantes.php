<?php
class participantes extends Controller
{
    private $datos = [];
    public function __construct()
    {
        parent::__construct();
        $this->view->datos="";
    }

    public function render()
    {
        $this->view->render("participantes/index");
    }

    public function getParticipantes(){
        $bus = "%".$_POST["bus"]."%";        
              
        $d                  = $this->model->getParticipantes($bus);
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();

    }

    public function InsertarParticipantes(){
        $bus = "%".$_POST["bus"]."%";     
        $autobusId      = $_POST["autobusId"];
        $participanteId = $_POST["participanteId"];
        $d                  = $this->model->InsertarParticipantes($bus,$autobusId,$participanteId);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getParticipantesEnAutobuses(){
        $bus = "%".$_POST["bus"]."%";     
        $d                  = $this->model->getParticipantesEnAutobuses($bus);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    } 

    
    public function getCantidad(){
        $autobusId      = $_POST["autobusId"];
       
        $d                  = $this->model->getCantidad($autobusId);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getQuitarGraduando(){
        $autobusId      = $_POST["autobusId"];
        $graduandoId      = $_POST["graduandoId"];
       
        $d                  = $this->model->getQuitarGraduando($autobusId, $graduandoId);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getParticipantesAutobus(){
        $autobusId      = $_POST["autobusId"];
       
        $d                  = $this->model->getParticipantesAutobus($autobusId);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }  
    public function getBuscarGraduandoEnAutobus(){
        $bus       = "%".$_POST["bus"]."%";     
        $autobusId = $_POST["autobusId"];  
        $d                  = $this->model->getBuscarGraduandoEnAutobus($bus,$autobusId);
       
        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    } 

    public function Presente(){
        $op = $_POST["op"];
        $autobusId = $_POST["autobusId"];
        $graduandoId = $_POST["graduandoId"];
        $d                  = $this->model->Presente($op,$autobusId,$graduandoId);

        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    }   

    public function getCantidadAll(){
        
        $d                  = $this->model->getCantidadAll();

        $this->data['code'] = 200;
        $this->data['data'] = $d;

        $this->view->datos = json_encode($this->data);        
        $this->render();
    } 

    
    
    
    
   
}