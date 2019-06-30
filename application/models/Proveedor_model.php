<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model { 
    
    public function load_proveedor()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','','','','','','','','','','','','','','','','','','','',@outproveedor); ");
        //$query = $this->db->query("Select @outproveedor  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    
    public function select_tipodocid()
    {
        $opc = 5;
        $query = $this->db->query("CALL SP_PROVEEDOR('".$opc."','','','','','','','','','','','','','','','','','','','',@outproveedor); ");
        $res = $query->result();
        $query->next_result();
		$query->free_result();
        return $res;
    }
//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_proveedor ($valor01,$valor02,$valor03,$valor04,$valor05,
    $valor06,$valor07,$valor08,$valor09,$valor10,$valor11,$valor12,$valor13,$valor14,
    $valor15,$valor16,$valor17)
    {
        $opc = 2;  
        $estado = '1'; 
        $registro = 'now()';   
        $query = $this->db->query(" CALL SP_PROVEEDOR('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','".$valor06."',
                                    '".$valor07."','".$valor08."','".$valor09."','".$valor10."','".$valor11."','".$valor12."','".$valor13."','".$valor14."',
                                    '".$valor15."','".$valor16."','".$valor17."','".$estado."','$registro',@outproveedor) ");   
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



//carga automatica

public function carga_automatica($tipo)
{
   
    $query =  $this->db->query(" SELECT * FROM tipdocid WHERE nomdoc LIKE '%".$tipo."%'");  // llama
    
    return $query->result();
}







    
}