<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubigeo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Ubigeo_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Ubigeo_model->load_ubigeo();
       $data['ubigeo'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/ubigeo', $data);
    }
    
    
    public function addubigeo()
    {
        $codubigeo = $this->input->post('codubigeo');
        $departamento = $this->input->post('departamento');
        $provincia = $this->input->post('provincia');
        $distrito = $this->input->post('distrito');                 

        $query = $this->Ubigeo_model->agregar_ubigeo($codubigeo,$departamento,$provincia,$distrito);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updubigeo()
    {
        $codubigeo = $this->input->post('codubigeo');
        $departamento = $this->input->post('departamento');
        $provincia = $this->input->post('provincia');
        $distrito = $this->input->post('distrito');                

        $query = $this->Ubigeo_model->actualiza_ubigeo($codubigeo,$departamento,$provincia,$distrito);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function delubigeo(){
        $cod = $this->input->post('cod');        
        $query = $this->Ubigeo_model->borrar_ubigeo($cod);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
