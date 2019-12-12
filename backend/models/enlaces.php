<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if( $enlaces == "orders" ||
			$enlaces == "product" ||
			$enlaces == "products" ||
			$enlaces == "productsOfert" ||
			$enlaces == "trash" ||
			$enlaces == "trashArticulo" ||
			$enlaces == "edit" ||
			$enlaces == "slide" ||
			$enlaces == "profile" ||
			$enlaces == "login" ||
			$enlaces == "editFooter" ||
			$enlaces == "editNosotros" ||
			$enlaces == "category" ||
			$enlaces == "nuevoArticulo" ||
			$enlaces == "editarArticulo" ||
			$enlaces == "promociones" ||
			$enlaces == "editor" ||
			$enlaces == "menus" ||
			$enlaces == "logout" ||
			$enlaces == "register" ||
			$enlaces == "404" ||
			$enlaces == "register" ||
			$enlaces == "home"){

			$module = "views/modules/".$enlaces.".php";

		}
		else if($enlaces == "index"){
			$module = "views/modules/home.php";
		}else if ($enlaces == "acceso") {
			$module = "views/modules/access.php";
		}else{
			$module = "views/modules/404.php";
		}

		return $module;

	}


}