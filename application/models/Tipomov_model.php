<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tipomov_model extends CI_Model { 
    
    public function load_tipomov()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_TIPOMOV('".$opc."','','','','','',@outtipomov); ");
        //$query = $this->db->query("Select @outtipomov  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_tipomov ($valor02,$valor03,$valor04,$valor05) 
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_TIPOMOV('".$opc."','','".$valor02."','".$valor03."','".$valor04."','',@outtipomov) ");   
        $query = $this->db->query("Select @outtipomov  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_tipomov($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_TIPOMOV('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."',@outtipomov) ");           
        $query = $this->db->query("Select @outtipomov  as mensaje;"); 
        return $query->result();
    }
    public function borrar_tipomov($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_TIPOMOV('".$opc."','".$cod."','','','','',@outtipomov) ");
        $query = $this->db->query("Select @outtipomov  as mensaje;"); 
        return $query->result();
    }

    
}