<?php 

class GestorPagesModel{


	public static function actualizar_pages(){
		$consulta = new Consulta();

		
		$post = htmlspecialchars($_POST["cuerpo"],ENT_QUOTES);
		$name_page = $_POST["name_page"];


		$consulta->actualizar_registro("update pages set cuerpo ='$post' where name_page = '$name_page'");	

		$arr["status"] = "ok";

		return $arr;
	}

	public static function ver_page($name_page){

		$consulta = new Consulta();
		
		
		$arr = $consulta->ver_registros("select * from pages where name_page = '$name_page'");
	
		return $arr;
	}

	

}