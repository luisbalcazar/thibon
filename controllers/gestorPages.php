<?php 


class GestorPagesController{

	public function ver_page($page){

		$page = GestorPagesModel::ver_page($page);

		$texto = htmlspecialchars_decode($page["cuerpo"]);
		
		echo $texto;

	}
	
}