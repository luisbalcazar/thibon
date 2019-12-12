<?php

class GestorIngresoModel{

	public function ingresoModel($datosModel, $tabla){

		$consulta = new Consulta();
		$usuario = $datosModel["usuario"];
		$sql="SELECT * FROM $tabla WHERE usuario = '$usuario'";
		
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}

	public function intentosModel($datosModel, $tabla){

		$consulta = new Consulta();
		$tries = $datosModel["actualizarIntentos"];
		$usuario = $datosModel["usuarioActual"];
		$sql = "UPDATE $tabla SET intentos = '$tries' WHERE usuario = '$usuario'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){

			return "ok";
		}

		else{

			return "error";
		}

	}

	public static function nuevo_usuario($ruta){

		$consulta = new Consulta();

		$user = htmlspecialchars($_POST["user_name"], ENT_QUOTES);
		$email = $_POST["user_email"];
		$password = $_POST["user_password"];
		$tipe = $_POST["user_tipe"];

		$encriptacion = password_hash($password, PASSWORD_DEFAULT);

		
		$check_user = $consulta -> ver_registros("SELECT * FROM usuarios WHERE usuario = '$user'");

		if (count($check_user) == 0) {
			$consulta -> nuevo_registro("insert into usuarios (usuario,contrasena,correo,foto,tipo) values ('$user','$encriptacion','$email','$ruta','$tipe')");

			return "ok";

		}else {
			$arr["status"] = "error";
			$arr["error"] = "este usuario ya está registrado";

			return $arr;
		}
			

	}


	public static function ver_usuarios(){

		$consulta = new Consulta();

		$my_id = $_SESSION["id"];

		$usuarios = $consulta -> ver_registros("SELECT * FROM usuarios where id != '$my_id'");


		return $usuarios;
	}

	public static function update_field(){

		$consulta = new Consulta();

		$val = htmlspecialchars($_POST["value"], ENT_QUOTES);
		$key = $_POST["key"];
		$id = $_POST["id_user"];
		$error = false;

		if ($key == "contrasena") {
			$val = password_hash($val, PASSWORD_DEFAULT);
		}	

		if ($key == "usuario") {
			$check_user = $consulta -> ver_registros("SELECT * FROM usuarios WHERE usuario = '$val'");		

			if (count($check_user) != 0) {
				$error = true;
			}
		}

		if (!$error) {

			$resp = $consulta -> actualizar_registro("update usuarios set $key = '$val' where id = '$id'");

			return "ok";

		}else {
			$arr["status"] = "error";
			$arr["error"] = "este usuario ya está registrado";

			return $arr;
		}
			

	}

	public static function borrar_usuario(){


		$consulta = new Consulta();

		$id = $_POST["id_user"];

		$usuarios = $consulta -> borrar_registro("delete from usuarios where id = '$id'");

		$arr["status"] = "ok";

		return $arr;
	}
	public static function cambiar_contrasena(){

		$consulta = new Consulta();

		$password_now = $_POST["user_password_now"];
		$password = $_POST["user_new_password"];
		$id = $_SESSION["id"];
		
		// $tipe = $_POST["user_tipe"];

		$encriptacion = password_hash($password, PASSWORD_DEFAULT);

	
		$consulta -> actualizar_registro("UPDATE usuarios set contrasena = '$encriptacion' where id = '$id'");

		return "ok";

			

	}
	public static function change_photo($ruta){

		$consulta = new Consulta();

		
		$id = $_SESSION["id"];
		
		$consulta -> actualizar_registro("UPDATE usuarios set foto = '$ruta' where id = '$id'");

		return "ok";
			

	}

}