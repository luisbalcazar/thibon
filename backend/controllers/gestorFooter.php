<?php 


class GestorFooterController{

	public static function actualizar_footer(){

		$resp = GestorFooterModel::actualizar_footer();
		
		return $resp;
	}

	public static function ver_footer(){

		$resp = GestorFooterModel::ver_footer();
		
		return $resp;
	}

	
}