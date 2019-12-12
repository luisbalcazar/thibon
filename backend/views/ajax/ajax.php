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

	public function ingresar(){
		
		$respuesta = GestorIngresoController::ingresoController();
		echo json_encode($respuesta);
	}

	public function ingresarProducto(){
		
		$respuesta = gestorProductoController::ingresoProductoController();
		echo json_encode($respuesta);
	}

	// public function ingresarCategoria(){
		
	// 	$respuesta = gestorCategoriaController::ingresoCategoriaController();
	// 	echo json_encode($respuesta);
	// }

	// public function editarCategoria(){
		
	// 	$respuesta = gestorCategoriaController::editCategoriaController();
	// 	echo json_encode($respuesta);
	// }

	public function editarProducto(){
		
		$respuesta = gestorProductoController::editarProductoController();
		echo json_encode($respuesta);
	}

	public function eliminarProducto(){
		
		$respuesta = gestorProductoController::eliminarProductoController();
		echo json_encode($respuesta);
	}


	// gestor usuarios

	public static function nuevo_usuario(){

		$respuesta = GestorIngresoController::nuevo_usuario();
		echo json_encode($respuesta);
	}
	public static function update_field(){

		$respuesta = GestorIngresoController::update_field();
		echo json_encode($respuesta);
	}
	public static function borrar_usuario(){

		$respuesta = GestorIngresoController::borrar_usuario();
		echo json_encode($respuesta);
	}
	public static function cambiar_contrasena(){

		$respuesta = GestorIngresoController::cambiar_contrasena();
		echo json_encode($respuesta);
	}
	public static function change_photo(){

		$respuesta = GestorIngresoController::change_photo();
		echo json_encode($respuesta);
	}
		

}

$a = new Ajax();

if (isset($_POST["usuarioIngreso"])) {	
	$a ->ingresar();
}

if (isset($_POST["product-name"])) {
	$a ->ingresarProducto();
}

// if (isset($_POST["category-name"])) {
// 	$a ->ingresarCategoria();
// }

// if (isset($_POST["edit-name"])) {
// 	$a ->editarCategoria();
// }

if (isset($_POST["editar-name"])) {
	$a ->editarProducto();
}

if (isset($_POST["id"])) {
	$a ->eliminarProducto();
}


// crud gestor usuarios


if (isset($_POST["nuevo_usuario"])) {
	$a ->nuevo_usuario();
}
if (isset($_POST["update_field"])) {
	$a ->update_field();
}
if (isset($_POST["cambiar_contrasena"])) {
	$a ->cambiar_contrasena();
}
if (isset($_POST["borrar_usuario"])) {
	$a ->borrar_usuario();
}
if (isset($_POST["change_photo"])) {
	$a ->change_photo();
}
