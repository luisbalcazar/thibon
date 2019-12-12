<?php

class gestorProductoModel{

	public function ingresoProductoModel($datosModel, $tabla){

		$consulta = new Consulta();

		if (isset($datosModel["nombre"])) {
			$nombre = $datosModel["nombre"];
			$descripcion = $datosModel["descripcion"];
			$categoria = $datosModel["categoria"];
			$etiquetas = $datosModel["etiquetas"];
			$precio = $datosModel["precio"];
			$impuesto = $datosModel["impuesto"];
			$foto = "";
			$codigo = $datosModel["codigo"];
			$inventario = $datosModel["inventario"];


			$sql="INSERT INTO $tabla (nombre, descripcion, categoria, etiquetas, foto, precio, impuesto, codigo, inventario, estado) values ('$nombre', '$descripcion', '$categoria', '$etiquetas', '$foto', '$precio', '$impuesto', '$codigo', '$inventario', 'activado')";

			$resultado = $consulta -> nuevo_registro($sql);

			$last_product = $consulta -> ver_registros("select MAX(id) as id from productos");

			return $last_product[0];

		}

	}

	public static function guardar_files_producto($files, $img_principal, $id){

		$consulta = new Consulta();

		$length = count($files);


		if ($img_principal != false) {			
			$consulta->actualizar_registro("update productos set foto = '$img_principal' where id = '$id'");
		}

		$order = $consulta -> ver_registros("select MAX(orden) as orden from multimedia_product where id_product = '$id'");

		if (isset($order[0])) {
			$orden = $order[0]["orden"];
		}else {
			$orden = 0;
		}

		// $contador = $order
		for ($i=0; $i < $length; $i++) { 

			$orden++;

			$path = $files[$i]["path"];
			$name = $files[$i]["type"];

			$consulta -> nuevo_registro("insert into multimedia_product (name_key,path_media,id_product,orden) values ('$name','$path','$id','$orden')");
		}

		return 'ok';

	}

	public static function ver_ultimo_archivo($id){

		$consulta = new Consulta();

		$order = $consulta -> ver_registros("select MAX(orden) as orden from multimedia_product where id_product = '$id'");

		if (isset($order[0])) {
			$orden = $order[0]["orden"];
		}else {
			$orden = 0;
		}

		return $orden;
	}
	public static function ver_num_productos(){

		$consulta = new Consulta();

		$normal = $consulta -> ver_registros("SELECT * FROM productos WHERE estado = 'activado' && oferta = '0.00'");
		$oferta = $consulta -> ver_registros("SELECT * FROM productos WHERE estado = 'activado' && oferta != '0.00'");

		$papelera = $consulta -> ver_registros("SELECT * FROM productos WHERE estado != 'activado'");

		$arr["normal"] = count($normal);
		$arr["oferta"] = count($oferta);
		$arr["papelera"] = count($papelera);

		return $arr;
	}

