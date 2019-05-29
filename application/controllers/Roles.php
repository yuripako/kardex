<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Roles_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Roles_model->load_roles();
	   $data['roles'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/roles', $data);
	}
   

   public function addrol()
   {
     $rol = $this->input->post('rol');
     if ($rol=="") {
         echo "Rellene el formulario";
     }else{
        $query =  $this->Roles_model->agregar_rol($rol);
        echo $query[0]->response_sproles;
  
     }
   }

   public function delete_rol()
   {
     $idrol =  $this->input->post('idrol');
     $query =  $this->Roles_model->borra_rol($idrol);
     echo $query[0]->response_sproles;
   }
 
    public function update_roles()
    {
      $idrol = $this->input->post('ridrol');
      $nomrol = $this->input->post('rrol');
      $estado = $this->input->post('restado'); 
      $query =  $this->Roles_model->update_rol($idrol,$nomrol,$estado);
      echo $query[0]->response_sproles; 
    }


   

}

