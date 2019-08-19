<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Proveedor extends CI_Controller { 
 
	public function __construct() 
	{ 
		parent::__construct(); 
		if (!$this->session->userdata('login')) { 
            redirect(base_url()); 
        }	 
        $this->load->model('Inicio_model'); 
        $this->load->model('Proveedor_model'); 
	} 
 
	public function index() 
	{ 
	   $data['header']  = 'dashboard/header'; 
	   $data['footer']  = 'dashboard/footer'; 
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien 
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol')); 
       $data['modulos'] = $query;        
       //Cargo mis monedas 
       $query2 = $this->Proveedor_model->load_proveedor(); 
       $data['proveedor'] = $query2;      
 
	   //data es un array para enviar datos ala vista 
	   $this->load->view('dashboard/proveedor', $data); 
    } 
    
    /*
    public function cargo_tipodocid()
    {
       $query = $this->Proveedor_model->select_tipodocid();
        echo"<option value=''>--[ Seleccione ]--</option>";
		foreach ($query as $item) {
            echo "<option value='$item->coddoc'>".$item->docs." </option>";
            
		}
     
    }  */

    //--- load automatico
    public function bus_tipo()
    {
        $tipo = $this->input->post('tipo');
        if ($tipo=="") {
            echo "";
        } else
        {
            $query = $this->Proveedor_model->carga_automatica($tipo); 
            echo"<ul class='list-group' id='invi'>";
            foreach ($query as $item) {
                echo "<li  class='list-group-item'  onclick=\"llenarcasilladoc($item->coddoc,'".$item->nomdoc."','".$item->nomcor."','".$item->docs."');\"  style='cursor: pointer;'>".$item->docs."</li>";
            }
            echo"</ul>";
        }
    }

    //busca ubigeo
    public function bus_distrito()
    {
        $valor = $this->input->post('valor');
        $desc  = $this->input->post('desc');
        $query = $this->Proveedor_model->busca_ubigeo($valor,$desc);
        switch ($desc) {
            case "distri":                
                echo"<ul class='list-group' id='invidis'>";
                foreach ($query as $item) {
                    echo "<li class='list-group-item' onclick=\"llenarubigeo($item->cod_ubi,'".$item->district."','".$item->provincia."','".$item->depart."','".$item->fubigeo."');\" style='cursor: pointer;'>".$item->fubigeo."</li>";
                }
                echo"</ul>";
                break;
            case "provi":
                echo"<ul class='list-group' id='invidis'>";
                foreach ($query as $item) {
                    echo "<li class='list-group-item' onclick=\"llenarubigeo($item->cod_ubi,'".$item->district."','".$item->provincia."','".$item->depart."','".$item->fubigeo."');\" style='cursor: pointer;'>".$item->fubigeo."</li>";
                }
                echo"</ul>";
                break;
            case "depa":
                echo"<ul class='list-group' id='invidis'>";
                foreach ($query as $item) {
                    echo "<li class='list-group-item' onclick=\"llenarubigeo($item->cod_ubi,'".$item->district."','".$item->provincia."','".$item->depart."','".$item->fubigeo."');\" style='cursor: pointer;'>".$item->fubigeo."</li>";
                }
                echo"</ul>";
                break;
            default:
                ;
                break;
        }                
    }

    public function addproveedor() 
    {         
        $valor01 = $this->input->post('valor01'); 
        $valor02 = $this->input->post('valor02'); 
        $valor03 = $this->input->post('valor03'); 
        $valor04 = $this->input->post('valor04');                  
        $valor05 = $this->input->post('valor05');                  
        $valor06 = $this->input->post('valor06');                  
        $valor07 = $this->input->post('valor07');                  
        $valor08 = $this->input->post('valor08');                  
        $valor09 = $this->input->post('valor09');                  
        $valor10 = $this->input->post('valor10');                  
        $valor11 = $this->input->post('valor11');                  
        $valor12 = $this->input->post('valor12');                  
        $valor13 = $this->input->post('valor13');                  
        $valor14 = $this->input->post('valor14');                  
        $valor15 = $this->input->post('valor15');                  
        $valor16 = $this->input->post('valor16');                  
        $valor17 = $this->input->post('valor17');                  
                
        $query = $this->Proveedor_model->agregar_proveedor($valor01,$valor02,$valor03,$valor04,$valor05,
                $valor06,$valor07,$valor08,$valor09,$valor10,$valor11,$valor12,$valor13,$valor14,$valor15,
                $valor16,$valor17); 
         
        //echo json_encode($query); 
 
        echo $query[0]->mensaje;   //Muestra el mensaje de output de mi db.              
    } 
    

    public function updproveedor() 
    { 
        $valor01 = $this->input->post('valor01'); 
        $valor02 = $this->input->post('valor02'); 
        $valor03 = $this->input->post('valor03'); 
        $valor04 = $this->input->post('valor04');                 
        $valor05 = $this->input->post('valor05');                 
 
        $query = $this->Proveedor_model->actualiza_proveedor($valor01,$valor02,$valor03,$valor04,$valor05); 
        echo $query[0]->mensaje;  
       //echo json_encode($query); 
    } 
    public function delproveedor(){ 
        $cod = $this->input->post('cod');         
        $query = $this->Proveedor_model->borrar_proveedor($cod); 
        echo $query[0]->mensaje;  
       //echo json_encode($query); 
 
    } 
} 
