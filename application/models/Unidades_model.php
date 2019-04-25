<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades_model extends CI_Model {

	public function load_model_unidades()
	{
		$sql = " SELECT * FROM unidad ORDER BY nom_unid DESC ";
		$query = $this->db->query($sql);
	    return $query->result();
	}

	public function add_model_unidades($codigo, $nombre, $descripcion)
	{
		$sql = " INSERT INTO unidad(nom_unid,descripcion,cod_unid)
                 VALUES('".$nombre."','".$descripcion."','".$codigo."')  ";
		$query =  $this->db->query($sql);

	}

	public function delete_model_unidades($id)
	{
	    $sql = " DELETE FROM unidad WHERE cod_unid= '".$id."' ";
	    $query = $this->db->query($sql);	
	}

	public function edite_model_unidad($codigo3,$nombre3,$descripcion3)
	{
		$sql = " UPDATE unidad SET nom_unid= '".$nombre3."',descripcion='".$descripcion3."'  WHERE cod_unid= '".$codigo3."' ";
	    $query = $this->db->query($sql);	
	}

}

