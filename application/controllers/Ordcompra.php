<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordcompra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Ordcompra_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
	   $this->load->view('dashboard/ordcompra', $data);
	}
	 
	public function loadproductos()
	{
	   $query  = $this->Ordcompra_model->load_compra();	
	   echo json_encode($query);
	}

	public function llenadofactura()
	{
		$precio =  $this->input->post("precio");
		$cantidad =  $this->input->post("cantidad");
		$codigo =  $this->input->post("codigo");
		$producto =  $this->input->post("producto");
		$datos = array(
			'precio' =>$precio ,
			'cantidad' =>$cantidad ,
			'codigo' =>$codigo ,
			'producto' =>$producto 
	       );
		  echo" <tr >";
		   
		
		   foreach ($datos as $item) {
			echo"<td>".$item[0]."</td>";
			echo"<td></td>";
			echo"<td></td>";
			echo"<td> <td>";                   
		   }
		   echo"</tr>";

	}





   

}

