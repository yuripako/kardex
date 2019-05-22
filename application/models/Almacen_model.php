<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen_model extends CI_Model { 
    
    public function load_almacen()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_ALMACEN('".$opc."','','','','','','',@outalmacen); ");
        //$query = $this->db->query("Select @outalmacen  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    

    public function select_tipodocs()
    {
        $opc=5;
        $query = $this->db->query(" CALL SP_ALMACEN('".$opc."','','','','','','',@outalmacen);");
        $res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_almacen ($valor01,$valor02,$valor03,$valor04,$valor05) 
    {
        $opc = 2;  
        $estado = '1';      
        $query = $this->db->query(" CALL SP_ALMACEN('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','$valor05','".$estado."',@outalmacen) ");   
        $query = $this->db->query("Select @outalmacen  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_almacen($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_ALMACEN('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','',@outalmacen) ");           
        $query = $this->db->query("Select @outalmacen  as mensaje;"); 
        return $query->result();
    }
    public function borrar_almacen($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_ALMACEN('".$opc."','".$cod."','','','','','',@outalmacen) ");
        $query = $this->db->query("Select @outalmacen  as mensaje;"); 
        return $query->result();
    }

    
}