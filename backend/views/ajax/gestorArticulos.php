<?php 
	require_once '../../models/conexion.php';
	require_once '../../models/consulta.php';
	require_once '../../models/gestorUsuario.php';
	require_once '../../models/gestorProducto.php';
	require_once '../../models/gestorCategoria.php';
	require_once '../../models/gestorArticulo.php';

	require_once '../../controllers/enlaces.php';
	require_once '../../controllers/template.php';
	require_once '../../controllers/gestorUsuario.php';
	require_once '../../controllers/gestorProducto.php';
	require_once '../../controllers/gestorCategoria.php';
	require_once '../../controllers/gestorArticulo.php';

class Ajax{

	public function eliminarArticulo(){
		
		$respuesta = gestorArticulosController::eliminarArticulosController();
		echo json_encode($respuesta);
	}

	public function restaurarArticulo(){
		
		$respuesta = gestorArticulosController::restaurarArticulosController();
		echo json_encode($respuesta);
	}

	public function eliminarRealArticulo(){
		
		$respuesta = gestorArticulosController::eliminarArticulosPermanenteController();
		echo json_encode($respuesta);
	}

}

$a = new Ajax();

if (isset($_POST["eliminarArticulo"])) {
	$a ->eliminarArticulo();
}

if (isset($_POST["restaurarArticulo"])) {
	$a ->restaurarArticulo();
}

if (isset($_POST["eliminarRealArticulo"])) {
	$a ->eliminarRealArticulo();
}