<?php
class autobus extends Controller
{
    private $datos = [];

    public function __construct()
    {
        parent::__construct();

    }

    public function render()
    {
        $this->view->render("autobus/index");
    }

    // public function getComandos($datos)
    // {
    //     $idEmpresa = $datos[0];
    //     $token     = $datos[1];
    //     $d         = $this->model->getComandos($idEmpresa);

    //     $this->data['data'] = $d;

    //     $this->view->datos = json_encode($this->data);
    //     $this->view->render("comandos/index");

    // }

    // public function UpdateClientes($datos)
    // {

    //     $idCliente          = $datos[0];
    //     $d                  = $this->model->UpdateClientes($idCliente, $token);
    //     $this->data['data'] = '{"ok":"ok"}';
    //     $this->view->datos  = json_encode($this->data);
    //     $this->view->render("comandos/index");

    // }

    // public function UpdateApi($datos)
    // {
    //     $idApi              = $datos[0];
    //     $estado             = $datos[1];
    //     $d                  = $this->model->UpdateApi($idApi, $estado);
    //     $this->data['data'] = '{"ok":"ok"}';
    //     $this->view->datos  = json_encode($this->data);
    //     $this->view->render("comandos/index");

    // }

}
