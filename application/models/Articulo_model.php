<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo_model extends CI_Model {

	public function load_productos()
	{
		$sql = " CALL CARGAR_PRODUCTOS()";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}
	 
	public function select_categorias()
	{
		$sql = " CALL SELECT_ARTICULOS(1)";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}
  
	public function select_unidades()
	{
		$sql = " CALL SELECT_ARTICULOS(3)";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}

	public function select_monedas()
	{
		$sql = " CALL SELECT_ARTICULOS(2)";
		$query =  $this->db->query($sql);
		$res = $query->result();
		$query->next_result();
		$query->free_result();
		return $res;
	}

	public function insertando_productos($codigo,$nombre,$moneda,$categoria,$estado,$unidad,$lote,$bien,$impuesto,$descripcion)
	{
		$query =  $this->db->query("CALL INSERTAR_PRODUCTO( '".$codigo."', '".$nombre."', '".$moneda."', '".$categoria."', 
		'".$estado."', '".$unidad."', '".$lote."', '".$bien."', '".$impuesto."', '".$descripcion."') ");
	}
   
	public function existe_codigo($codigo)
	{
		$query = $this->db->query("CALL EXISTE_CODIGO_UNICO('".$codigo."') ");
		if ($query->num_rows() > 0) {
		return false;
		}else {
			
			return true;
		}	
	}

	public function eliminarProducto($id)
	{ 
	    $this->db->query("CALL BORRAR_PRODUCTO('".$id."',@rpta);");   
		$query = $this->db->query("SELECT @rpta as rpta;");  
        return $query->result();
	}
	
	public function actualizando_productos($uid,$ucodigo,$unombre,$umoneda,$ucategoria,$uestado,$uunidad,$ulote,$ubien
	,$uimpuesto,$udescripcion)
	{
		$query =  $this->db->query("CALL ACTUALIZAR_PRODUCTOS( '".$uid."', '".$ucodigo."', '".$unombre."', '".$umoneda."', '".$ucategoria."', 
		'".$uestado."', '".$uunidad."', '".$ulote."', '".$ubien."', '".$uimpuesto."', '".$udescripcion."') ");
	}






}

