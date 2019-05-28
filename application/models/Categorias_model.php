<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function load_categoria()
	{
		$query = $this->db->query(" CALL SP_CATEGORIAS( 1 ,'','',NULL,'',@response_spcat);");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

	}
	
	public function load_jerarquia()
	{
		$query = $this->db->query("  CALL SP_CATEGORIAS( 5 ,'','',NULL,'',@response_spcat); ");
		return $query->result();
	}

   public function agregar_categoria($des,$jer)
   {
		$query = $this->db->query(" CALL SP_CATEGORIAS( 2 ,'".$jer."','".$des."',NULL,'',@response_spcat);");
		$query = $this->db->query("Select @response_spcat  as response_spcat;"); 
      return $query->result();
   }
}

