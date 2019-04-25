<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    
    public function load_usuario()
    {     //Select
        $query =  $this->db->query(" CALL LOADUSUARIOS()");		
        $res = $query->result();        
        $query->next_result();
        $query->free_result();
        return $res;
    }
/*
    public function insert_usuarios($user){   //Insert, update, delete
        $query = $this->db->query("CALL INSERTUSUARIO('".$user."') ");

    }
  */
  public function insert_neousuario($nombre, $apellido, $documento, $correo, $usuario, $passwd, $perfil)
  {
    $query = $this->db->query("CALL ADDUSUARIO('".$nombre."','".$apellido."','".$documento."','".$correo."','".$usuario."','".$passwd."','".$perfil."') ");
  }

  public function editar_model_usuario($username, $nombre, $apellido, $documento, $correo, $perfil)
	{
		//$sql = " UPDATE categoria SET nom_cate='".$categoria2."', descripcion='".$descripcion2."'  WHERE id_cate= '".$ide."'  ";
		$query  = $this->db->query("CALL EDITAR_USUARIO('".$username."','".$nombre."','".$apellido."','".$documento."','".$correo."','".$perfil."') ");
		
	}

}

/* End of file Usuario_model.php */
