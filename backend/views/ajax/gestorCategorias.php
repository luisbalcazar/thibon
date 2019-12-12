<?php 
	require_once '../../models/conexion.php';
	require_once '../../models/consulta.php';
	require_once '../../models/gestorUsuario.php';
	require_once '../../models/gestorProducto.php';
	require_once '../../models/gestorCategoria.php';

	require_once '../../controllers/enlaces.php';
	require_once '../../controllers/template.php';
	require_once '../../controllers/gestorUsuario.php';
	require_once '../../controllers/gestorProducto.php';
	require_once '../../controllers/gestorCategoria.php';

class Ajax{

	public function ingresarCategoria(){
		
		$respuesta = gestorCategoriaController::ingresoCategoriaController();
		echo json_encode($respuesta);
	}

	public function editarCategoria(){
		
		$respuesta = gestorCategoriaController::editCategoriaController();
		echo json_encode($respuesta);
	}

	public function posicionCategoria(){
		
		$respuesta = gestorCategoriaController::cambiarPosicionCategoriaController();
		echo json_encode($respuesta);
	}

	public function eliminarCategoria(){
		
		$respuesta = gestorCategoriaController::eliminarCategoriaController();
		echo json_encode($respuesta);
	}

}

$a = new Ajax();

if (isset($_POST["category-name"])) {
	$a ->ingresarCategoria();
}

if (isset($_POST["edit-name"])) {
	$a ->editarCategoria();
}

if (isset($_POST["update"])) {
	$a ->posicionCategoria();
}

if (isset($_POST["eliminar"])) {
	$a ->eliminarCategoria();
}