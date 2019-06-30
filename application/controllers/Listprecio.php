<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listprecio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Listprecio_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Listprecio_model->load_listaprecio();
	   $data['listprecio'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/listprecio', $data);
	}
   

   

}
