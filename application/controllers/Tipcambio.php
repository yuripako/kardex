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
	  $query = $this->Tipcambio_model->select_monedas();
		echo"<option value=''>--[ Seleecione ]--</option>";
		foreach ($query as $item) {
			echo "<option value='$item->cod_mone'>".$item->nom_mone."</option>";
		}
  }
    public function cargo_monebas()
	{
      $query = $this->Tipcambio_model->select_monebas();      
     
      foreach ($query as $item) {
        echo " <input type='text' class='form-control' id='monedabas' placeholder='' value='".$item->nom_mone."'>";
      }           
	}
    
    public function addtipcambio()
    {
        $fechacam = $this->input->post('fechacam');
        $monetc = $this->input->post('monetc');
        $monebas = $this->input->post('monebas');
        $valortc = $this->input->post('valortc');                 

        $query = $this->Tipcambio_model->agregar_tipcambio($monetc,$monebas,$fechacam,$valortc);
        
        //echo json_encode($query);

        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.             
    }
    public function updtipcambio()
    {
        $monetc = $this->input->post('monedatc');
        $monebas = $this->input->post('monedabas');
        $fechacam = $this->input->post('fechacam');
        $valortc = $this->input->post('valortc');                

        $query = $this->Tipcambio_model->actualiza_tipcambio($monetc,$monebas,$fechacam,$valortc);
        echo $query[0]->mensaje; 
       //echo json_encode($query);
    }
    public function deltipcambio(){
        $cod = $this->input->post('cod');
        $fecha = $this->input->post('fecha');
        $query = $this->Tipcambio_model->borrar_tipcambio($cod,$fecha);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
}
