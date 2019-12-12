<?php

class gestorArticulosModel{

	public function ingresoArticulosModel($datosModel, $tabla){

		$consulta = new Consulta();

		if (isset($datosModel["titulo"])) {
			$titulo = $datosModel["titulo"];
			$extracto = htmlspecialchars($datosModel["extracto"],ENT_QUOTES);
			$categoria = $datosModel["categoria"];
			$etiquetas = $datosModel["etiquetas"];
			$contenido = htmlspecialchars($datosModel["contenido"],ENT_QUOTES);
			$fecha = $datosModel["fecha"];
			$foto = $datosModel["foto"];
			$alias = $datosModel["alias"];
			$subtitulo = $datosModel["subtitulo"];

			$sql="INSERT INTO $tabla (titulo, subtitulo, categoria, fecha, alias, estado, extracto, contenido, foto, etiquetas) values ('$titulo', '$subtitulo', '$categoria', '$fecha', '$alias', 'activado', '$extracto', '$contenido', '$foto', '$etiquetas')";

			// var_dump($datosModel);

			$resultado = $consulta -> nuevo_registro($sql);

			if($resultado){
				return "ok";
			}else{
				return "error";	
			}
		}

	}

	public function verArticulosModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'activado'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public function verArticulosPapeleraModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'desactivado'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public function verEditArticulosModel($tabla, $id){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE id = '$id'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public function editarArticulosModel($datosModel, $tabla){

		$consulta = new Consulta();
		$titulo = $datosModel["titulo"];
		$extracto = htmlspecialchars($datosModel["extracto"],ENT_QUOTES);
		$categoria = $datosModel["categoria"];
		$etiquetas = $datosModel["etiquetas"];
		$contenido = htmlspecialchars($datosModel["contenido"],ENT_QUOTES);
		$fecha = $datosModel["fecha"];
		$foto = $datosModel["foto"];
		$alias = $datosModel["alias"];
		$subtitulo = $datosModel["subtitulo"];
		$id = $datosModel["id"];

		$sql="UPDATE $tabla SET titulo='$titulo', subtitulo='$subtitulo', alias='$alias', categoria = '$categoria', fecha = '$fecha', extracto='$extracto', contenido = '$contenido', foto = '$foto', etiquetas='$etiquetas' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

	public function eliminarArticulosModel($datosModel, $tabla){

		$consulta = new Consulta();
		$id = $datosModel;

		$sql="UPDATE $tabla SET estado='desactivado' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

	public function eliminarArticulosPermanenteModel($datosModel, $tabla){

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

	public function restaurarArticulosModel($datosModel, $tabla){

		$consulta = new Consulta();
		$id = $datosModel;

		$sql="UPDATE $tabla SET estado='activado' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

}


?>