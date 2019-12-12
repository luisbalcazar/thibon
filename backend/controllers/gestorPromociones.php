<?php

class gestorPromocionesController {

	public function ingresoPromocionesController(){

		if (isset($_POST["datos"])){

			$ruta = "";

			if(isset($_POST["photo"])){

				$foto = $_POST["photo"];

				//$foto = $_FILES["photo"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($foto)) {
					$ruta = "views/images/promociones/promocion".$aleatorio.".jpg";
					// $name_f=$name;
					move_uploaded_file($foto, "../../".$ruta);
				} 

				if($ruta == ""){

					$ruta = "views/images/promociones/productoZ.png";	

				}
			}

			$datos = explode("-", $_POST["datos"]);
			$productos = "";
			$cantidades = "";

			for ($i=0; $i < count($datos); $i++) { 
				$producto = explode("#", $datos[$i]);

				if ($i == count($datos)-1) {
					$productos .= $producto[0];
					$cantidades .= $producto[1];
				}else{
					$productos .= $producto[0]."-";
					$cantidades .= $producto[1]."-";
				}
				
			}

			$datosController = array("id_p"=>$productos,
								"cantidades"=>$cantidades,
								"precio"=>$_POST["price"],
								"alias"=>$_POST["alias"],
								"descripcion"=>$_POST["descripcion"],
								"foto"=>$ruta);

			//var_dump($datosController);
			
			$resultado = gestorPromocionesModel::ingresoPromocionesModel($datosController, 'promociones');
			
			if ($resultado=="ok") {
				return "ok";
			}else{
				return "error";
			}		
	
		}else{
			echo "fallo en controlador";
		}

	}

	public static function verPromocionesoController(){

		$resultado = gestorPromocionesModel::verPromocionesModel('promociones');
		//$respuesta = gestorCategoriaController::verCategoriasEditProductosController();

		foreach ($resultado as $row => $item) {

			$formulario = "<div class='modal fade' id='edit-prom-".$item["id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Editar Categoria</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button></div><div class='modal-body' id='div-edit'><form class='md-form' id='form-".$item["id"]."' name='editar-prom-form'><div class='file-field'><div class='mb-4'><img style='width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;' src='".$item["foto"]."' class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'></div><div class='d-flex justify-content-center'><div class='btn btn-mdb-color btn-rounded float-left'><span>Añadir foto</span><input type='file' id='editar-prom-photo' name='editar-prom-photo'><input type='hidden' value='".$item["foto"]."' name='editarPhoto-prom'></div></div></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Nombre:</label><input type='text' class='form-control' id='edit-name' name='editar-prom-alias' value='".$item["alias"]."'/></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Descripcion:</label><textarea class='form-control' name='editar-prom-descripcion' id='editar-prom-descripcion' aria-describedby='product description' rows='5'  >".$item["descripcion"]."</textarea></div><div class='form-group'><br><div class='form-group'><br><div class='form-group'><input type='text' name='editar-prom-price' id='price' value='".$item["precio"]."' class='form-control' aria-label='Amount (to the nearest dollar)' /><label>Precio</label></div><div class='form-group'><input type='text' name='editar-prom-cantidad' id='taxes' class='form-control' aria-label='Amount (to the nearest dollar)' value='".$item["cantidad"]."' /><label>Cantidad</label></div></div><input type='hidden' value='".$item["id"]."' name='editar-prom-id'></form></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button><button type='button' class='btn btn-primary guardar-edit-prom'>Guardar</button></div></div></div></div>";

			echo '
				<tr>
                    <td>
                    	'.$item["id"].'
                    </td>
                    <td>
                        <img class="product-image" src="'.$item["foto"].'">
                    </td>
                    <td>'.$item["alias"].'</td>
                    <td>'.$item["id_productos"].'</td>
                    <td>'.$item["precio"].'</td>
                    <td>'.$item["cantidad"].'</td>
                    <td>true</td>
                    <td>
                        <a href="#edit-prom-'.$item["id"].'" class="btn btn-icon" aria-label="Product details" data-toggle="modal">
                            <i class="icon icon-pencil s-5" data-toggle="tooltip" title="edición rápida"></i>
                        </a>
                        <a href="#" class="btn btn-icon delete-button-prom" 
                        	data-toggle="tooltip" title="papelera" id="prom-'.$item["id"].'" data-pag="products">
                            <i class="icon icon-trash s-6"></i>
                        </a>
                        
                    </td>
                </tr>

                 <script>
                	var container = document.getElementById("the-container-prom");
					container.innerHTML += "'.$formulario.'";

			 	</script>';
		}

	}

    public static function verProductoDatoController(){

        if (isset($_POST["idPromo"])) {
            
            $resultado = gestorProductoModel::verProductoDatoModel('productos', $_POST["idPromo"]);

            return $resultado;

        }

    }

    public static function editarPromocionController(){
		$ruta = "";

		if(isset($_FILES["editar-prom-photo"]["tmp_name"])){

				$foto = $_FILES["editar-prom-photo"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($foto)) {
					$ruta = "views/images/promociones/promocion".$aleatorio.".jpg";
					// $name_f=$name;
					move_uploaded_file($foto, "../../".$ruta);
				} else{
					$ruta=$_POST["editarPhoto-prom"];
				}

				if($ruta == ""){

					$ruta = "views/images/promociones/productoZ.png";	

				}

		}

		if($ruta == ""){

			$ruta = $_POST["editarPhoto"];
			
		}

		if ($_POST["editarPhoto-prom"]!="views/images/promociones/productoZ.png" && $ruta == "") {
			unlink($_POST["editarPhoto-prom"]);
		}

		$datosController = array("alias"=>$_POST["editar-prom-alias"],
								 "precio"=> $_POST["editar-prom-price"],
								 "cantidad"=> $_POST["editar-prom-cantidad"],
								 "descripcion"=> $_POST["editar-prom-descripcion"],
								 "id"=> $_POST["editar-prom-id"],
								 "foto"=>$ruta);

		$resultado = gestorPromocionesModel::editarPromocionModel($datosController, 'promociones');

		if ($resultado == "ok") {
			return "ok";
		}else{
			echo "fallo en controlador";
		}
	}

	public static function eliminarPromocionController(){

		if(isset($_POST["id_promE"])){

			$datosController = $_POST["id_promE"];

			$resultado = gestorPromocionesModel::eliminarPromocionModel($_POST["id_promE"], 'promociones');

			if ($resultado == "ok") {
				return "ok";
			}else{
				echo "fallo en controlador";
			}
				
		}
	
	}

	public static function ver_num_promociones(){

		$resp = gestorPromocionesModel::ver_num_promociones();

		return $resp;
	}

    

}

?>