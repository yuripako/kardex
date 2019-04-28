<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Unmedida_model extends CI_Model { 
    
    public function load_unmedida()
	{
        $opc = 1;
        $query = $this->db->query(" CALL SP_UNIDAD('".$opc."','','','','',''); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
    
    public function agregar_unmedida ($cod_unid,$nom_unid,$cod_ubl,$descripcion,$estado)
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_UNIDAD('".$opc."','".$cod_unid."','".$nom_unid."','".$cod_ubl."','".$descripcion."','".$estado."') ");   
    }
    public function actualiza_unmedida($cod_unid,$nom_unid,$cod_ubl,$descripcion,$estado)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_UNIDAD('".$opc."','".$cod_unid."','".$nom_unid."','".$cod_ubl."','".$descripcion."','".$estado."') ");           
    }
    public function borrar_unmedida($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_UNIDAD('".$opc."','".$cod."','','','','') ");
    }

    
}