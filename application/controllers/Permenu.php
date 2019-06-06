<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Permenu_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Permenu_model->load_permenu();
	   $data['permenus'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/permenu', $data);
	}
  public function dar_permisomodulo()
  {
   
    $query = $this->Permenu_model->load_darpermiso();

     echo "<option option value=''>--[Seleccione]--</option>";
     foreach ($query as $item) {
      echo "<option value='".$item->id_permiso."'>".$item->modulo."</option>";
     }
 
  }


  public function load_permiso_rol()
  {
    $idrol = $this->input->post('idrol');
    $query = $this->Permenu_model->load_permiso_rol($idrol);

    echo"<ul class='list-group'>";
    echo"<li class='list-group-item d-flex justify-content-between align-items-center active'>";
    echo"Modulos Activos";
    echo"        <small class='text'>Estado</small>    ";
    echo"</li>";
     foreach ($query as $item) {
         
       echo"<li class='list-group-item d-flex justify-content-between align-items-center'>";
       echo $item->modulo;
       if ($item->estado==1) {
        echo"  <button type='button'class='btn btn-success btn-sm' disabled>Habilitado</button>";
       } if ($item->estado==0) {
        echo"  <button type='button'class='btn btn-danger btn-sm' disabled>InHabilitado</button>";
       }
       
       
       echo"</li>";
        
     }
    echo"</ul>";
  }
  
  public function load_rolesmenus()
  {
    $query = $this->Permenu_model->load_rolesmenu();
    echo "<option value=''>--[Seleccione]--</option>";
    foreach ($query as $item) {
      echo"<option value='".$item->id_rol."'>".$item->nom_rol."</option>";
    }
  }
   
  public function darlepermiso()
  {
      $selecmod = $this->input->post('selecmod');
      $selecrol = $this->input->post('selecrol');
      $estado = $this->input->post('estado');
      if ($selecmod=="" || $selecrol=="") {
          echo"Seleccion las opciones";
      } else {
        $query = $this->Permenu_model->validandopermiso($selecmod,$selecrol,$estado);
        echo $query[0]->response_permisomenu;
      } 
  }
 
  public function denegarpermiso()
  {
      $selecmod = $this->input->post('selecmod');
      $selecrol = $this->input->post('selecrol');
      $estado = $this->input->post('estado');
      if ($selecmod=="" || $selecrol=="") {
          echo"Seleccion las opciones";
      } else {
        $query = $this->Permenu_model->deniegue_permiso($selecmod,$selecrol,$estado);
        echo $query[0]->response_permisomenu;
      } 
  }
 

}

