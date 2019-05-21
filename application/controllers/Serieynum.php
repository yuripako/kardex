<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serieynum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Serieynum_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Serieynum_model->load_serieynum();
       $data['serieynum'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/serieynum', $data);
    }
    
    public function cargo_tipodocs()
    {
       $query = $this->Serieynum_model->select_tipodocs();
        echo"<option value=''>--[ Seleccione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->cod_doc'>".$item->cod_doc." - ".$item->nom_doc."</option>";
		}
     
    }
    public function addserieynum()
    {        
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                 
        $valor05 = $this->input->post('valor05');                 

        $query = $this->Serieynum_model->agregar_serieynum($valor01,$valor02,$valor03,$valor04,$valor05);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updserieynum()
    {
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                
        $valor05 = $this->input->post('valor05');                
        $valor06 = $this->input->post('valor06');                

        $query = $this->Serieynum_model->actualiza_serieynum($valor01,$valor02,$valor03,$valor04,$valor05,$valor06);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function delserieynum(){
        $cod = $this->input->post('cod');        
        $query = $this->Serieynum_model->borrar_serieynum($cod);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
