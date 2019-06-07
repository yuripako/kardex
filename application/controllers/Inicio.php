<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
		$this->load->model('Login_model');
		$this->load->model('Inicio_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
       //cargo los modulos 
       $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;
       
	   $this->load->view('dashboard/inicio', $data);	
	}

	public function loadmenu()
	{
		$idpermiso = $this->input->post('idpermiso');
		$query = $this->Inicio_model->load_menus($idpermiso);
		foreach ($query as $item) {
			if ($item->abreviatura=="0") {
				echo "<a class='dropdown-item' data-toggle='collapse' href='#multiCollapseExample1' 
				 aria-expanded='false' aria-controls='multiCollapseExample1'><i class='".$item->icono."'></i> ".$item->nom_menu."</a>";


				// echo "<a href='#' onclick='loadsubmenu($item->idmenu)' class='dropdown-item' style='color: darkblue;'> <i class='".$item->icono."'></i> ".$item->nom_menu."</a>";
			} else {
				echo "<a href='".base_url($item->abreviatura)."' class='dropdown-item'> <i class='".$item->icono."'></i> ".$item->nom_menu."</a>";

			}
			
		}
		
	}
 


}

