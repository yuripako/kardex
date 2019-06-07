<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {

	
  public function load_modulos($coduser)
  {
    $query =  $this->db->query(" CALL LOADMODULOS('".$coduser."')");		
    $res = $query->result();
		//add this two line
		$query->next_result();
    $query->free_result();
    return $res;
  }
  
  public function load_menus($idpermiso)
  {
    $query =  $this->db->query(" CALL LOADMENUS('".$idpermiso."')");		    
    return $query->result();	 
  }


   public function load_submenu($idmenu)
   {
    $query =  $this->db->query("CALL SP_LOADSUBMENU('".$idmenu."');");		    
    return $query->result();	 
   }

}

