<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listprecio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Listprecio_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;
       //$query2 = $this->Listprecio_model->load_listaprecio();
		//$data['listprecio'] = $query2;
		//data es un array para enviar datos ala vista s
        $this->load->view('dashboard/listprecio',$data);       
       	   
	}
	
	public function sele_listaprecio()
    {
       $query = $this->Listprecio_model->select_listaprecio();
        echo"<option value=''>--[ Seleccione Lista Precio ]--</option>";
		foreach ($query as $item) {
            $dato = $item->id_list."->".$item->cod_mon;
			echo "<option value='".$dato."'>".$item->cod_list." - ".$item->nom_list."</option>";
		}
        
	}
	public function carga_listaprecio()
	{
		$valor = $this->input->post('valor');
	 	$query = $this->Listprecio_model->load_listaprecio($valor);
         echo json_encode($query);                
     }

     public function selemoneda()
     {
         $query = $this->Listprecio_model->select_moneda();
         echo"<option value=''>--[ Seleccione ]--</option>";
         foreach ($query as $item){
             echo "<option value='".$item->cod_mone."'>".$item->cod_mone." - ".$item->nom_mone."</option>";
         }
     }

    public function addlistaprecio()
    {        
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                                    

        $query = $this->Listprecio_model->agregar_listaprecio($valor01,$valor02,$valor03,$valor04);        
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

