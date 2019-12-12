<?php

class gestorCategoriaModel{

	public function ingresoCategoriaModel($datosModel, $tabla){

		$consulta = new Consulta();

		$nombre = $datosModel["nombre"];
		$descripcion = $datosModel["descripcion"];
		$foto = $datosModel["foto"];

		if (isset($datosModel["padre"])) {
			$padre = $datosModel["padre"];
			$sql="INSERT INTO $tabla (nombre, descripcion, foto, padre, estado) values ('$nombre', '$descripcion', '$foto', '$padre', 'activado')";
		}else{
			$sql="INSERT INTO $tabla (nombre, descripcion, foto, estado) values ('$nombre', '$descripcion', '$foto', 'activado')";
		}

		$resultado = $consulta -> nuevo_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";
		}

	}

	public function verCategoriaModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'activado' ORDER BY posicion";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public function editCategoriaModel($datosModel, $tabla){

		$consulta = new Consulta();

		$nombre = $datosModel["nombre"];
		$descripcion = $datosModel["descripcion"];
		$foto = $datosModel["foto"];
		$id = $datosModel["id"];
		$categoriaP = $datosModel["categoria"];

	
		$old_categoria = $consulta->ver_registros("select * from categorias where id = '$id'");

		$old_name = $old_categoria[0]["nombre"];

		//actualizando productos con esta categoría
		$consulta->actualizar_registro("update productos set categoria = '$nombre' where categoria = '$old_name'");

		//actualizando categorias hijas
		$consulta->actualizar_registro("update categorias set padre = '$nombre' where padre = '$old_name'");

		$sql="UPDATE $tabla SET nombre = '$nombre', descripcion = '$descripcion', foto = '$foto', padre = '$categoriaP' WHERE id = $id";
		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";
		}

	}

	public function cambiarPosicionCategoriaModel($datosModel, $tabla){

		$consulta = new Consulta();

		$index = $datosModel["index"];
		$newPosition = $datosModel["newPosition"];

		$sql="UPDATE $tabla SET posicion = '$newPosition' WHERE id = $index";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";
		}
	}

	public function eliminarCategoriaModel($datosModel, $tabla){

		$consulta = new Consulta();
		$id = $datosModel;

		$sql="DELETE FROM $tabla WHERE id='$id'";

		$resultado = $consulta -> borrar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

}


?>