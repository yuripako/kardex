<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
            redirect(base_url());
        }	
        $this->load->model('Inicio_model');
        $this->load->model('Categorias_model');
	}

	public function index()
	{
	   $data['header']  = 'dashboard/header';
	   $data['footer']  = 'dashboard/footer';
	   //esto va si o si ,carga de los modulos, esto siempre va ya que al carga los modulos carga esto tambien
	   $query = $this->Inicio_model->load_modulos($this->session->userdata('id_rol'));
	   $data['modulos'] = $query;
       //cargos mis categorias para el datatable.
	   $query2 = $this->Categorias_model->load_categoria();
	   $data['category'] = $query2;
	   //data es un array para enviar datos ala vista s
	   $this->load->view('dashboard/categorias', $data);
	}
	 
	
public function infocate()
{
	$idcate = $this->input->post('idcate');
	$query = $this->Categorias_model->info_categoria($idcate );
  echo json_encode($query);
}





	public function load_jerarquias()
	{
		$query = $this->Categorias_model->load_jerarquia();
		echo"<option>------[ SELECCIONE  ]------</option>";
		foreach ($query as $item)
		{
			echo "<option value='".$item->id_fam."'>".$item->nom_fam."</option>";
		}

	}
  
	public function add_categoria()
	{
		$categoria = $this->input->post('categoria');
		$tipofam = $this->input->post('tipofam');		
		$jerarquia1 = $this->input->post('jerarquia1');		
	  if ($categoria=="" && $jerarquia1=="") 
	  {
		  echo "Seleccione datos";
	  }else
	  {
			if ($tipofam == '0')
			 {
				$query = $this->Categorias_model->agregar_categoria2($categoria);
				echo $query[0]->mensaje;
			}
			if ($tipofam == '1')
			{
				$query = $this->Categorias_model->agregar_categoria($jerarquia1,$categoria);
				echo $query[0]->mensaje;
			}
			
	  }
	 
	}
	public function updcategoria()
    {
        $valor01 = $this->input->post('valor01');
        $valor02 = $this->input->post('valor02');
        $valor03 = $this->input->post('valor03');
        $valor04 = $this->input->post('valor04');                
				$valor05 = $this->input->post('valor05');                
				$tipofam = $this->input->post('indica');                

				if ($tipofam == '0')
				{
					$query = $this->Categorias_model->actualiza_categoria2($valor01,$valor02,$valor03,$valor04,$valor05);
					echo $query[0]->mensaje; 
					//echo json_encode($query);					
				}
				if ($tipofam == '1')
				{
					$query = $this->Categorias_model->actualiza_categoria($valor01,$valor02,$valor03,$valor04,$valor05);
					echo $query[0]->mensaje; 
					//echo json_encode($query);
				}

        
    }
    public function eliminar_categoria(){
				$cod = $this->input->post('cod');   
				$cod2 = $this->input->post('cod2');   
        $query = $this->Categorias_model->borrar_categoria($cod,$cod2);
        echo $query[0]->mensaje; 
       //echo json_encode($query);

    }
	




   

}

