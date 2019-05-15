<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Ubigeo_model extends CI_Model { 
    
    public function load_ubigeo()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_UBIGEO('".$opc."','','','','','',@outubigeo); ");
        //$query = $this->db->query("Select @outubigeo  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
        
//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_ubigeo ($codubigeo,$departamento,$provincia,$distrito) 
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_UBIGEO('".$opc."','".$codubigeo."','".$departamento."','".$provincia."','".$distrito."','',@outubigeo) ");   
        $query = $this->db->query("Select @outubigeo  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_ubigeo($codubigeo,$departamento,$provincia,$distrito)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_UBIGEO('".$opc."','".$codubigeo."','".$departamento."','".$provincia."','".$distrito."','',@outubigeo) ");           
        $query = $this->db->query("Select @outubigeo  as mensaje;"); 
        return $query->result();
    }
    public function borrar_ubigeo($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_UBIGEO('".$opc."','".$cod."','','','','',@outubigeo) ");
        $query = $this->db->query("Select @outubigeo  as mensaje;"); 
        return $query->result();
    }

    
}