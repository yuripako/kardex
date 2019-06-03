
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

    public function load_usuario_roles()
	{
        $query = $this->Usuario_model->load_usuario_role(); 
        echo"<option>-----[ Seleccione ]-----</option>";
        foreach ($query as $item) 
        {
            echo"<option value='".$item->id_rol."'>".$item->nom_rol."</option>";
        }
    }
    
    public function load_usuario_perfils()
	{
        $query = $this->Usuario_model->load_usuario_perfil(); 
        echo"<option>-----[ Seleccione ]-----</option>";
        foreach ($query as $item) 
        {
            echo"<option value='".$item->id_tipo."'>".$item->nom_tipo."</option>";
        }
    }



   public function add_usuario()
   {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $documento = $this->input->post('documento');
        $correo = $this->input->post('correo');
        $usuario = $this->input->post('usuario');
        $passwd = $this->input->post('passwd');
        $selrol = $this->input->post('selrol');
        $selper = $this->input->post('selper');
        
        if ($nombre =="" || $apellido =="" || $documento =="" || $correo =="" || $usuario =="" || $passwd =="" 
        || $selrol =="" || $selper =="") 
        {
              echo "Se requiere llenar el formulario.";
        }else 
        {
          $query = $this->Usuario_model->insert_neousuario($nombre, $apellido,$documento,$correo,$usuario,$passwd,$selrol,
          $selper );
          echo $query[0]->response_spusuario;
        }
       
   }

  public function delete_usuarios()
  {
    $iduser = $this->input->post('iduser');
    $query = $this->Usuario_model->delete_usuario($iduser);
    echo $query[0]->response_spusuario;
  }



   public function editar_usuario()
    {
        $iduser = $this->input->post('iduser');        
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $correo = $this->input->post('correo');   
        $documento = $this->input->post('documento');
        $rol = $this->input->post('selrol');
        $setperf = $this->input->post('setperf');
        $estado = $this->input->post('estado');
        $query = $this->Usuario_model->editar_model_usuario($iduser,$nombre,$apellido,$correo,$documento,
        $rol,$setperf, $estado);
        echo $query[0]->response_spusuario;

    }




}