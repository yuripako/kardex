<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unmedida extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Unmedida_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Unmedida_model->load_unmedida();
       $data['unmedida'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/unmedida', $data);
    }

    public function addunmedida()
    {
        $cod_unid = $this->input->post('codigo');
        $nom_unid = $this->input->post('nombre');
        $cod_ubl = $this->input->post('codigoubl');
        $descripcion = $this->input->post('descripcion');       
        $estado = $this->input->post('estado');

        $this->Unmedida_model->agregar_unmedida($cod_unid,$nom_unid,$cod_ubl,$descripcion,$estado);
        echo json_encode (1);        
        
    }
    public function updunmedida()
    {
        $cod_unid = $this->input->post('codigo');
        $nom_unid = $this->input->post('nombre');
        $cod_ubl = $this->input->post('codigoubl');
        $descripcion = $this->input->post('descripcion');        
        $estado = $this->input->post('estado');

        $this->Unmedida_model->actualiza_unmedida($cod_unid,$nom_unid,$cod_ubl,$descripcion,$estado);
        echo json_encode (1);
    }
    public function delunmedida(){
        $cod = $this->input->post('cod');
        $this->Unmedida_model->borrar_unmedida($cod);
        echo json_encode (1);
    }
}
