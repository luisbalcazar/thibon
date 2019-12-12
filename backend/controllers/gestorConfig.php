<?php 


class GestorConfigController{

	public static function toggle_side_bar(){

		$resp = GestorConfigModel::toggle_side_bar();
		
		return $resp;
	}

	public static function ver_toggle_side_bar(){

		$resp = GestorConfigModel::ver_toggle_side_bar();
		
		return $resp;
	}
	public static function update_field_config(){
		$error = false;
		
		if ($_POST["value"] == "") {
			$error = "ingrese un valor";
		}						

		if (!$error) {
					
			$respuesta = GestorConfigModel::update_field_config();		

			if ($respuesta == "ok") {

				$arr["status"] = "ok";

				return $arr;
			}else{				
				return $respuesta;
			}		

		}else{
			$arr["status"] = "error";
			$arr["error"] = $error;

			return $arr;
		}
	}
		

	
}