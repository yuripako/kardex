<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
   
   public function verificar_acceso($user, $pass)
   {
         $query = $this->db->query("CALL LOGIN('".$user."', '".$pass."') ");
   	 	if ($query->num_rows() > 0) {
    		return $query->row();
    	}else {
    		return false;
    	}
   }
	

}

