<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
				$this->load->model('Articulo_model');
				
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien jjjjjjjhhhhhh
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis articulos para el datatable.
	   $query2 = $this->Articulo_model->load_productos();
	   $data['articulos'] = $query2;
	
	   $this->load->view('dashboard/articulo', $data);
	}
	
	public function cargo_categorias()
	{
	  $query = $this->Articulo_model->select_categorias();
		echo"<option>--[ Seleecione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->id_cate'>".$item->nom_cate."</option>";
		}
	}

	public function cargo_unidades()
	{
	  $query = $this->Articulo_model->select_unidades();
		echo"<option>--[ Seleecione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->cod_unid'>".$item->nom_unid."</option>";
		}
	}

	public function cargo_monedas()
	{
	  $query = $this->Articulo_model->select_monedas();
		echo"<option>--[ Seleecione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->cod_mone'>".$item->nom_mone."</option>";
		}
	}

	public function verificar_codigo()
	{
 
				 $codigo = $this->input->post('codigo');
				 $query = $this->Articulo_model->existe_codigo($codigo);
				 //echo json_encode($query);
				if ($query=="FALSE") {
					 echo json_encode(1);
				}else
				{
				 echo json_encode(2);
				}
		 
	}
 

 public function insertar_productos()
 {

	$codigo = $this->input->post('codigo');
	$nombre= $this->input->post('nombre');
	$moneda= $this->input->post('moneda');
	$categoria= $this->input->post('categoria');
	$estado= $this->input->post('estado');
	$unidad= $this->input->post('unidad');
	$lote= $this->input->post('lote');
	$bien= $this->input->post('bien');
	$impuesto= $this->input->post('impuesto');
	$descripcion= $this->input->post('descripcion');

	$query = $this->Articulo_model->insertando_productos($codigo,$nombre,$moneda,$categoria,$estado,$unidad,$lote,$bien
	,$impuesto,$descripcion);
	 echo json_encode(11);
 }
	
 public function eliminar_productos()  
 {
	 $id =  $this->input->post('id');
	 $query = $this->Articulo_model->eliminarProducto($id);
   echo $query[0]->rpta;
 }








}