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
        $opc = 5;
        $sql = " CALL SP_TIPCAMBIO(5); ";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
    public function select_monebas()
	{
        $opc = 6;
        $sql = " CALL SP_TIPCAMBIO(6);";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}

//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_tipcambio ($monetc,$monebas,$fechacam,$valortc) 
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','".$monetc."','".$monebas."','".$fechacam."','".$valortc."','',@outtipcambio) ");   
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_tipcambio($monetc,$monebas,$fechacam,$valortc)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','".$monetc."','".$monebas."','".$fechacam."','".$valortc."',@outtipcambio) ");           
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }
    public function borrar_tipcambio($cod,$fecha)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_TIPCAMBIO('".$opc."','".$cod."','','".$fecha."','','',@outtipcambio) ");
        $query = $this->db->query("Select @outtipcambio  as mensaje;"); 
        return $query->result();
    }

    
}