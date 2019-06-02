<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function load_categoria()
	{
		$query = $this->db->query(" CALL SP_CATEGORIAS( 7 ,'','',NULL,'',@response_spcat);");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

	}		

	public function load_jerarquia()
	{
		$query = $this->db->query("  CALL SP_CATEGORIAS( 5 ,'','',NULL,'',@response_spcat); ");
		return $query->result();
	}
	
//###########################################  OUTPUT  ##############################################
//Retorno mi mensaje cuando creo mi variable de salida OUTCONPAGO, menos el load SP
public function agregar_categoria ($valor01,$valor02) 
{
	 $opc = 8;  
	 $estado = '1';      
	 $query = $this->db->query(" CALL SP_CATEGORIAS('".$opc."','".$valor01."','".$valor02."','','$estado',@response_spcat) ");   
	 $query = $this->db->query("Select @response_spcat  as mensaje;"); 
	 return $query->result();
}
public function agregar_categoria2 ($valor01) 
{
	 $opc = 9;  
	 $estado = '1';      
	 $query = $this->db->query(" CALL SP_CATEGORIAS('".$opc."','','".$valor01."','','$estado',@response_spcat) ");   
	 $query = $this->db->query("Select @response_spcat  as mensaje;"); 
	 return $query->result();
}
public function actualiza_categoria($valor01,$valor02,$valor03,$valor04,$valor05)
{
	 $opc = 10;          //actualzia Subfamilia
	 $query = $this->db->query(" CALL SP_CATEGORIAS('".$opc."','".$valor02."','".$valor03."','".$valor01."','".$valor05."',@response_spcat) ");           
	 $query = $this->db->query("Select @response_spcat  as mensaje;"); 
	 return $query->result();
}
public function actualiza_categoria2($valor01,$valor02,$valor03,$valor04,$valor05)
{
	$opc = 11;        	//actualia la familia
	$query = $this->db->query(" CALL SP_CATEGORIAS('".$opc."','".$valor02."','".$valor03."','','".$valor05."',@response_spcat) ");           
	$query = $this->db->query("Select @response_spcat  as mensaje;"); 
	return $query->result();
}


public function borrar_categoria($cod)
{
	 $opc = 12;
	 $query = $this->db->query(" CALL SP_CATEGORIAS('".$opc."','','','".$cod."','',@response_spcat) ");
	 $query = $this->db->query("Select @response_spcat  as mensaje;"); 
	 return $query->result();
}

}

