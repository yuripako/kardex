<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Conpago_model extends CI_Model { 
    
    public function load_conpago()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_CONPAGO('".$opc."','','','','','',@outconpago); ");
        //$query = $this->db->query("Select @outconpago  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
    

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_conpago ($cod_unid,$nom_unid,$ind_ori,$estado) 
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_CONPAGO('".$opc."','','".$nom_unid."','".$cod_unid."','".$ind_ori."','".$estado."',@outconpago) ");   
        $query = $this->db->query("Select @outconpago  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_conpago($id_conpago,$cod_unid,$nom_unid,$ind_ori,$estado)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_CONPAGO('".$opc."','".$id_conpago."','".$nom_unid."','".$cod_unid."','".$ind_ori."','".$estado."',@outconpago) ");           
        $query = $this->db->query("Select @outconpago  as mensaje;"); 
        return $query->result();
    }
    public function borrar_conpago($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_CONPAGO('".$opc."','".$cod."','','','','',@outconpago) ");
        $query = $this->db->query("Select @outconpago  as mensaje;"); 
        return $query->result();
    }

    
}