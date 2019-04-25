<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moneda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Moneda_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Moneda_model->load_moneda();
       $data['moneda'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/moneda', $data);
    }


    public function addmoneda (){
        
        $codigo = $this->input->post('codigo');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $estado = $this->input->post('estado');

        $this->Moneda_model->agregar_moneda($codigo,$nombre,$descripcion,$estado);
        echo json_encode (1);
    }

    public function delmoneda(){
        $cod = $this->input->post('cod');
        $this->Moneda_model->borrar_moneda($cod);
        echo json_encode (1);
    }

    public function updmoneda (){
        
        $ucodigo = $this->input->post('ucodigo');
        $unombre = $this->input->post('unombre');
        $udescripcion = $this->input->post('udescripcion');
        $uestado = $this->input->post('uestado');

        $this->Moneda_model->actualiza_moneda($ucodigo,$unombre,$udescripcion,$uestado);
        echo json_encode (1);
    }

}