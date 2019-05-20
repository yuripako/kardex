<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tipodocs_model extends CI_Model { 
    
    public function load_tipodocs()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','','','','','','',@outtipodocs); ");
        //$query = $this->db->query("Select @outtipodocs  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_tipodocs ($valor01,$valor02,$valor03,$valor04,$valor05) 
    {
        $opc = 2;  
        $estado = '1';      
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$estado."','',@outtipodocs) ");   
        $query = $this->db->query("Select @outtipodocs  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_tipodocs($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','',@outtipodocs) ");           
        $query = $this->db->query("Select @outtipodocs  as mensaje;"); 
        return $query->result();
    }
    public function borrar_tipodocs($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','".$cod."','','','','','',@outtipodocs) ");
        $query = $this->db->query("Select @outtipodocs  as mensaje;"); 
        return $query->result();
    }

    
}