	public static function verProductoModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'activado' && oferta = '0.00'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}
	public static function verProductoOfertaModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado = 'activado' && oferta != '0.00'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}
	public static function verProductoPapeleraModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla WHERE estado != 'activado'";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

	public static function ver_info_producto($id){
		
		$consulta = new Consulta();
		
		$producto = $consulta -> ver_registros("select * from productos where id = '$id'");
		$imgs = $consulta -> ver_registros("select * from multimedia_product where name_key = 'image' && id_product = '$id'");
		$videos = $consulta -> ver_registros("select * from multimedia_product where name_key = 'video' && id_product = '$id'");

		$count_media = count($imgs) + count($videos);

		$arr["info_p"] = (isset($producto[0])) ? $producto[0] : [];
		$arr["images"] = $imgs;
		$arr["videos"] = $videos;
		$arr["count_media"] = $count_media;

		return $arr;
	}
	public static function ver_images_producto($id){
		
		$consulta = new Consulta();
				
		$imgs = $consulta -> ver_registros("select * from multimedia_product where id_product = '$id' order by orden");
	
		return $imgs;
	}
	public static function actualizarOrden(){

		$consulta = new Consulta();

		$nuevoOrden = $_POST["nuevoOrden"];

		$contador = 1;
		for ($i=0; $i < count($nuevoOrden); $i++) { 

			$id = $nuevoOrden[$i]; 

			$consulta -> actualizar_registro("update multimedia_product set orden = '$contador' where id_media = '$id'");

			$contador++;
		}

		return 'ok';


	}

	public static function set_primary(){

		$consulta = new Consulta();

		$id = $_POST["id_file"];
		$id_p = $_POST["id_p"];

		$file = $consulta -> ver_registros("select * from multimedia_product where id_media = '$id' ");
		$producto = $consulta -> ver_registros("select foto from productos where id = '$id_p'");

		$ruta1 = $file[0]["path_media"];
		$ruta2 = $producto[0]["foto"];


		$consulta->actualizar_registro("update productos set foto = '$ruta1' where id = '$id_p'");

		$consulta->actualizar_registro("update multimedia_product set path_media = '$ruta2' where id_media = '$id'");


		return 'ok';

	}

	public static function editarProductoModel($datosModel, $tabla){

		$consulta = new Consulta();
		$nombre = $datosModel["nombre"];
		$descripcion = $datosModel["descripcion"];
		$categoria = $datosModel["categoria"];
		$etiquetas = $datosModel["etiquetas"];
		$precio = $datosModel["precio"];
		$impuesto = $datosModel["impuesto"];
		$foto = $datosModel["foto"];
		$codigo = $datosModel["codigo"];
		$inventario = $datosModel["inventario"];
		$id = $datosModel["id"];

		$sql="UPDATE $tabla SET nombre='$nombre', descripcion='$descripcion', categoria='$categoria', foto = '$foto', codigo = '$codigo', etiquetas='$etiquetas', inventario = '$inventario', precio = '$precio', impuesto='$impuesto' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}

	public static function eliminarProductoModel($datosModel, $tabla){

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
	public static function borrar_permanente(){

		$consulta = new Consulta();

		$id = $_POST["id_p"];

		
		$media = $consulta -> ver_registros("select * from multimedia_product where id_product = '$id'");

		for ($i=0; $i < count($media); $i++) { 
			
			$item_media = $media[$i];

			if ( file_exists("../../".$item_media["path_media"]) ) {
				unlink("../../".$item_media["path_media"]);
			}
		}

		$consulta->borrar_registro("delete from multimedia_product where id_product = '$id'");

		$info = $consulta -> ver_registros("select * from productos where id = '$id'");

		if ( file_exists("../../".$info[0]["foto"]) ) {
			unlink("../../".$info[0]["foto"]);
		}
		
		$consulta->borrar_registro("delete from productos where id = '$id'");

	
		return "ok";

	}
	public static function restaurar_producto(){

		$consulta = new Consulta();
		$id = $_POST["id_p"];

		$sql="UPDATE productos SET estado='activado' WHERE id='$id'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}else{
			return "error";	
		}

	}
	public static function borrar_file(){
		
		$consulta = new Consulta();

		$id = $_POST["id_file"];
		
		$file = $consulta -> ver_registros("select * from multimedia_product where id_media = '$id' ");

		try {
			if (isset($file[0])) {				
				unlink("../../".$file[0]["path_media"]);
			}
		} catch (Exception $e) {
			
		}
		$consulta->borrar_registro("delete from multimedia_product where id_media = '$id'");
	
		return 'ok';
	}

	public static function update_field(){

		$consulta = new Consulta();

		$val = $_POST["value"];
		$key = $_POST["key"];
		$id = $_POST["id_p"];
		$error = false;

		if (!$error) {

			$resp = $consulta -> actualizar_registro("update productos set $key = '$val' where id = '$id'");

			return "ok";

		}else {
			$arr["status"] = "error";
			$arr["error"] = "error desconocido";

			return $arr;
		}	

	}

	public static function verProductoDatoModel($tabla, $id){

		$consulta = new Consulta();

		//$datos[] = array();

		for($i=0; $i<count($id); $i++) {

			$idP = $id[$i];

			$sql="SELECT * FROM $tabla WHERE id='$idP'";

			$resultado = $consulta -> ver_registros($sql);
			$datos[]=$resultado;
		}

		return $datos;

	}

}


?>