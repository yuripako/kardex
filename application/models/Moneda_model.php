<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Moneda_model extends CI_Model { 

    public function load_moneda()
	{
        $opc = 1;
        $query = $this->db->query(" CALL sp_moneda('".$opc."','','','',''); ");
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;

    }
    


    public function agregar_moneda ($codigo,$nombre,$descripcion,$estado)
    {
        $opc = 2;        
        $query = $this->db->query(" CALL sp_moneda('".$opc."','".$codigo."','".$nombre."','".$descripcion."','".$estado."') ");   
    }

    public function borrar_moneda($cod){
        $opc = 4;
        $query = $this->db->query(" CALL sp_moneda('".$opc."','".$cod."','','','') ");   
    }

    public function actualiza_moneda($ucodigo,$unombre,$udescripcion,$uestado){
        $opc = 3;        
        $query = $this->db->query(" CALL sp_moneda('".$opc."','".$ucodigo."','".$unombre."','".$udescripcion."','".$uestado."') ");   
    }
}

/* End of file ModelName.php */
