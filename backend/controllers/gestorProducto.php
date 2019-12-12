<?php

class gestorProductoController {

	public function ingresoProductoController(){

		$ruta = "";

		if (isset($_POST["product-name"])){

		
			$datosController = array("nombre"=>$_POST["product-name"],
								"descripcion"=>$_POST["product-description"],
								"categoria"=>$_POST["categories"],
								"etiquetas"=>$_POST["tags"],
								"foto"=>$ruta,
								"codigo"=>$_POST["code"],
								"inventario"=> $_POST["quantity"],
								"impuesto"=>$_POST["taxes"],
								"precio"=>$_POST["price"]);

			//$resultado = new IngresoProductoModel();
			
			$resultado = gestorProductoModel::ingresoProductoModel($datosController, 'productos');

			$id_producto = $resultado["id"];

			//procesando imagen principal
			if(isset($_FILES["foto"]["tmp_name"]) && $_FILES["foto"]["tmp_name"] != ""){
				$foto = $_FILES["foto"]["tmp_name"];

				if ($_FILES["foto"]["type"] == "image/jpeg" || $_FILES["foto"]["type"] == "image/png"){

					if (is_uploaded_file($foto)) {
						$ruta = "views/images/productos/producto_principal_img".$id_producto.".jpg";
						move_uploaded_file($foto, "../../".$ruta);
					}
				}
				if($ruta == ""){
					$ruta = "views/images/productos/productoZ.jpg";	
				}
			}
			if($ruta == ""){
				$ruta = "views/images/productos/productoZ.jpg";	
			}

			//--------------------->

			//procesando imagenes del producto

			$srcs = gestorProductoController::procesar_files($_FILES["files_product"],$id_producto);


			$resp = gestorProductoModel::guardar_files_producto($srcs, $ruta, $id_producto);

			if ($resp == "ok") {
				$arr["status"] = "ok";
				$arr["id_producto"] = $id_producto;
			
				return $arr;
			} else{
				$arr["status"] = "error";
				$arr["upload_max_filesize"] = ini_get("upload_max_filesize");
				return $arr;
			} 
	
		}else{
			echo "fallo en controlador";
		}

	}

	public static function procesar_files($file_p,$id_producto){
		
		$files = [];
		$file_count = count($file_p["name"]);
		$file_keys = array_keys($file_p);
		$srcs = [];

		for ($i=0; $i < $file_count; $i++) { 
			foreach ($file_keys as $key) {
				$files[$i][$key] = $file_p[$key][$i];
			}
		}

		$orden = gestorProductoModel::ver_ultimo_archivo($id_producto);
		
		for ($i=0; $i < count($files); $i++) { 

			$orden++;

			if(isset($files[$i]["tmp_name"]) && $files[$i]["tmp_name"] != ""){

				$file = $files[$i]["tmp_name"];

				if ($files[$i]["type"] == "image/jpeg" || $files[$i]["type"] == "image/png"){
					if (is_uploaded_file($file)) {
						$ruta_aux = "views/images/productos/producto_img_$orden-$id_producto.jpg";
						move_uploaded_file($file, "../../".$ruta_aux);

						$aux_file = [
						    'path' => $ruta_aux,
						  	'type' => "image"
						];

						array_push($srcs, $aux_file);
					}
				}


				if ($files[$i]["type"] == "video/mp4" || $files[$i]["type"] == "video/avi" || $files[$i]["type"] == "video/mkv" || $files[$i]["type"] == "video/wmv" || $files[$i]["type"] == "video/flv" || $files[$i]["type"] == "video/dvd"){

					if (is_uploaded_file($file)) {

						$ruta_aux = "views/images/productos/producto_video_$orden-$id_producto.mp4";
						move_uploaded_file($file, "../../".$ruta_aux);

						$aux_file = [
						    'path' => $ruta_aux,
						  	'type' => "video"
						];
						array_push($srcs, $aux_file);
					}
				}

			}
			
		}

		return $srcs;

	}

