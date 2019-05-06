<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipcambio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Tipcambio_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
       $data['modulos'] = $query;       
       //Cargo mis monedas
       $query2 = $this->Tipcambio_model->load_tipcambio();
       $data['tipcambio'] = $query2;     

	   //data es un array para enviar datos ala vista
	   $this->load->view('dashboard/tipcambio', $data);
    }

    public function cargo_monedas()
	{
	  $query = $this->Articulo_model->select_monedas();
		echo"<option value=''>--[ Seleecione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->cod_mone'>".$item->nom_mone."</option>";
		}
    }
    
//###########################################  METODO PARA MI MODELO TIPO OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function addtipcambio()
    {
        $cod_unid = $this->input->post('codigo');
        $nom_unid = $this->input->post('nombre');
        $ind_ori = $this->input->post('indori');         
        $estado = $this->input->post('estado');

        $query = $this->Tipcambio_model->agregar_tipcambio($cod_unid,$nom_unid,$ind_ori,$estado);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updtipcambio()
    {
        $id_tipcambio = $this->input->post('id_cond');
        $cod_unid = $this->input->post('codigo');
        $nom_unid = $this->input->post('nombre');
        $ind_ori = $this->input->post('indori');        
        $estado = $this->input->post('estado');

        $query = $this->Tipcambio_model->actualiza_tipcambio($id_tipcambio,$cod_unid,$nom_unid,$ind_ori,$estado);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function deltipcambio(){
        $cod = $this->input->post('cod');
        $query = $this->Tipcambio_model->borrar_tipcambio($cod);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
