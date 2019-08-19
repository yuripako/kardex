<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model { 
    
    public function load_cliente()
	{

        $opc = 1;
        $query = $this->db->query(" CALL SP_CLIENTE('".$opc."','','','','','','','','','','','','','','','','','','','',@outcliente); ");
        //$query = $this->db->query("Select @outcliente  as mensaje;"); 
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }    
    public function select_tipodocid()
    {
        $opc = 5;
        $query = $this->db->query("CALL SP_CLIENTE('".$opc."','','','','','','','','','','','','','','','','','','','',@outcliente); ");
        $res = $query->result();
        $query->next_result();
		$query->free_result();
        return $res;
    }
//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
    public function agregar_cliente ($valor01,$valor02,$valor03,$valor04,$valor05,
    $valor06,$valor07,$valor08,$valor09,$valor10,$valor11,$valor12,$valor13,$valor14,
    $valor15,$valor16,$valor17)
    {
        $opc = 2;  
        $estado = '1'; 
        $registro = 'usuario';   
        $query = $this->db->query(" CALL SP_CLIENTE('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','".$valor06."',
                                    '".$valor07."','".$valor08."','".$valor09."','".$valor10."','".$valor11."','".$valor12."','".$valor13."','".$valor14."',
                                    '".$valor15."','".$valor16."','".$valor17."','".$estado."','$registro',@outcliente) ");   
        $query = $this->db->query("Select @outcliente  as mensaje;"); 
        return $query->result();
    }
    public function actualiza_cliente($valor01,$valor02,$valor03,$valor04,$valor05)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_CLIENTE('".$opc."','".$valor01."','".$valor02."','".$valor03."','".$valor04."','".$valor05."','',@outcliente) ");           
        $query = $this->db->query("Select @outcliente  as mensaje;"); 
        return $query->result();
    }
    public function borrar_cliente($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_CLIENTE('".$opc."','".$cod."','','','','','',@outcliente) ");
        $query = $this->db->query("Select @outcliente  as mensaje;"); 
        return $query->result();
    }



//carga automatica
//CALL SP_CLIENTE('6','doc','','','','','','','','','','','','','','','','','','1',@outcliente);
public function carga_automatica($tipo)
{
    $opc = 6;  
    $estado = '1'; 
    //$query =  $this->db->query(" SELECT * FROM tipdocid WHERE nomdoc LIKE '%".$tipo."%'");  // llama
    $query =  $this->db->query(" CALL SP_CLIENTE('".$opc."','".$tipo."','','','','','','','','','','','','','','','','','','".$estado."',@outcliente);");  // llama
    
    return $query->result();
}

public function busca_ubigeo($distrito,$opcion)
{    
    if ($opcion == "distri")
        $opc = 7;
    if ($opcion == "provi")
        $opc = 8;
    if ($opcion == "depa")
        $opc = 9;
    $estado = '1';
    $query = $this->db->query(" CALL SP_CLIENTE('".$opc."','".$distrito."','','','','','','','','','','','','','','','','','','".$estado."',@outcliente);");

    return $query->result();
}







    
}