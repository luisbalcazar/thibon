<?php 
session_start();
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorPages.php';

require_once '../../controllers/gestorPages.php';

class GestorPagesAjax{

	public function nothing(){
		// $respuesta = GestorConfigController::toggle_side_bar();
		// echo json_encode($respuesta);
	}



}

$pages = new GestorPagesAjax();


