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
	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/categorias', $data);
	}

    public function add_categoria()
    {
    	$categoria   = $this->input->post('categoria');
    	$descripcion = $this->input->post('descripcion');

    	if ($categoria =="" || $descripcion =="") {
    		echo json_encode(1);
    	}else {
    		$query = $this->Categorias_model->add_model_categoria($categoria, $descripcion);
    		echo json_encode(2);
    	}
    	
    }

    public function eliminar_categoria()
    {
    	$id =  $this->input->post('id');
    	$query = $this->Categorias_model->delete_model_categoria($id);
    	if ($query==FALSE) {
			echo json_encode(0);
		}else {
			//$this->Categorias_model->delete_filtrado_categoria($id);
			echo json_encode(1);
		}

	}
	 // ------borrado por validacion------------------
   public function eliminar_categoria2(){
	$id =  $this->input->post('id');
	$this->Categorias_model->delete_filtrado_categoria($id);
	 echo json_encode(11);
   }

    //-------------------
    public function editado_categoria()
    {
    	$ide          =  $this->input->post('ide');
    	$categoria2   =  $this->input->post('categoria2');
    	$descripcion2 =  $this->input->post('descripcion2');
        $query = $this->Categorias_model->edite_model_categoria($ide,$categoria2,$descripcion2 );
        echo json_encode(1);

    }

   

}

