<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Unidades_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('cod_rol'));
       $data['modulos'] = $query;
       //fin de modulo si o si va esto en todos los contraladores.
       //cargo la tabla unidad
       $query2 = $this->Unidades_model->load_model_unidades();
       $data['unidads'] = $query2;
       //fin de unidades

	   $this->load->view('dashboard/unidades', $data);
	}


	public function add_unidad()
	{
	    $codigo      = $this->input->post('codigo');
        $nombre      = $this->input->post('nombre');
    	$descripcion = $this->input->post('descripcion');

    	if ($codigo =="" || $nombre =="" || $descripcion =="") {
    		echo json_encode(1);
    	}else {
    		$query = $this->Unidades_model->add_model_unidades($codigo, $nombre, $descripcion);
    		echo json_encode(2);
    	}

	}

    public function eliminar_unidad()
    {
    	$id =  $this->input->post('id');
    	$query = $this->Unidades_model->delete_model_unidades($id);
    	echo json_encode(1);

    }
    public function editado_unidades()
    {
    	
    	$codigo3       =  $this->input->post('codigo3');
    	$nombre3       =  $this->input->post('nombre3');
    	$descripcion3  =  $this->input->post('descripcion3');
        $query = $this->Unidades_model->edite_model_unidad($codigo3,$nombre3,$descripcion3 );
        echo json_encode(1);
       
    }
 




}

