<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    
    public function load_usuario()
    {    
        
        $opc = 1;
        $query =  $this->db->query("CALL SP_USUARIO(1,NULL,'','','','','','',NULL,NULL,@response_spusuario); ");
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
    $query = $this->db->query("  CALL SP_USUARIO(2,NULL,'".$nombre."','".$apellido."','".$documento."','".$correo."',
    '".$usuario."','".$passwd."','".$selrol."','".$selper."',@response_spusuario);");
    $query = $this->db->query(" SELECT @response_spusuario AS response_spusuario;    "); 
    return $query->result();
  }


 public function delete_usuario($iduser)
 {
    $query = $this->db->query(" CALL SP_USUARIO(3,'".$iduser."','','','','','','',NULL,NULL,@response_spusuario);  ");
    $query = $this->db->query(" SELECT @response_spusuario AS response_spusuario;    "); 
    return $query->result();
 }




  public function editar_model_usuario($username, $nombre, $apellido, $documento, $correo, $perfil)
	{
		//$sql = " UPDATE categoria SET nom_cate='".$categoria2."', descripcion='".$descripcion2."'  WHERE id_cate= '".$ide."'  ";
		$query  = $this->db->query("CALL EDITAR_USUARIO('".$username."','".$nombre."','".$apellido."','".$documento."','".$correo."','".$perfil."') ");
		
	}

}

/* End of file Usuario_model.php */
