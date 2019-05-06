<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tipcambio_model extends CI_Model { 
    
    public function load_tipcambio()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','','','','','',@outtipcambio); ");
        //$query = $this->db->query("Select @outtipcambio  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
    
    public function select_monedas()
	{
		$sql = " CALL SELECT_ARTICULOS(2)";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_tipcambio ($cod_unid,$nom_unid,$ind_ori,$estado) 
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','','".$nom_unid."','".$cod_unid."','".$ind_ori."','".$estado."',@outtipcambio) ");   
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_tipcambio($id_tipcambio,$cod_unid,$nom_unid,$ind_ori,$estado)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','".$id_tipcambio."','".$nom_unid."','".$cod_unid."','".$ind_ori."','".$estado."',@outtipcambio) ");           
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }
    public function borrar_tipcambio($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','".$cod."','','','','',@outtipcambio) ");
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }

    
}