<?php 
	// ini_set("upload_max_filesize", "30M");
	// ini_set("post_max_size", "30M");
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

class Productos{

	public function ingresarProducto(){
		
		$respuesta = gestorProductoController::ingresoProductoController();
		echo json_encode($respuesta);
	}


	public function editarProducto(){
		
		$respuesta = gestorProductoController::editarProductoController();
		echo json_encode($respuesta);
	}

	public function eliminarProducto(){
		
		$respuesta = gestorProductoController::eliminarProductoController();
		echo json_encode($respuesta);
	}
	
	public static function borrar_permanente(){
		
		$respuesta = gestorProductoController::borrar_permanente();
		echo json_encode($respuesta);

	}
	public static function restaurar_producto(){
		
		$respuesta = gestorProductoController::restaurar_producto();
		echo json_encode($respuesta);

	}

	public static function actualizarOrdenProductos(){
		$respuesta = gestorProductoController::actualizarOrden();
		echo json_encode($respuesta);
	}
	public static function borrar_file(){
		$respuesta = gestorProductoController::borrar_file();
		echo json_encode($respuesta);
	}
	public static function set_primary(){
		$respuesta = gestorProductoController::set_primary();
		echo json_encode($respuesta);
	}
	public static function add_files_product(){
		$respuesta = gestorProductoController::add_files_product();
		echo json_encode($respuesta);
	}
	public static function update_field(){

		$respuesta = gestorProductoController::update_field();
		echo json_encode($respuesta);
	}
	
	


}


$a = new Productos();


if (isset($_POST["product-name"])) {
	$a ->ingresarProducto();
}


if (isset($_POST["editar-name"])) {
	$a ->editarProducto();
}

if (isset($_POST["id"])) {
	$a ->eliminarProducto();
}
if (isset($_POST["borrar_permanente"])) {
	$a ->borrar_permanente();
}
if (isset($_POST["restaurar_producto"])) {
	$a ->restaurar_producto();
}

if (isset($_POST["actualizarOrdenProductos"])) {
	$a ->actualizarOrdenProductos();
}
if (isset($_POST["borrar_file"])) {
	$a ->borrar_file();
}

if (isset($_POST["set_primary"])) {
	$a ->set_primary();
}
if (isset($_POST["add_files_product"])) {
	$a ->add_files_product();
}

if (isset($_POST["update_field"])) {
	$a ->update_field();
}