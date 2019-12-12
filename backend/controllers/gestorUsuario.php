<?php
session_start();

class GestorIngresoController{

	public function ingresoController(){

		if(isset($_POST["usuarioIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

				$datosController = array("usuario"=>$_POST["usuarioIngreso"],
				                     "password"=>$_POST["passwordIngreso"]);

				$respuesta = GestorIngresoModel::ingresoModel($datosController, "usuarios");
				
				$resultado = $respuesta[0];
				$intentos = $resultado["intentos"];
				//var_dump($resultado);
				$usuarioActual = $_POST["usuarioIngreso"];
				$maximoIntentos = 3;

				if($intentos < $maximoIntentos){

					if ($resultado["tipo"]==1 || $resultado["tipo"]==2) {
						
						if(strtolower($resultado["usuario"]) == $_POST["usuarioIngreso"] && password_verify($_POST["passwordIngreso"], $resultado["contrasena"])){

							$intentos = 0;

							$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
							$respuestaActualizarIntentos = GestorIngresoModel::intentosModel($datosController, "usuarios");

							$_SESSION["validar"] = true;
							$_SESSION["usuario"] = $resultado["usuario"];
							$_SESSION["id"] = $resultado["id"];
							$_SESSION["password"] = $resultado["contrasena"];
							$_SESSION["correo"] = $resultado["correo"];
							$_SESSION["foto"] = $resultado["foto"];
							$_SESSION["tipo"] = $resultado["tipo"];

							return "ok";
			
						} else{

							++$intentos;

							$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

							$respuestaActualizarIntentos = GestorIngresoModel::intentosModel($datosController, "usuarios");

							echo '<div class="alert alert-danger">Usuario o contraseña incorrecta.</div>';

						}

					}elseif ($resultado["tipo"]==0) {
						$intentos = 0;

							$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
							$respuestaActualizarIntentos = GestorIngresoModel::intentosModel($datosController, "usuarios");
							$_SESSION["validar"] = true;
							$_SESSION["usuario"] = $resultado["usuario"];
							$_SESSION["id"] = $resultado["id"];
							$_SESSION["password"] = $resultado["contrasena"];
							$_SESSION["correo"] = $resultado["correo"];
							$_SESSION["foto"] = $resultado["foto"];
							$_SESSION["tipo"] = $resultado["tipo"];

							return "ok";
							//echo '<div class="alert alert-danger">Este es el login unicamente de usuarios.</div>';
					}

				} else{
					$intentos = 0;

					$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

					$respuestaActualizarIntentos = GestorIngresoModel::intentosModel($datosController, "usuarios");

					echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>';

				}

			} else{
				echo "ERROR! El nombre de usuario no debe contener caracteres especiales.";
			}

		}
	}


	public static function nuevo_usuario(){
		$error = false;
		$ruta = "";
		if ($_POST["user_name"] == "" || $_POST["user_email"] == "" || $_POST["user_password"] == "" || $_POST["user_tipe"] == "") {
			$error = "todos los campos son requeridos";
		}

		if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
			$error = "Formato de correo incorrecto.";
		}

		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["user_name"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["user_password"])) {
			
		}else{
			$error = "No se permiten caracteres especiales al usuario o contraseña";
		}


