<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Vendedor_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Vendedor_model->load_vendedor();
       $data['vendedor'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/vendedor', $data);
    }

    public function addvendedor()
    {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $nrodocumento = $this->input->post('nrodocumento');
        $telefono = $this->input->post('telefono');
        $correo = $this->input->post('correo');
        $zona = $this->input->post('zona');
        $region = $this->input->post('region');
        $estado = $this->input->post('estado');

        $this->Vendedor_model->agregar_vendedor($nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado);
        echo json_encode (1);        
        
    }
    public function updvendedor()
    {
        $uidvendedor = $this->input->post('uidevendedor');
        $nombre = $this->input->post('unombre');
        $apellido = $this->input->post('uapellido');
        $nrodocumento = $this->input->post('udocumento');
        $telefono = $this->input->post('utelefono');
        $correo = $this->input->post('ucorreo');
        $zona = $this->input->post('uzona');
        $region = $this->input->post('uregion');
        $estado = $this->input->post('uestado');

        $this->Vendedor_model->actualiza_vendedor($uidvendedor,$nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado);
        echo json_encode (1);
    }
    public function delvendedor(){
        $cod = $this->input->post('cod');
        $this->Vendedor_model->borrar_vendedor($cod);
        echo json_encode (1);
    }
}



