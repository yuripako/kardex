<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permenu_model extends CI_Model {

	public function load_permenu()
	{
		$query = $this->db->query(" CALL SP_PERMISOMENU(1,NULL,NULL,'',@response_permisomenu); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

    }
    
    public function load_permiso_rol($idrol)
    {
        
        $query = $this->db->query("CALL SP_PERMISOMENU(2,NULL,'".$idrol."','',@response_permisomenu);");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
	

}

// asd 