<?php

class gestorCategoriaController {

		public function ingresoCategoriaController(){

			$ruta = "";

			if(isset($_FILES["category-img"]["tmp_name"])){

					$foto = $_FILES["category-img"]["tmp_name"];

					$aleatorio = mt_rand(100, 999);

					if (is_uploaded_file($foto)) {
						$ruta = "views/images/productos/categoria".$aleatorio.".jpg";
						// $name_f=$name;
						move_uploaded_file($foto, "../../".$ruta);
					}

					if($ruta == ""){

						$ruta = "views/images/productos/productoZ.png";	

					}

			}

			if (isset($_POST["categories-parent"])) {
				$datosController = array("nombre"=>$_POST["category-name"],
									 "descripcion"=> $_POST["category-description"],
									 "padre"=> $_POST["categories-parent"],
									 "foto"=>$ruta);

			}else{
				$datosController = array("nombre"=>$_POST["category-name"],
									 "descripcion"=> $_POST["category-description"],
									 "foto"=>$ruta);
			}

			$resultado = gestorCategoriaModel::ingresoCategoriaModel($datosController, 'categorias');

			if ($resultado == "ok") {
				return "ok";
			}else{
				echo "fallo en controlador";
			}

		}

		public function verCategoriasController(){

			$resultado = gestorCategoriaModel::verCategoriaModel('categorias');
			$respuesta = gestorCategoriaModel::verCategoriaModel('categorias');

			foreach ($resultado as $row => $item) {

				if ($item["padre"]=="") {
					$padre = "Sin categoria padre";
				}else{$padre=$item["padre"];}

				$formulario = "<div class='modal fade' id='edit-".$item["id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Editar Categoria</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button></div><div class='modal-body' id='div-edit'><form class='md-form' id='form-".$item["id"]."' name='edit-form'><div class='file-field'><div class='mb-4'><img style='width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;' src='".$item["foto"]."' class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'></div><div class='d-flex justify-content-center'><div class='btn btn-mdb-color btn-rounded float-left'><span>Añadir foto</span><input type='file' id='edit-photo' name='edit-photo'><input type='hidden' value='".$item["foto"]."' name='editarFoto'></div></div></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Nombre:</label><input type='text' class='form-control' id='edit-name' name='edit-name' value='".$item["nombre"]."'/></div<div class='form-group'><br><div class='form-group'><label for='recipient-name' class='form-control-label'>Categoria Padre:</label><select class='form-control' name='editar-categoria' id='categories'><option value='".$padre."'>".$padre."</option>";

					foreach ($respuesta as $row => $value) {
						if ($padre==$value["nombre"]) {
							$formulario .= "";
						}else{
							$formulario .= "<option value='".$value["nombre"]."'>".$value["nombre"]."</option>";
						}
					}

					if ($item["padre"]!="") {
						$formulario .= "<option value='Sin categoria padre'>Sin categoria padre</option>";
					}else{
						$formulario .= "";
					}

					$formulario .= "</select><br><label for='message-text' class='form-control-label'>Descripcion:</label><textarea class='form-control' id='edit-text' name='edit-text'>".$item["descripcion"]."</textarea></div><input type='hidden' value='".$item["id"]."' name='edit-id'></form></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button><button type='button' class='btn btn-primary save-edit'>Guardar</button></div></div></div></div>";


				echo '<!-- CONTACT ITEM -->
						<tr class="card-list contact-item no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6" data-index="'.$item["id"].'" data-position="'.$item["posicion"].'">
                            <td>'.$item["id"].'</td>
                            <td>
                                <img class="avatar mx-4" alt="Abbott" src="'.$item["foto"].'" />
                            </td>
                            <td><div class="col text-truncate font-weight-bold">'.$item["nombre"].'</div></td>
                            <td>
                            	<div class="description col email text-truncate px-1 d-none d-xl-flex">
                                            '.substr($item["descripcion"], 0, 30).'
                                </div>
                            </td>
                            <td>
                            	<div class="col email text-truncate px-1 d-none d-xl-flex">
                                            '.$padre.'
                                </div>
                            </td>
                            <td>
                            	<div class="col-auto actions">

                                    <div class="row no-gutters" id="container-edit">

                                        <a name="delete" class="btn btn-icon">
                                            <i id="category-'.$item['id'].'" class="icon-trash borrar-button" id="category-'.$item['id'].'"></i>
                                        </a>

                                        <a href="#edit-'.$item["id"].'" class="editCategoria btn btn-icon" data-toggle="modal">
                                            <i class="icon icon-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <!-- CONTACT ITEM -->

                    <script class="script-tag">
						document.getElementById("el-container").innerHTML += "'.$formulario.'";
					 </script>';
			}

		}

		public function verCategoriasProductosController(){

			$resultado = gestorCategoriaModel::verCategoriaModel('categorias');

			foreach ($resultado as $row => $item) {

				echo '<option name="categories-parent" value="'.$item["nombre"].'">'.$item["nombre"].'</option>';
			}

		}

		public function verCategoriasEditProductosController(){

			$resultado = gestorCategoriaModel::verCategoriaModel('categorias');

			foreach ($resultado as $row => $item) {

				echo '<script>
						var modal = $(".modal.fade select");

						for (var i = 0; i < modal.length; i++) {
							console.log("hoa")
							modal[i].html("<option>hola</option>")
						}
					  </script>';

			}

		}

		public function editCategoriaController(){

			$ruta = "";

			if(isset($_FILES["edit-photo"]["tmp_name"])){

					$foto = $_FILES["edit-photo"]["tmp_name"];

					$aleatorio = mt_rand(100, 999);

					if (is_uploaded_file($foto)) {
						$ruta = "views/images/productos/categoria".$aleatorio.".jpg";
						// $name_f=$name;
						move_uploaded_file($foto, "../../".$ruta);
					} else{
						$ruta=$_POST["editarFoto"];
					}

					if($ruta == ""){

						$ruta = "views/images/productos/productoZ.png";	

					}
			}

			if($ruta == ""){

				$ruta = $_POST["editarFoto"];
				
			}

			if ($_POST["editarFoto"]!="views/images/productos/productoZ.png" && $ruta == "") {
				unlink($_POST["editarFoto"]);
			}

			$datosController = array("nombre"=>$_POST["edit-name"],
									 "descripcion"=> $_POST["edit-text"],
									 "id"=> $_POST["edit-id"],
									 "categoria"=> $_POST["editar-categoria"],
									 "foto"=>$ruta);

			$resultado = gestorCategoriaModel::editCategoriaModel($datosController, 'categorias');

			if ($resultado == "ok") {
				return "ok";
			}else{
				echo "fallo en controlador";
			}
		}

		public function cambiarPosicionCategoriaController(){
			
			if (isset($_POST["update"])) {

				foreach ($_POST["positions"] as $position) {
					$index = $position[0];
					$newPosition = $position[1];

					$datosController = array("index"=>$position[0],
									 "newPosition"=> $position[1]);

					$resultado = gestorCategoriaModel::cambiarPosicionCategoriaModel($datosController, 'categorias');
				}

				for ($i=0; $i < count($_POST["positions"]); $i++) { 

					//$arr[] = $i;

					if (count($_POST["positions"])==1) {
						$estado = "ok";
					}else{
						$estado = "vamos bien";
					}
					
				}

				return $estado;
			}
		}

		public function eliminarCategoriaController(){

			if(isset($_POST["eliminar"])){

				$datosController = $_POST["eliminar"];

				$resultado = gestorCategoriaModel::eliminarCategoriaModel($_POST["eliminar"], 'categorias');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
					
			}
		
		}
}

?>