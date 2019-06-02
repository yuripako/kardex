<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    
    public function load_usuario()
    {    
        
        $opc = 1;
        $query =  $this->db->query(" CALL SP_USUARIO(1,NULL,@response_spusuario); ");
        $res = $query->result();        
        $query->next_result();
        $query->free_result();
        return $res;
    }
        
    public function load_usuario_role()
    {     
        $query =  $this->db->query("  CALL SP_LOSROLES(1); ");
        $res = $query->result();        
        $query->next_result();
        $query->free_result();
        return $res;
    }

    public function load_usuario_perfil()
    {     
        $query =  $this->db->query("  CALL SP_LOSROLES(2); ");
        $res = $query->result();        
        $query->next_result();
        $query->free_result();
        return $res;
    }


  public function insert_neousuario($nombre, $apellido,$documento,$correo,$usuario,$passwd,$selrol,$selper )
  {
    $query = $this->db->query("  ");
    $query = $this->db->query("  "); 
    return $query->result();
  }

  public function editar_model_usuario($username, $nombre, $apellido, $documento, $correo, $perfil)
	{
		//$sql = " UPDATE categoria SET nom_cate='".$categoria2."', descripcion='".$descripcion2."'  WHERE id_cate= '".$ide."'  ";
		$query  = $this->db->query("CALL EDITAR_USUARIO('".$username."','".$nombre."','".$apellido."','".$documento."','".$correo."','".$perfil."') ");
		
	}

}

/* End of file Usuario_model.php */
