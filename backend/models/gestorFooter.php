<?php 

class GestorFooterModel{


	public static function actualizar_footer(){
		$consulta = new Consulta();

		
		$post = htmlspecialchars($_POST["cuerpo"],ENT_QUOTES);


		$consulta->actualizar_registro("update footer set cuerpo ='$post'");	

		$arr["status"] = "ok";

		return $arr;
	}

	public static function ver_footer(){
		$consulta = new Consulta();

		
		$arr = $consulta->ver_registros("select * from footer");
	
		return $arr;
	}

	

}