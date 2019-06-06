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
		
	public function load_darpermiso()
    {    
        $query = $this->db->query("	CALL SP_PERMISOMENU(3,NULL,NULL,'',@response_permisomenu);");
				$res = $query->result();
				$query->next_result();
				$query->free_result();
				return $res;
    }
	
		public function load_rolesmenu()
		{    
			$query = $this->db->query("CALL SP_PERMISOMENU(4,NULL,NULL,'',@response_permisomenu);");
			$res = $query->result();
			$query->next_result();
			$query->free_result();
			return $res;
		}

		public function validandopermiso($selecmod,$selecrol,$estado)
		{
		   $query = $this->db->query(" CALL SP_PERMISOMENU(5,'".$selecmod."','".$selecrol."','".$estado."',@response_permisomenu); ");
		   $query = $this->db->query(" SELECT @response_permisomenu  AS response_permisomenu;"); 
		   return $query->result();
		}

		public function deniegue_permiso($selecmod,$selecrol,$estado)
		{
		   $query = $this->db->query(" CALL SP_PERMISOMENU(5,'".$selecmod."','".$selecrol."','".$estado."',@response_permisomenu); ");
		   $query = $this->db->query(" SELECT @response_permisomenu  AS response_permisomenu;"); 
		   return $query->result();
		}
		
}

// asd 