<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor_model extends CI_Model { 

    public function load_vendedor()
	{
        $opc = 1;
        $query = $this->db->query(" CALL SP_VENDEDOR('".$opc."','','','','','','','','',''); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

    }
    
   
}

/* End of file ModelName.php */