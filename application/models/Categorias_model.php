<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function load_categoria()
	{
		$query = $this->db->query(" CALL LOADCATEGORIAS(); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

	}

	public function add_model_categoria($categoria, $descripcion)
	{
   //	$sql = " INSERT INTO categoria(nom_cate, descripcion) VALUE('".$categoria."','".$descripcion."') ";
	  $this->db->query(" CALL AGREGAR_CATEGORIAS('".$categoria."','".$descripcion."') ");
	}

	public function delete_filtrado_categoria($id)
	{
		$this->db->query(" CALL BORRAR_CATEGORIAS('".$id."')	");
		
	}


	public function delete_model_categoria($id)
	{
	  //	$sql = " DELETE FROM categoria WHERE id_cate = '".$id."' ";
		//	
      $query = $this->db->query("CALL VALIDAD_BORRADO('".$id."') ");
   	 	if ($query->num_rows() > 0) {
    		return false;
    	}else {
			
    		return true;
    	}


	}
	public function edite_model_categoria($ide,$categoria2,$descripcion2 )
	{
		//$sql = " UPDATE categoria SET nom_cate='".$categoria2."', descripcion='".$descripcion2."'  WHERE id_cate= '".$ide."'  ";
		$query  = $this->db->query("CALL EDITAR_CATEGORIA('".$categoria2."', '".$descripcion2."', '".$ide."')");
		
	}

}

