<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model {

	public function load_roles()
	{
		$query = $this->db->query(" CALL SP_ROLES(1,NULL,'','',@response_sproles);  ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

	}
	

  public function agregar_rol($rol)
   {
        $query = $this->db->query(" CALL SP_ROLES(2,NULL,'".$rol."','',@response_sproles); ");
        $query = $this->db->query(" SELECT @response_sproles as response_sproles "); 
        return $query->result();
   }
  
 public function borra_rol($idrol)
 {
    $query = $this->db->query(" CALL SP_ROLES(3,'".$idrol."','','',@response_sproles); ");
    $query = $this->db->query(" SELECT @response_sproles as response_sproles "); 
    return $query->result();
 }

 public function update_rol($idrol,$nomrol,$estado)
 {
    $query = $this->db->query(" CALL SP_ROLES(4,'".$idrol."','".$nomrol."','".$estado."',@response_sproles); ");
    $query = $this->db->query(" SELECT @response_sproles as response_sproles "); 
    return $query->result();
 }
 
}

// asd