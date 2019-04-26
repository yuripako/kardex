<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tipodocumento_model extends CI_Model { 
    
    public function load_tipodocumento()
	{
        $opc = 1;
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','','','','','','','','',''); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
        
    public function agregar_tipodocumento ($nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado)
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','','".$nombre."','".$apellido."','".$nrodocumento."','".$telefono."','".$correo."','".$zona."','".$region."','".$estado."') ");   
    }
    public function actualiza_tipodocumento($uidvendedor,$nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','".$uidvendedor."','".$nombre."','".$apellido."','".$nrodocumento."','".$telefono."','".$correo."','".$zona."','".$region."','".$estado."') ");           
    }
    public function borrar_tipodocumento($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_TIPODOCS('".$opc."','".$cod."','','','','','','','','') ");
    }

    
}
