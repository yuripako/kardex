<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ordcompra_model extends CI_Model {

    public function load_compra()
	{
        $opc = 1;
        $query = $this->db->query("CALL SP_COMPRADOR(1); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

    }
    




}

