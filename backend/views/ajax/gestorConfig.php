<?php 
session_start();
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorConfig.php';

require_once '../../controllers/gestorConfig.php';

class GestorConfigAjax{

	public function toggle_side_bar(){
		$respuesta = GestorConfigController::toggle_side_bar();
		echo json_encode($respuesta);
	}
	public function ver_toggle_side_bar(){
		$respuesta = GestorConfigController::ver_toggle_side_bar();
		echo json_encode($respuesta);
	}
	public function update_field_config(){
		$respuesta = GestorConfigController::update_field_config();
		echo json_encode($respuesta);
	}

	

}

$config = new GestorConfigAjax();

if (isset($_POST["toggle_side_bar"])) {
	$config -> toggle_side_bar();
}
if (isset($_POST["ver_toggle_side_bar"])) {
	$config -> ver_toggle_side_bar();
}
if (isset($_POST["update_field_config"])) {
	$config -> update_field_config();
}

