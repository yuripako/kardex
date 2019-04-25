<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
        if ($this->session->userdata('login')) {
        	   redirect(base_url('Inicio'));
        }else {
	      
	       $this->load->view('login.php');
        }

		
	}

    public function validar_entrada()
    {
    	$user =  $this->input->post('user');
    	$pass =  $this->input->post('pass');
         
        if ($user=="" || $pass=="") {
         	echo  json_encode(1); //imprimo 0 si son campos vacios.. lo puedes validar tambien con el js
         }else{
         	 
              $query = $this->Login_model->verificar_acceso($user, $pass);

              if ($query == FALSE) {
                  echo json_encode(2);	  // sino encuentra nada imprimo 1 para el mensajde de alerta        	
		        }else {		       
				    $data = array // este arreglo jala las celda e igualo datos de un array
		        	(
						//u.id_user,r.id_rol,u.username, r.nom_rol,ti.nom_tipo
			        'id_user'     => $query->id_user,
			        'id_rol'     => $query->id_rol,
			        'username'    => $query->username,
			        'nom_rol'     => $query->nom_rol,
			        'nom_tipo'    => $query->nom_tipo,
			        'login'       => TRUE
					);
	                $this->session->set_userdata($data);  // variable de session no te preocupes solo haras el backend

	                echo json_encode(3); // si es verdadero imprimo 2 y mando el mensaje de alerta y redirecciono con el js
			     }

         }
         

    }


   public function salir_sistema()
   {
 
    	session_destroy();
    	echo json_encode(1);
    
   }









}

