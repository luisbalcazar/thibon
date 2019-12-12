<?php

class gestorMenuModel{

	public function ingresoMenuModel($datosModel, $tabla){

		$consulta = new Consulta();

		$nombre = $datosModel["nombre"];
		$etiqueta = $datosModel["etiqueta"];
		$url = $datosModel["url"];
		$padre = $datosModel["categoria"];
		$estado = $datosModel["estado"];

		$sql="INSERT INTO $tabla (nombre, url, etiqueta, padre, estado) values ('$nombre', '$url', '$etiqueta', '$padre', '$estado')";

		$resultado = $consulta -> nuevo_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";
		}

	}

	public function verMenuModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla ORDER BY posicion";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public function editMenuModel($datosModel, $tabla){

		$consulta = new Consulta();

		$nombre = $datosModel["nombre"];
		$etiqueta = $datosModel["etiqueta"];
		$url = $datosModel["url"];
		$id = $datosModel["id"];

		if (isset($datosModel["menuP"])) {
			$categoria = $datosModel["menuP"];
			
			$sql="UPDATE $tabla SET nombre = '$nombre', url = '$url', etiqueta = '$etiqueta', padre = '$categoria', estado = 'hijo' WHERE id = $id";

			$resultado = $consulta -> actualizar_registro($sql);

			if ($categoria!="Sin menu padre") {

				$sql="SELECT estado FROM $tabla WHERE nombre = '$categoria'";

				$resultado2 = $consulta -> ver_registros($sql);
				//var_dump($resultado2[0]["estado"]);

				if ($resultado2[0]["estado"]=="hijo") {

					$sql="UPDATE $tabla SET estado = 'padre/hijo' WHERE nombre = '$categoria'";

					$respuesta = $consulta -> actualizar_registro($sql);
				}else{

					$sql="UPDATE $tabla SET estado = 'padre' WHERE nombre = '$categoria'";

					$respuesta = $consulta -> actualizar_registro($sql);
				}

			}


		}else{

			$sql="UPDATE $tabla SET nombre = '$nombre', url = '$url', etiqueta = '$etiqueta', padre = '$categoria' WHERE id = $id";

			$resultado = $consulta -> actualizar_registro($sql);
		}

		if($resultado){
			return "ok";
		}else{
			return "error";
		}

	}

	public function cambiarPosicionMenuModel($datosModel, $tabla){

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

	public function eliminarMenuModel($datosModel, $tabla){

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