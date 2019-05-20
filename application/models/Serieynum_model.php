<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Serieynum_model extends CI_Model { 
    
    public function load_serieynum()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_SERIEYNUMS('".$opc."','','','','','','',@outserieynum); ");
        //$query = $this->db->query("Select @outserieynum  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_serieynum ($valor01,$valor02,$valor03,$valor04,$valor05) 
    {
        $opc = 2;  
        $estado = '1';      
        $query = $this->db->query(" CALL SP_SERIEYNUMS('".$opc."','','".$valor02."','".$valor03."','".$valor04."','$valor05',".$estado."',@outserieynum) ");   
        $query = $this->db->query("Select @outserieynum  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_serieynum($valor01,$valor02,$valor03,$valor04,$valor05,$valor06)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_SERIEYNUMS('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','".$valor06."',@outserieynum) ");           
        $query = $this->db->query("Select @outserieynum  as mensaje;"); 
        return $query->result();
    }
    public function borrar_serieynum($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_SERIEYNUMS('".$opc."','".$cod."','','','','','',@outserieynum) ");
        $query = $this->db->query("Select @outserieynum  as mensaje;"); 
        return $query->result();
    }

    
}