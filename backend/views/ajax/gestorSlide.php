<?php 
session_start();
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorSlide.php';

require_once '../../controllers/gestorSlide.php';

class GestorSlideAjax{

	public function nuevaImagenSlide(){
		$respuesta = GestorSlideController::nuevaImagenSlide();
		echo json_encode($respuesta);
	}
	public function actualizarImagen(){
		$respuesta = GestorSlideController::actualizarImagen();
		echo json_encode($respuesta);
	}
	public function actualizarOrden(){
		$respuesta = GestorSlideController::actualizarOrden();
		echo json_encode($respuesta);
	}
	public function guardarTextoSlide(){
		$respuesta = GestorSlideController::guardarTextoSlide();
		echo json_encode($respuesta);
	}
	public function borrarImagen(){
		$respuesta = GestorSlideController::borrarImagen();
		echo json_encode($respuesta);
	}
	public function ver_texto_imagen(){
		$respuesta = GestorSlideController::ver_texto_imagen();
		echo json_encode($respuesta);
	}
	

}

$slide = new GestorSlideAjax();

if (isset($_POST["nuevaImagenSlide"])) {
	$slide -> nuevaImagenSlide();
}

if (isset($_POST["actualizarImagenSlide"])) {
	$slide -> actualizarImagen();
}
if (isset($_POST["actualizarOrden"])) {
	$slide -> actualizarOrden();
}
if (isset($_POST["ver_texto_imagen"])) {
	$slide -> ver_texto_imagen();
}


if (isset($_POST["guardarTextoSlide"])) {
	$slide -> guardarTextoSlide();
}

if (isset($_POST["borrarImagen"])) {
	$slide -> borrarImagen();
}
