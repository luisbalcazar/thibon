<?php 
session_start();
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorFooter.php';

require_once '../../controllers/gestorFooter.php';

class GestorFooterAjax{

	public function nothing(){
		// $respuesta = GestorConfigController::toggle_side_bar();
		// echo json_encode($respuesta);
	}



}

$footer = new GestorFooterAjax();


