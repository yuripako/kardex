<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipomov extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Tipomov_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Tipomov_model->load_tipomov();
       $data['tipomov'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/tipomov', $data);
    }
    
    public function addtipomov()
    {        
        $valor02 = $this->input->post('detallemov');
        $valor03 = $this->input->post('tipomov');
        $valor04 = $this->input->post('prefijomov');                 
        $valor05 = $this->input->post('estadomov');                 

        $query = $this->Tipomov_model->agregar_tipomov($valor02,$valor03,$valor04,$valor05);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updtipomov()
    {
        $valor01 = $this->input->post('ucodtipomov');
        $valor02 = $this->input->post('udetallemov');
        $valor03 = $this->input->post('utipomov');
        $valor04 = $this->input->post('uprefijomov');                
        $valor05 = $this->input->post('uestadomov');                

        $query = $this->Tipomov_model->actualiza_tipomov($valor01,$valor02,$valor03,$valor04,$valor05);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function deltipomov(){
        $cod = $this->input->post('cod');
        $fecha = $this->input->post('fecha');
        $query = $this->Tipomov_model->borrar_tipomov($cod,$fecha);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
