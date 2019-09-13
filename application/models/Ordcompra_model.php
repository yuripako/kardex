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
    
   public function load_ruc($ruc)
   {
	$query = $this->db->query("CALL SP_ORDCOMPRA(1,$ruc,'') ");
	$res = $query->result();
	$query->next_result();
	$query->free_result();
	return $res;
   }

   public function load_condicion()
   {
	$query = $this->db->query("CALL SP_ORDCOMPRA(2,'','') ");
	$res = $query->result();
	$query->next_result();
	$query->free_result();
	return $res;
   }

   public function load_moneda()
   {
	$query = $this->db->query("CALL SP_ORDCOMPRA(3,'','') ");
	$res = $query->result();
	$query->next_result();
	$query->free_result();
	return $res;
   }

   public function load_tipodoc()
   {
	$query = $this->db->query("CALL SP_ORDCOMPRA(4,'','') ");
	$res = $query->result();
	$query->next_result();
	$query->free_result();
	return $res;
   }
 
  public function loadserie($serie )
  {
	$query = $this->db->query("CALL SP_ORDCOMPRA(5,'','".$serie."') ");
	$res = $query->result();
	$query->next_result();
	$query->free_result();
	return $res;
  }



}

