<?php
class consultas extends Controller
{
    private $datos = [];

    public function __construct()
    {
        parent::__construct();

    }

    public function render()
    {
       
    }

    /*AUTOBUSES*/
    public function getAutobuses(){
        $d         = $this->model->getAutobuses();
        echo json_encode($d);    
    }


    public function getParticipantesAutobus()
    {
        $d         = $this->model->getParticipantesAutobus();
        echo json_encode($d);  
    
    }

    public function UpdateEntregar()
    {

        $d                  = $this->model->UpdateEntregar();
        echo json_encode($d); 

    }

    public function UpdateEntregar2()
    {

        $d                  = $this->model->UpdateEntregar2();
        echo json_encode($d); 

    }

    public function BuscarGraduandos()
    {
        $bus          = "%".$_POST["bus"]."%";
        $d                  = $this->model->BuscarGraduandos($bus);
        echo json_encode($d); 

    }

    // public function getGraduandosId()
    // {
    //     $id          = $_POST["id"];
    //     $d                  = $this->model->getGraduandosId($id);
    //     echo json_encode($d); 

    // }

    /*ASISTENCIA*/
    // public function getDatosAsistencia()
    // {        
    //     $d                  = $this->model->getDatosAsistencia();
    //     echo json_encode($d); 

    // }

    
    // public function BuscarGraduandosPresentes()
    // {
    //     $bus          = "%".$_POST["bus"]."%";
    //     $d                  = $this->model->BuscarGraduandosPresentes($bus);
    //     echo json_encode($d); 

    // }

    /*OCUPACION*/

    // public function getDatosOcupacion()
    // {
    //     $d                  = $this->model->getDatosOcupacion();
    //     echo json_encode($d); 

    // }
    // public function getDatosOcupacionId()
    // {
    //     $id          = $_POST["id"];
    //     $d                  = $this->model->getDatosOcupacionId($id);
    //     echo json_encode($d); 

    // }

   /*FAMILIAS*/

//    public function getDatosFamilias()
//    {
//        $d                  = $this->model->getDatosFamilias();
//        echo json_encode($d); 

//    }
//    public function getDatosFamiliasId()
//    {
//        $id          = $_POST["id"];
//        $d                  = $this->model->getDatosFamiliasId($id);
//        echo json_encode($d); 

//    }



    
    

}
