<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if( $enlaces == "product" ||
			$enlaces == "nosotros" ||
			$enlaces == "ofertas" ||
			$enlaces == "promociones" ||
			$enlaces == "categoria" ||
			$enlaces == "contacto" ||
			$enlaces == "home"){

			$module = "views/modules/".$enlaces.".php";

		}
		else if($enlaces == "index"){
			$module = "views/modules/index.php";
		}else if ($enlaces == "acceso") {
			$module = "views/modules/access.php";
		}else{
			$module = "views/modules/404.php";
		}

		return $module;

	}


}