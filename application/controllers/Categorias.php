<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Categorias_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Categorias_model->load_categoria();
	   $data['category'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/categorias', $data);
	}
   
	public function load_jerarquias()
	{
		$query = $this->Categorias_model->load_jerarquia();
		echo"<option>---------[ SELECCIONE  ]---------</option>";
		foreach ($query as $item)
		{
			echo "<option value='".$item->id_cate."'>".$item->descripcion."</option>";
		}

	}
  
	public function add_categoria()
	{
	  $categoria = $this->input->post('categoria');
	  $jerarquia1 = $this->input->post('jerarquia1');
	  if ($categoria=="" && $jerarquia1=="") 
	  {
		  echo "Seleccione datos";
	  }else
	  {
		$query = $this->Categorias_model->agregar_categoria();
	  }
	 
	}


   

}

