<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor_model extends CI_Model { 
    
    public function load_vendedor()
	{
        $opc = 1;
        $query = $this->db->query(" CALL SP_VENDEDOR('".$opc."','','','','','','','','',''); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
    }
        
    public function agregar_vendedor ($nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado)
    {
        $opc = 2;        
        $query = $this->db->query(" CALL SP_VENDEDOR('".$opc."','','".$nombre."','".$apellido."','".$nrodocumento."','".$telefono."','".$correo."','".$zona."','".$region."','".$estado."') ");   
    }
    public function actualiza_vendedor($uidvendedor,$nombre,$apellido,$nrodocumento,$telefono,$correo,$zona,$region,$estado)
    {
        $opc = 3;        
        $query = $this->db->query(" CALL SP_VENDEDOR('".$opc."','".$uidvendedor."','".$nombre."','".$apellido."','".$nrodocumento."','".$telefono."','".$correo."','".$zona."','".$region."','".$estado."') ");           
    }
    public function borrar_vendedor($cod)
    {
        $opc = 4;
        $query = $this->db->query(" CALL SP_VENDEDOR('".$opc."','".$cod."','','','','','','','','') ");
    }

    
}

/* End of file ModelName.php */