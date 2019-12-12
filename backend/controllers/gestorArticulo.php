<?php

class gestorArticulosController {

		public function ingresoArticulosController(){

			$ruta = "";

			if (isset($_POST["article-title"])){

				if(isset($_FILES["article-foto"]["tmp_name"])){

					$foto = $_FILES["article-foto"]["tmp_name"];

					$aleatorio = mt_rand(100, 999);

					if (is_uploaded_file($foto)) {
						$ruta = "views/images/articulos/articulo".$aleatorio.".png";
						// $name_f=$name;
						move_uploaded_file($foto, "../../".$ruta);
					}

					if($ruta == ""){

						$ruta = "views/images/articulos/productoZ.png";	

					}
				}

				if($ruta == ""){

					$ruta = "views/images/productos/productoZ.png";	
				}

				$datosController = array("titulo"=>$_POST["article-title"],
									"extracto"=>$_POST["article-extract"],
									"categoria"=>$_POST["categories-article"],
									"etiquetas"=>$_POST["article-tags"],
									"foto"=>$ruta,
									"contenido"=>$_POST["cuerpo"],
									"fecha"=> $_POST["article-date"],
									"alias"=>$_POST["article-alias"],
									"subtitulo"=>$_POST["article-subtitle"]);

				//$resultado = new IngresoProductoModel();

				//var_dump($datosController);
				
				$resultado = gestorArticulosModel::ingresoArticulosModel($datosController, 'articulos');
				
				if ($resultado == "ok") {
					return "ok";
				} elseif ($resultado == "error") {
					echo "Error al almacenar los datos.";
				} else{
					echo "Error inesperado!";
				}
		
			}else{
				echo "fallo en controlador";
			}

		}

		public function verArticulosController(){

			$resultado = gestorArticulosModel::verArticulosModel('articulos');
			//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

			if ($resultado=="" || $resultado=="null" || $resultado==false) {
				
				echo '<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">Sin articulos</td></tr>';
			}else{
				foreach ($resultado as $row => $item) {
					if ($item["estado"]=="activado") {
						$estado = "true";
					}else{
						$estado = "false";
					}

					echo '<tr>
	                            <td>'.$item["id"].'</td>
	                            <td>
	                                <img class="product-image" src="'.$item["foto"].'">
	                            </td>
	                            <td>'.$item["titulo"].'</td>
	                            <td>'.$item["categoria"].'</td>
	                            <td>'.$item["fecha"].'</td>
	                            <td>'.$item["subtitulo"].'</td>
	                            <td>'.$item["estado"].'</td>
	                            <td>
	                                <a href="editarArticulo_'.$item["id"].'" class="btn btn-icon">
	                                    <i class="icon icon-pencil s-4"></i>
	                                </a>
	                                <a href="#" class="btn btn-icon" 
			                        	data-toggle="tooltip" title="papelera" data-pag="products">
			                            <i class="icon icon-trash s-6 delete-prom" id="'.$item["id"].'"></i>
			                        </a>
	                            </td>
	                        </tr>';
				}
			}

		}

		public function verArticulosPapeleraController(){

			$resultado = gestorArticulosModel::verArticulosPapeleraModel('articulos');
			//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

			if ($resultado=="" || $resultado=="null" || $resultado==false) {
				
				echo '<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">Sin articulos desactivados</td></tr>';
			}else{
				foreach ($resultado as $row => $item) {
					if ($item["estado"]=="activado") {
						$estado = "true";
					}else{
						$estado = "false";
					}

					echo '<tr>
	                            <td>'.$item["id"].'</td>
	                            <td>
	                                <img class="product-image" src="'.$item["foto"].'">
	                            </td>
	                            <td>'.$item["titulo"].'</td>
	                            <td>'.$item["categoria"].'</td>
	                            <td>'.$item["fecha"].'</td>
	                            <td>'.$item["subtitulo"].'</td>
	                            <td>'.$item["estado"].'</td>
	                            <td>
	                            	<a href="#" class="btn btn-icon" data-toggle="tooltip" title="restaurar" data-id="'.$item["id"].'">
			                            <i class="icon icon-rotate-left s-6 restaurar-prom" id="'.$item["id"].'"></i>
			                        </a>
	                                <a href="#" class="btn btn-icon" data-toggle="tooltip" title="papelera" data-pag="products">
	                                    <i class="icon icon-trash s-6 realDelete-prom" id="'.$item["id"].'"></i>
	                                </a>
	                            </td>
	                        </tr>';
				}
			}
		}

		public function verEditArticulosController(){

			if (isset($_GET["id"])) {
				
				$resultado = gestorArticulosModel::verEditArticulosModel('articulos', $_GET["id"]);

				if ($resultado) {
					return $resultado;
				}else{
					var_dump($_GET["id"]);
				}
			}

		}

		public function editarArticulosController(){
			$ruta = "";

			if(isset($_FILES["article-foto"]["tmp_name"])){

					$foto = $_FILES["article-foto"]["tmp_name"];

					$aleatorio = mt_rand(100, 999);

					if (is_uploaded_file($foto)) {
						$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";
						// $name_f=$name;
						move_uploaded_file($foto, "../../".$ruta);
					} else{
						$ruta=$_POST["editarPhoto"];
					}

					if($ruta == ""){

						$ruta = "views/images/articulos/productoZ.png";	

					}

			}

			if($ruta == ""){

				$ruta = $_POST["editarPhoto"];
				
			}

			if ($_POST["editarPhoto"]!="views/images/productos/productoZ.png" && $ruta == "") {
				unlink($_POST["editarPhoto"]);
			}

			$datosController = array("titulo"=>$_POST["article-title"],
									"extracto"=>$_POST["article-extract"],
									"categoria"=>$_POST["categories-article"],
									"etiquetas"=>$_POST["article-tags"],
									"foto"=>$ruta,
									"id"=>$_POST["id_edit"],
									"contenido"=>$_POST["cuerpo"],
									"fecha"=> $_POST["article-date"],
									"alias"=>$_POST["article-alias"],
									"subtitulo"=>$_POST["article-subtitle"]);

			$resultado = gestorArticulosModel::editarArticulosModel($datosController, 'articulos');

			if ($resultado == "ok") {
				return "ok";
			}else{
				echo "fallo en controlador";
			}
		}

		public function eliminarArticulosController(){

			if(isset($_POST["eliminarArticulo"])){

				$datosController = $_POST["eliminarArticulo"];

				$resultado = gestorArticulosModel::eliminarArticulosModel($_POST["eliminarArticulo"], 'articulos');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
					
			}
		}

		public function eliminarArticulosPermanenteController(){

			if(isset($_POST["eliminarRealArticulo"])){

				$datosController = $_POST["eliminarRealArticulo"];

				$resultado = gestorArticulosModel::eliminarArticulosPermanenteModel($_POST["eliminarRealArticulo"], 'articulos');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
					
			}
		}

		public function restaurarArticulosController(){

			if(isset($_POST["restaurarArticulo"])){

				$datosController = $_POST["restaurarArticulo"];

				$resultado = gestorArticulosModel::restaurarArticulosModel($_POST["restaurarArticulo"], 'articulos');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
					
			}
		}
}

?>