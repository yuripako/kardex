<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model { 
    
    public function load_proveedor()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','','','','','','',@outproveedor); ");
        //$query = $this->db->query("Select @outproveedor  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_proveedor ($valor01,$valor02,$valor03,$valor04,$valor05) 
    {
        $opc = 2;  
        $estado = '1';      
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$estado."','',@outproveedor) ");   
        $query = $this->db->query("Select @outproveedor  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_proveedor($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','',@outproveedor) ");           
        $query = $this->db->query("Select @outproveedor  as mensaje;"); 
        return $query->result();
    }
    public function borrar_proveedor($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','".$cod."','','','','','',@outproveedor) ");
        $query = $this->db->query("Select @outproveedor  as mensaje;"); 
        return $query->result();
    }

    
}