		if (!$error) {
			
			if($_FILES["user_photo"]["tmp_name"] != ""){

				$imagen = $_FILES["user_photo"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($imagen)) {
					$ruta = "views/images/avatars/perfil".$aleatorio.".jpg";
					move_uploaded_file($imagen, "../../".$ruta);
				}
			}
			if($ruta == ""){
				$ruta = "views/images/avatars/profile.jpg";	
			}

			$respuesta = GestorIngresoModel::nuevo_usuario($ruta);

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

	public static function check_email($email){

	}

	public static function ver_usuarios(){


		$usuarios = GestorIngresoModel::ver_usuarios();

		for ($i=0; $i < count($usuarios); $i++) { 

			$id = $usuarios[$i]["id"];
			$user = $usuarios[$i]["usuario"];
			$correo = $usuarios[$i]["correo"];
			$foto = $usuarios[$i]["foto"];
			$tipo = $usuarios[$i]["tipo"];

			$chech1 = ($tipo == "0") ? "selected" : "";
			$chech2 = ($tipo == "1") ? "selected" : "";
				
			echo "

				<div class='info-line mb-6 info_line_user' data-id='$id'>
					<div data-id='$id' class='toggle_user'>
						<div class='title font-weight-bold mb-1 text-user_$id'>
							$user <span class='float-right borrar_user' data-id='$id'><i class='icon-trash'></i></span>
						</div>
		                <div class='info text-email_$id'>$correo</div>

					</div>
		                

	                <form class='edit_user my-3 form_hide_$id form_hide hide_' id='form_hide_$id'>                                                        
	                    <div class='form-row'>
	                        <div class='col'>	                            
	                            <label for='user_name_edit_$id' class='form-control-label'>Usuario:</label>
	                            <input type='text' class='form-control user_e_n' id='user_name_edit_$id' value='$user' data-id='$id' data-key='usuario'> 
	                        </div>
	                        <div class='col'>
	                            
	                            <label for='user_email_edit_$id' class='form-control-label'>Correo:</label>
	                            <input type='text' class='form-control user_e_n' id='user_email_edit_$id' value='$correo' data-id='$id' data-key='correo'>	                   
	                        </div>
	                    </div>
	                    <div class='form-row my-3'>
	                        <div class='col'>
	                            
	                            <label for='' class='form-control-label'>Contraseña:</label>
	                            <input type='text' class='form-control user_e_n' id='user_password_edit_$id' data-id='$id' data-key='contrasena'>                                                                    
	                        </div>
	                        <div class='col'>
	                        	<label for='' class='form-control-label'>Tipo:</label>
	                        	<select class='form-control user_e_n' id='user_tipe_edit_$id' data-id='$id' data-key='tipo'>
		                            <option value='0' $chech1>Administrador</option>
		                            <option value='1' $chech2>Normal</option>
		                        </select>
	                        </div>
	                    </div>
	                    <div class='info_edit_$id'></div>
	                </form>
	            </div>

					
			";

		}
	}


	public static function update_field(){
		$error = false;
		
		if ($_POST["value"] == "") {
			$error = "ingrese un valor";
		}

		if ($_POST["key"] == "correo") {
			if (!filter_var($_POST["value"], FILTER_VALIDATE_EMAIL)) {
				$error = "Formato de correo incorrecto.";
			}
		}

		if ($_POST["key"] == "usuario" || $_POST["key"] == "contrasena") {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["value"])) {
				
			}else{
				$error = "No se permiten caracteres especiales al usuario o contraseña";
			}
		}
						

		if (!$error) {
					
			$respuesta = GestorIngresoModel::update_field();		

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

	public static function borrar_usuario(){

		$respuesta = GestorIngresoModel::borrar_usuario();

		return $respuesta;

	}

	public static function cambiar_contrasena(){
		$error = false;

		
		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["user_password_now"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["user_new_password"])) {
			
		}else{
			$error = "No se permiten caracteres especiales al usuario o contraseña";
		}

		if (!password_verify($_POST["user_password_now"], $_SESSION["password"])) {
			$error = "contraseña actual incorrecta";
		}

		if ($_POST["user_password_now"] == "" || $_POST["user_new_password"] == "") {
			$error = "todos los campos son requeridos";
		}


		if (!$error) {
	
			$respuesta = GestorIngresoModel::cambiar_contrasena();

			if ($respuesta == "ok") {

				$encriptacion = password_hash($_POST["user_new_password"], PASSWORD_DEFAULT);

				$_SESSION["password"] = $encriptacion;

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

	public static function change_photo(){
		$ruta = "";

		if($_FILES["photo_user"]["tmp_name"] != ""){



			if ($_FILES["photo_user"]["type"] == "image/jpeg" || $_FILES["photo_user"]["type"] == "image/png") {
				$imagen = $_FILES["photo_user"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($imagen)) {
					$ruta = "views/images/avatars/perfil".$aleatorio.".jpg";
					move_uploaded_file($imagen, "../../".$ruta);
					unlink("../../".$_SESSION["foto"]);
				}
			}

				
		}
		if($ruta != ""){
			$respuesta = GestorIngresoModel::change_photo($ruta);	

			$_SESSION["foto"] = $ruta;
			$arr["status"] = "ok";
			$arr["ruta"] = $ruta;

			return $arr;
		}

	}
}