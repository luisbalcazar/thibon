<?php 

class GestorConfigModel{


	public static function toggle_side_bar(){
		$consulta = new Consulta();

		$last_ = $consulta->ver_registros("select * from config where config_code = 'TSB'");

		$last_value = $last_[0]["config_value"];


		$new = ($last_value == "fuse-aside-folded") ? "fuse-aside-expanded" : "fuse-aside-folded";

		$consulta->actualizar_registro("update config set config_value ='$new' where config_code = 'TSB'");	

		$arr["status"] = "ok";

		return $arr;
	}

	public static function ver_toggle_side_bar(){
		$consulta = new Consulta();

		$last_ = $consulta->ver_registros("select * from config where config_code = 'TSB'");
		
		return $last_;
	}

	public static function update_field_config(){

		$consulta = new Consulta();

		$val = $_POST["value"];
		$key = $_POST["key"];
		$id = $_POST["id_p"];
		$error = false;

		if (!$error) {

			$resp = $consulta -> actualizar_registro("update config set config_value = '$val' where config_id = '$id'");

			return "ok";

		}else {
			$arr["status"] = "error";
			$arr["error"] = "error desconocido";

			return $arr;
		}
			

	}

}