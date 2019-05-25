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

  //cambio
}

