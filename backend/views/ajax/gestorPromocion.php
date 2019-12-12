<?php 
	require_once '../../models/conexion.php';
	require_once '../../models/consulta.php';
	require_once '../../models/gestorUsuario.php';
	require_once '../../models/gestorProducto.php';
	require_once '../../models/gestorCategoria.php';
	require_once '../../models/gestorPromociones.php';

	require_once '../../controllers/enlaces.php';
	require_once '../../controllers/template.php';
	require_once '../../controllers/gestorUsuario.php';
	require_once '../../controllers/gestorProducto.php';
	require_once '../../controllers/gestorCategoria.php';
	require_once '../../controllers/gestorPromociones.php';

class Ajax{

	public function verPromocion(){
		
		$respuesta = gestorPromocionesController::verProductoDatoController();
		echo json_encode($respuesta);
	}

	public function guardarPromocion(){
		
		$respuesta = gestorPromocionesController::ingresoPromocionesController();
		echo json_encode($respuesta);
	}

	public function editarPromocion(){
		
		$respuesta = gestorPromocionesController::editarPromocionController();
		echo json_encode($respuesta);
	}

	public function eliminarPromocion(){
		
		$respuesta = gestorPromocionesController::eliminarPromocionController();
		echo json_encode($respuesta);
	}

}

$a = new Ajax();

if (isset($_POST["idPromo"])) {
	$a ->verPromocion();
}

if (isset($_POST["datos"])) {
	$a ->guardarPromocion();
}

if (isset($_POST["editar-prom-alias"])) {
	$a ->editarPromocion();
}

if (isset($_POST["id_promE"])) {
	$a ->eliminarPromocion();
}