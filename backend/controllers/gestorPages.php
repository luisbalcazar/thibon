<?php 


class GestorPagesController{

	public static function actualizar_pages(){

		$resp = GestorPagesModel::actualizar_pages();
		
		return $resp;
	}

	public static function ver_page($page){

		$resp = GestorPagesModel::ver_page($page);
		
		return $resp;
	}

	
}