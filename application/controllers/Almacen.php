<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Almacen_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Almacen_model->load_almacen();
       $data['almacen'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/almacen', $data);
    }
    
    public function addalmacen()
    {        
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                 
        $valor05 = $this->input->post('valor05');                 

        $query = $this->Almacen_model->agregar_almacen($valor01,$valor02,$valor03,$valor04,$valor05);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updalmacen()
    {
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                
        $valor05 = $this->input->post('valor05');                                      

        $query = $this->Almacen_model->actualiza_almacen($valor01,$valor02,$valor03,$valor04,$valor05);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function delalmacen(){
        $cod = $this->input->post('cod');        
        $query = $this->Almacen_model->borrar_almacen($cod);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
