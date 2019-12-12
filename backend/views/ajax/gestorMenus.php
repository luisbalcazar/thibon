<?php 
	require_once '../../models/conexion.php';
	require_once '../../models/consulta.php';
	require_once '../../models/gestorUsuario.php';
	require_once '../../models/gestorProducto.php';
	require_once '../../models/gestorMenu.php';

	require_once '../../controllers/enlaces.php';
	require_once '../../controllers/template.php';
	require_once '../../controllers/gestorUsuario.php';
	require_once '../../controllers/gestorProducto.php';
	require_once '../../controllers/gestorMenu.php';

class Ajax{

	public function ingresarMenu(){
		
		$respuesta = gestorMenuController::ingresoMenuController();
		echo json_encode($respuesta);
	}

	public function editarMenu(){
		
		$respuesta = gestorMenuController::editMenuController();
		echo json_encode($respuesta);
	}

	public function posicionMenu(){
		
		$respuesta = gestorMenuController::cambiarPosicionMenuController();
		echo json_encode($respuesta);
	}

	public function eliminarMenu(){
		
		$respuesta = gestorMenuController::eliminarMenuController();
		echo json_encode($respuesta);
	}

}

$a = new Ajax();

if (isset($_POST["menu-name"])) {
	$a ->ingresarMenu();
}

if (isset($_POST["edit-name-menu"])) {
	$a ->editarMenu();
}

if (isset($_POST["actualizar"])) {
	$a ->posicionMenu();
}

if (isset($_POST["eliminarMenu"])) {
	$a ->eliminarMenu();
}