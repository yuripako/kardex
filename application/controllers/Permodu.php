<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permodu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Permodu_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Permodu_model->load_permenu();
	   $data['permenus'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/permodu', $data);
	}
 

  public function load_permiso_rol()
  {
    $idrol = $this->input->post('idrol');
    $query = $this->Permodu_model->load_permiso_rol($idrol);

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
  

 public function usuario_modulos()
 {
    $con=1;
  $query = $this->Permodu_model->usuario_modulo();
     echo " <table class='table table-bordered'>";
      echo "<thead>";
     echo "   <tr>";
     echo "     <th>#</th>";
     echo "     <th>Usuario</th>";
    echo "      <th>Módulo</th>";
    echo "      <th>Estado</th>";
     echo "     <th>Acciones</th>";
    echo "    </tr>";
    echo "  </thead>";
    echo "  <tbody>";
    foreach ($query as $item) {
    echo "    <tr>";
    echo "     <td>".$con++."</td>";
     echo "     <td>".$item->nombre." ".$item->Apellido."</td>";
  
     echo "     <td><span class='badge badge-primary'>".$item->modulo."</span></td>";
     echo "     <td>";
     if ($item->estado==1) {
      echo"  <button type='button'class='btn btn-info btn-sm' disabled>Habilitado</button>";
     } if ($item->estado==0) {
      echo"  <button type='button'class='btn btn-danger btn-sm' disabled>InHabilitado</button>";
     }
     echo "     </td>";
    echo "      <td><button type='button' class='btn btn-success btn-sm'  onclick='permitir(1,$item->id)'>Permitir</button>";
    echo "   <button type='button' class='btn btn-danger btn-sm' onclick='denegar(0,$item->id)'>Denegar</button></td>";
    echo "    </tr>";
      }
     echo " </tbody>";
   echo " </table>";
 }


  public function darlepermiso()
  {
      $estado = $this->input->post('estado');
      $id = $this->input->post('id');
     
        $query = $this->Permodu_model->validandopermiso($id,$estado);
        echo $query[0]->response_permisomenu;
      
  }
 
  public function denegarpermiso()
  {
    $estado = $this->input->post('estado');
    $id = $this->input->post('id');
    $query = $this->Permodu_model->deniegue_permiso($id,$estado);
    echo $query[0]->response_permisomenu;
     
  }
 

}

