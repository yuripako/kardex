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

  
 public function buscaRuc()
 {
	 $ruc = $this->input->post("ruc");
	 $query  = $this->Ordcompra_model->load_ruc($ruc);
	 echo "<div class='list-group' >";
	 foreach ($query as $row) {
		echo" <a href='#' class='list-group-item list-group-item-action'
		onclick=\"selecruc('".$row->ruc_nif."' , '".$row->nom_emp."');\">".$row->ruc_nif."</li>";
	 }
	 echo"</div>";
 }
  
public function load_condiciones()
{
	$query  = $this->Ordcompra_model->load_condicion();
	echo"<select  class='form-control'>";
	echo"<option value=''>[--Seleccione--]</option>";
   foreach ($query as $row) {
	   echo" <option value='".$row->id_cond."'>".$row->nom_cond."</option>";
   }
                   
    echo"   </select>";
	

}
public function load_monedas()
{
	$query  = $this->Ordcompra_model->load_moneda();

   foreach ($query as $row) {
	   echo" <option value='".$row->cod_mone."'>".$row->cod_mone."</option>";
   }
                 
}
public function load_tipodocs()
{
	$query  = $this->Ordcompra_model->load_tipodoc();
	echo" <option value=''>[-Tipo-]</option>";
   foreach ($query as $row) {
	   echo" <option value='$row->cod_doc' >".$row->nom_doc."</option>";
   }               
	
}

public function load_series()
{
	$serieee = $this->input->post("serie");

	$query  = $this->Ordcompra_model->loadserie($serieee );
	echo" <option value=''>[-Serie-]</option>";
   foreach ($query as $row) {
	   if ($row->serie=="") {
		echo" <option value='' >No existe</option>";
	   }else {
		echo" <option value='".$row->serie."' >".$row->serie."</option>";
	   }
	  
   }       
}
   

}

