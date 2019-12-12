<?php

class gestorPromocionesModel{

	public function ingresoPromocionesModel($datosModel, $tabla){

		$consulta = new Consulta();

		if (isset($datosModel["id_p"])) {
			$id_p = $datosModel["id_p"];
			$cantidad = $datosModel["cantidades"];
			$precio = $datosModel["precio"];
			$foto = $datosModel["foto"];
			$alias = $datosModel["alias"];
			$descripcion = $datosModel["descripcion"];
			$estado = "activado";

			$sql="INSERT INTO $tabla (alias, descripcion, id_productos, cantidad, precio, foto, estado) values ('$alias','$descripcion','$id_p', '$cantidad', '$precio', '$foto', '$estado')";

			$resultado = $consulta -> nuevo_registro($sql);

			if ($resultado) {
				return "ok";
			}else{
				return "error";
			}
			

		}

	}

	public static function verPromocionesModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'activado'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public static function editarPromocionModel($datosModel, $tabla){

		$consulta = new Consulta();
		$alias = $datosModel["alias"];
		$descripcion = $datosModel["descripcion"];
		$precio = $datosModel["precio"];
		$foto = $datosModel["foto"];
		$cantidad = $datosModel["cantidad"];
		$id = $datosModel["id"];

		$sql="UPDATE $tabla SET alias='$alias', descripcion = '$descripcion', cantidad = '$cantidad', precio = '$precio', foto = '$foto' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

	public static function eliminarPromocionModel($datosModel, $tabla){

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
	public static function ver_num_promociones(){

		$consulta = new Consulta();

		$promos = $consulta -> ver_registros("SELECT * FROM promociones");
	
		return $promos;
	}

}


?>