	public static function verProductoController(){

		$resultado = gestorProductoModel::verProductoModel('productos');
		//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

		foreach ($resultado as $row => $item) {

				$formulario = "<div class='modal fade' id='edit-product-".$item["id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Editar Categoria</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button></div><div class='modal-body' id='div-edit'><form class='md-form' id='form-".$item["id"]."' name='editar-form'><div class='file-field'><div class='mb-4'><img style='width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;' src='".$item["foto"]."' class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'></div><div class='d-flex justify-content-center'><div class='btn btn-mdb-color btn-rounded float-left'><span>Añadir foto</span><input type='file' id='editar-photo' name='editar-photo'><input type='hidden' value='".$item["foto"]."' name='editarPhoto'></div></div></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Nombre:</label><input type='text' class='form-control' id='edit-name' name='editar-name' value='".$item["nombre"]."'/></div<div class='form-group'><br><label for='message-text' class='form-control-label'>Descripcion:</label><textarea class='form-control' id='edit-text' name='editar-text'>".$item["descripcion"]."</textarea><br><label for='message-text' class='form-control-label'>Categoria:</label><select class='form-control' name='editar-category' id='categories'><option value='".$item["categoria"]."'>".$item["categoria"]."</option></select><br><label for='recipient-name' class='form-control-label'>Etiquetas:</label><input type='text' class='form-control' id='edit-tags' name='editar-tags' value='".$item["etiquetas"]."'/></div<div class='form-group'><br><div class='form-group'><input type='text' name='editar-price' id='price' value='".$item["precio"]."' class='form-control' aria-label='Amount (to the nearest dollar)' /><label>Total</label></div><div class='form-group'><input type='text' name='editar-taxes' id='taxes' class='form-control' aria-label='Amount (to the nearest dollar)' value='".$item["impuesto"]."' /><label>Impuestos</label></div><div class='form-group'><input type='text' name='editar-code' id='code' class='form-control' aria-describedby='barcode' value='".$item["codigo"]."' /><label>Codigo</label></div><div class='form-group'><input name='editar-quantity' id='quantity' class='form-control' type='number' value='".$item["inventario"]."' aria-describedby='quantity' /><label for='example-number-input'>Cantidad</label></div></div><input type='hidden' value='".$item["id"]."' name='editar-id'></form></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button><button type='button' class='btn btn-primary guardar-edit'>Guardar</button></div></div></div></div>";

			echo '
				<tr>
                    <td class="check">
                    	<label class="col-auto custom-control custom-checkbox">
                            <input type="checkbox" id="promocion-'.$item["id"].'" data-id="'.$item["id"].'" class="custom-control-input checkbox-product" />
                            <span class="custom-control-indicator"></span>
                        </label></td>
                    <td>
                        <img class="product-image" src="'.$item["foto"].'">
                    </td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["categoria"].'</td>
                    <td>'.$item["precio"].'</td>
                    <td>'.$item["inventario"].'</td>
                    <td>true</td>
                    <td>
                        <a href="#edit-product-'.$item["id"].'" class="btn btn-icon" aria-label="Product details" data-toggle="modal">
                            <i class="icon icon-pencil s-5" data-toggle="tooltip" title="edición rápida"></i>
                        </a>
                        <a href="edit_'.$item["id"].'" class="btn btn-icon" data-toggle="tooltip" title="editar">
                            <i class="icon icon-pencil-circle s-6"></i>
                        </a>
                        <a href="#" class="btn btn-icon delete-button" 
                        	data-toggle="tooltip" title="papelera" id="product-'.$item["id"].'" data-pag="products">
                            <i class="icon icon-trash s-6"></i>
                        </a>
                        
                    </td>
                </tr>

                <script>
                	var container = document.getElementById("the-container");
					container.innerHTML += "'.$formulario.'";

			 	</script>
			';
		}

	}

	public static function verProductoOfertaController(){

		$resultado = gestorProductoModel::verProductoOfertaModel('productos');
		//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

		foreach ($resultado as $row => $item) {

				$formulario = "<div class='modal fade' id='edit-product-".$item["id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Editar Categoria</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button></div><div class='modal-body' id='div-edit'><form class='md-form' id='form-".$item["id"]."' name='editar-form'><div class='file-field'><div class='mb-4'><img style='width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;' src='".$item["foto"]."' class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'></div><div class='d-flex justify-content-center'><div class='btn btn-mdb-color btn-rounded float-left'><span>Añadir foto</span><input type='file' id='editar-photo' name='editar-photo'><input type='hidden' value='".$item["foto"]."' name='editarPhoto'></div></div></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Nombre:</label><input type='text' class='form-control' id='edit-name' name='editar-name' value='".$item["nombre"]."'/></div<div class='form-group'><br><label for='message-text' class='form-control-label'>Descripcion:</label><textarea class='form-control' id='edit-text' name='editar-text'>".$item["descripcion"]."</textarea><br><label for='message-text' class='form-control-label'>Categoria:</label><select class='form-control' name='editar-category' id='categories'><option value='".$item["categoria"]."'>".$item["categoria"]."</option></select><br><label for='recipient-name' class='form-control-label'>Etiquetas:</label><input type='text' class='form-control' id='edit-tags' name='editar-tags' value='".$item["etiquetas"]."'/></div<div class='form-group'><br><div class='form-group'><input type='text' name='editar-price' id='price' value='".$item["precio"]."' class='form-control' aria-label='Amount (to the nearest dollar)' /><label>Total</label></div><div class='form-group'><input type='text' name='editar-taxes' id='taxes' class='form-control' aria-label='Amount (to the nearest dollar)' value='".$item["impuesto"]."' /><label>Impuestos</label></div><div class='form-group'><input type='text' name='editar-code' id='code' class='form-control' aria-describedby='barcode' value='".$item["codigo"]."' /><label>Codigo</label></div><div class='form-group'><input name='editar-quantity' id='quantity' class='form-control' type='number' value='".$item["inventario"]."' aria-describedby='quantity' /><label for='example-number-input'>Cantidad</label></div></div><input type='hidden' value='".$item["id"]."' name='editar-id'></form></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button><button type='button' class='btn btn-primary guardar-edit'>Guardar</button></div></div></div></div>";

			echo '
				<tr>
                    <td>'.$item["id"].'</td>
                    <td>
                        <img class="product-image" src="'.$item["foto"].'">
                    </td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["categoria"].'</td>
                    <td>'.$item["precio"].'</td>
                    <td>'.$item["inventario"].'</td>
                    <td>true</td>
                    <td>
                        <a href="#edit-product-'.$item["id"].'" class="btn btn-icon" aria-label="Product details" data-toggle="modal">
                            <i class="icon icon-pencil s-5" data-toggle="tooltip" title="edición rápida"></i>
                        </a>
                        <a href="edit_'.$item["id"].'" class="btn btn-icon" data-toggle="tooltip" title="editar">
                            <i class="icon icon-pencil-circle s-6"></i>
                        </a>
                        <a href="#" class="btn btn-icon delete-button" 
                        	data-toggle="tooltip" title="papelera" id="product-'.$item["id"].'" data-pag="productsOfert">
                            <i class="icon icon-trash s-6"></i>
                        </a>
                    </td>
                </tr>

                <script>
                	var container = document.getElementById("the-container");
					container.innerHTML += "'.$formulario.'";

			 	</script>
			';
		}

	}
	public static function verProductoPapeleraController(){

		$resultado = gestorProductoModel::verProductoPapeleraModel('productos');
		//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

		foreach ($resultado as $row => $item) {			

			echo '
				<tr>
                    <td>'.$item["id"].'</td>
                    <td>
                        <img class="product-image" src="'.$item["foto"].'">
                    </td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["categoria"].'</td>
                    <td>'.$item["precio"].'</td>
                    <td>'.$item["inventario"].'</td>
                    <td>false</td>
                    <td>

                    	<a href="#" class="btn btn-icon restaurar" data-toggle="tooltip" title="restaurar" data-id="'.$item["id"].'">
                            <i class="icon icon-rotate-left s-6"></i>
                        </a>
                        
                        <a href="#" class="btn btn-icon borrar_permanete" data-toggle="tooltip" title="borrar permanete" data-id="'.$item["id"].'">
                            <i class="icon icon-trash s-6"></i>
                        </a>

                    </td>
                </tr>
             
			';
		}

	}
	public static function ver_num_productos(){

		$resp = gestorProductoModel::ver_num_productos();

		return $resp;
	}

	public static function ver_info_producto($id){

		$resp = gestorProductoModel::ver_info_producto($id);

		return $resp;
	}
	public static function set_primary(){

		$resultado = gestorProductoModel::set_primary();

		if ($resultado == "ok") {
			$arr["status"] = "ok";
			return $arr;
		}else{
			$arr["status"] = "error";
			return $arr;
		}
	}
	
	public static function ver_images_producto($id){

		$images = gestorProductoModel::ver_images_producto($id);


		for ($i=0; $i < count($images); $i++) { 


			if ($images[$i]["path_media"] != "") {
				if ($images[$i]["name_key"] == "image") {
					$tag = '<img src="'.$images[$i]["path_media"].'" class="handleImg" style="width: 100%;height: 150px;">';
					$btnc = '
						<span class="icon-check span-left set_primary" 
							accesskey="'.$images[$i]["id_media"].'"
							data-p="'.$id.'"
							data-toggle="tooltip" title="establecer como imagen principal"></span>
					';
				}else if ($images[$i]["name_key"] == "video") {
					$btnc = "";
					$tag = '
						
						<video width="100%" height="150" controls>
						  <source src="'.$images[$i]["path_media"].'" type="video/mp4">
						  
						</video>


					';
				}
				$btnBorrar = '
					<span class="icon-trash borrar_img_producto" 
						accesskey="'.$images[$i]["id_media"].'"
						data-p="'.$id.'"
						data-toggle="tooltip" title="borrar"></span>
				';
				
				echo '
					<li id="'.$images[$i]["id_media"].'" class="bloqueSlide">
						'.$btnc.'
	                    '.$btnBorrar.'
	                    '.$tag.'
	                </li>
				';
			}
			

				
		}
		
	}
	public static function add_files_product(){

		$id_producto = $_POST["id_p"];


		$srcs = gestorProductoController::procesar_files($_FILES["files_product"],$id_producto);

		$resp = gestorProductoModel::guardar_files_producto($srcs, false, $id_producto);

		
		$arr["status"] = "ok";

		return $arr;
		
		
	}

	
	public static function actualizarOrden(){

		$respuesta = gestorProductoModel::actualizarOrden();

		if ($respuesta == "ok") {
			$array["status"] = "ok";
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Ha ocurrido un error";
		}

		return $array;
	}

	public static function editarProductoController(){
		$ruta = "";

		if(isset($_FILES["editar-photo"]["tmp_name"])){

				$foto = $_FILES["editar-photo"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($foto)) {
					$ruta = "views/images/productos/producto".$aleatorio.".jpg";
					// $name_f=$name;
					move_uploaded_file($foto, "../../".$ruta);
				} else{
					$ruta=$_POST["editarPhoto"];
				}

				if($ruta == ""){

					$ruta = "views/images/productos/productoZ.png";	

				}

		}

		if($ruta == ""){

			$ruta = $_POST["editarPhoto"];
			
		}

		if ($_POST["editarPhoto"]!="views/images/productos/productoZ.png" && $ruta == "") {
			unlink($_POST["editarPhoto"]);
		}

		$datosController = array("nombre"=>$_POST["editar-name"],
								 "precio"=> $_POST["editar-price"],
								 "descripcion"=> $_POST["editar-text"],
								 "etiquetas"=> $_POST["editar-tags"],
								 "categoria"=> $_POST["editar-category"],
								 "impuesto"=> $_POST["editar-taxes"],
								 "codigo"=> $_POST["editar-code"],
								 "inventario"=> $_POST["editar-quantity"],
								 "id"=> $_POST["editar-id"],
								 "foto"=>$ruta);

		$resultado = gestorProductoModel::editarProductoModel($datosController, 'productos');

		if ($resultado == "ok") {
			return "ok";
		}else{
			echo "fallo en controlador";
		}
	}

	public static function eliminarProductoController(){

		if(isset($_POST["id"])){

			$datosController = $_POST["id"];

			$resultado = gestorProductoModel::eliminarProductoModel($_POST["id"], 'productos');

			if ($resultado == "ok") {
				return "ok";
			}else{
				echo "fallo en controlador";
			}
				
		}
	
	}
	public static function borrar_permanente(){


		$resultado = gestorProductoModel::borrar_permanente();

		if ($resultado == "ok") {
			$arr["status"] = "ok";

			return $arr;
		}else{
			echo "fallo en controlador";
		}
				
		
	
	}
	public static function restaurar_producto(){


		$resultado = gestorProductoModel::restaurar_producto();

		if ($resultado == "ok") {

			$arr["status"] = "ok";

			return $arr;
		}else{
			echo "fallo en controlador";
		}
				
	
	}
	
	public static function borrar_file(){
	

		$resultado = gestorProductoModel::borrar_file();

		if ($resultado == "ok") {
			$arr["status"] = "ok";
			return $arr;
		}else{
			$arr["status"] = "error";
			return $arr;
		}
				
			
	}
	public static function update_field(){
		$error = false;
		
		if ($_POST["value"] == "") {
			$error = "ingrese un valor";
		}

		// if ($_POST["key"] == "usuario" || $_POST["key"] == "contrasena") {
		// 	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["value"])) {
				
		// 	}else{
		// 		$error = "No se permiten caracteres especiales al usuario o contraseña";
		// 	}
		// }
						

		if (!$error) {
					
			$respuesta = gestorProductoModel::update_field();		

			if ($respuesta == "ok") {

				$arr["status"] = "ok";

				return $arr;
			}else{				
				return $respuesta;
			}		

		}else{
			$arr["status"] = "error";
			$arr["error"] = $error;

			return $arr;
		}
	}
		
}

?>