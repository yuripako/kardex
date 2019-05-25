<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Impuesto_model extends CI_Model { 
    
    public function load_impuesto()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_IMPUESTO('".$opc."','','','','','','',@outimpuesto); ");
        //$query = $this->db->query("Select @outimpuesto  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    
    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_impuesto ($valor01,$valor02,$valor03,$valor04) 
    {
        $opc = 2;  
        $estado = '1';      
        $query = $this->db->query(" CALL SP_IMPUESTO('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','$estado','',@outimpuesto) ");   
        $query = $this->db->query("Select @outimpuesto  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_impuesto($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_IMPUESTO('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','',@outimpuesto) ");           
        $query = $this->db->query("Select @outimpuesto  as mensaje;"); 
        return $query->result();
    }
    public function borrar_impuesto($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_IMPUESTO('".$opc."','".$cod."','','','','','',@outimpuesto) ");
        $query = $this->db->query("Select @outimpuesto  as mensaje;"); 
        return $query->result();
    }

    
}