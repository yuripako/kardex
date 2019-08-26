<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listprecio_model extends CI_Model {

	public function load_listaprecio($valor01)
	{  
        $opc = 1;            
		$query = $this->db->query("  CALL SP_LISTAPRECIO2('".$opc."','".$valor01."','','','','','',@out); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

	}        
   public function select_listaprecio()
    {
        $opc=5;
        $query = $this->db->query(" CALL SP_LISTAPRECIO2('".$opc."','','','','','','',@out);");
        $res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }

    public function select_moneda()
    {
        $opc = 1;
        $query = $this->db->query(" CALL SP_MONEDA('".$opc."','','','','');");
        return $query->result();
    }
//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_listaprecio ($valor01,$valor02,$valor03,$valor04) 
    {
        $opc = 2;  
        $estado = $valor04;      
        $query = $this->db->query(" CALL SP_LISTAPRECIO2('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','','".$estado."',@outlistaprecio) ");   
        $query = $this->db->query("Select @outlistaprecio  as mensaje;"); 
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

