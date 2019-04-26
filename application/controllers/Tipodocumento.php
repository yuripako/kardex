<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipodocumento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Tipodocumento_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Tipodocumento_model->load_tipodocumento();
       $data['tipodocumento'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/tipodocumento', $data);
    }

}