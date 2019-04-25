
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');  //Este si va  
        $this->load->model('Usuario_model');                
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';  //Si va
       $data['footer']  = 'dashboard/footer';  //Si va       
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis usuarios
       $query2 = $this->Usuario_model->load_usuario();
       $data['userload'] = $query2;

        //Cargo mis roles
     // $query3 = $this->Usuario_model->load_usuario222();
       // $data['useraddrol'] = $query2;

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/usuario', $data);
    }

    /* public function insert_usuario(){             //Método para inserta, actualizar, eliminar
       $usuario = $this->input->post('user');
       $query = $this->Usuario_model->insert_usuarios($usuario);
       
   } */
    
   public function insertprobando(){
       $cod = $this->input->post('cod');
       $tipo = $this->input->post('tipo');
       $query = $this->Usuario_model->insert_neousuario($cod,$tipo);
       
        echo json_encode (1);

   }
   public function add_usuario()
   {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $documento = $this->input->post('documento');
        $correo = $this->input->post('correo');
        $usuario = $this->input->post('usuario');
        $passwd = $this->input->post('passwd');
        $perfil = $this->input->post('selrol');
               
       if ($nombre =="" || $usuario =="") {
           echo json_encode(1);
       }else {
           $query = $this->Usuario_model->insert_neousuario($nombre, $apellido,$documento,$correo,$usuario,$passwd,$perfil);
           echo json_encode(2);
       }
       
   }
   public function editar_usuario()
    {
        $username = $this->input->post('username');        
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $documento = $this->input->post('documento');
        $correo = $this->input->post('correo');        
        //$passwd = $this->input->post('passwd');
        $perfil = $this->input->post('selrol');
        $query = $this->Usuario_model->editar_model_usuario($username,$nombre,$apellido,$documento,$correo,$perfil);
        echo json_encode(1);

    }




}