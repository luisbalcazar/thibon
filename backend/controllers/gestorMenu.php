<?php

class gestorMenuController {

		public function ingresoMenuController(){

			if (isset($_POST["menu-name"])) {

				if (isset($_POST["menu-tag"])) {

						$tag = strtolower($_POST["menu-tag"]);
						if (strpos($tag, " ")){
							$etiqueta = str_replace (" " , "-" , $tag);
						}else{
							$etiqueta = $tag;
						}
				}	

				if (isset($_POST["menu-checkbox"]) && !isset($_POST["categories-parent"])) {

					$checkbox = "padre";
				}elseif (!isset($_POST["menu-checkbox"]) && !isset($_POST["categories-parent"])) {
					$checkbox = "normal";
				}else{
					
					if ($_POST["categories-parent"]!="Sin menu padre") {
						$checkbox = "padre/hijo";
					}else{
						$checkbox = "padre";
					}

				}



				if (isset($_POST["categories-parent"]) && !isset($_POST["menu-checkbox"])) {

					$categoria = $_POST["categories-parent"];

					if ($categoria!="Sin menu padre") {
						$checkbox = "hijo";
					}else{
						$checkbox = "normal";
					}

				}elseif (!isset($_POST["categories-parent"])) {
					$categoria = "Sin menu padre";
				}else{
					$categoria = $_POST["categories-parent"];
				}
			
				$datosController = array("nombre"=>$_POST["menu-name"],
										 "etiqueta"=> $etiqueta,
										 "categoria"=> $categoria,
										 "url"=>$_POST["menu-url"],
										 "estado"=>$checkbox);

				//var_dump($datosController);

				$resultado = gestorMenuModel::ingresoMenuModel($datosController, 'menu');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
			}

		}

		public function verMenusController(){

			$resultado = gestorMenuModel::verMenuModel('menu');
			$respuesta = gestorMenuModel::verMenuModel('menu');

			foreach ($resultado as $row => $item) {

				if ($item["padre"]=="" || $item["padre"]=="no") {
					$padre = "Sin menu padre";
				}else{$padre=$item["padre"];}

				$formulario = "<div class='modal fade' id='edit-".$item["id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Editar Categoria</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button></div><div class='modal-body' id='div-edit-menu'><form class='md-form' id='menuForm-".$item["id"]."' name='edit-form'><div class='file-field'><div class='form-group'><label for='recipient-name' class='form-control-label'>Nombre:</label><input type='text' class='form-control'  name='edit-name-menu' value='".$item["nombre"]."'/></div><div class='form-group'><label for='recipient-name' class='form-control-label'>Etiqueta:</label><input type='text' class='form-control'  name='edit-tag-menu' value='".$item["etiqueta"]."'/></div><div class='form-group'><label for='recipient-name' class='form-control-label'>URL:</label><input type='text' class='form-control' name='edit-url-menu' value='".$item["url"]."'/></div>";

					if ($item["estado"]=="normal" || $item["padre"]=="Sin menu padre") {
						
						$formulario .="<div class='form-group'><div class='form-group'><label for='recipient-name' class='form-control-label'>Menu Padre:</label><select class='form-control' name='editar-menu' id='categories'><option value='".$padre."'>".$padre."</option>";

						foreach ($respuesta as $row => $value) {
							if ($padre==$value["nombre"]) {
								$formulario .= "";
							}elseif($item["nombre"]==$value["nombre"]){
								$formulario .= "";
							}else{
								$formulario .= "<option value='".$value["nombre"]."'>".$value["nombre"]."</option>";
							}
						}

						if ($item["padre"]!="Sin menu padre") {
							$formulario .= "<option value='Sin menu padre'>Sin menu padre</option>";
						}else{
							$formulario .= "";
						}

						$formulario .= "</select><br></div>";
					}

					$formulario .= "<input type='hidden' value='".$item["id"]."' name='edit-id-menu'></form></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button><button type='button' class='btn btn-primary save-edit-menu'>Guardar</button></div></div></div></div>";

				echo '<!-- CONTACT ITEM -->
						<tr class="card-list contact-item no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6" data-index="'.$item["id"].'" data-position="'.$item["posicion"].'">

                            <td><div class="col text-truncate font-weight-bold">'.$item["nombre"].'</div></td>
                            <td>
                            	<div class="description col email text-truncate px-1 d-none d-xl-flex">
                                            '.$item["url"].'
                                </div>
                            </td>
                            <td>
                            	<div class="description col email text-truncate px-1 d-none d-xl-flex">
                                            '.$item["etiqueta"].'
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
                                            <i id="menu-'.$item['id'].'" class="icon-trash borrar-button-menu" ></i>
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

		public function editMenuController(){

			if (isset($_POST["edit-name-menu"])) {		

				if (isset($_POST["edit-tag-menu"])) {

						$tag = strtolower($_POST["edit-tag-menu"]);
						if (strpos($tag, " ")){
							$etiqueta = str_replace (" " , "-" , $tag);
						}else{
							$etiqueta = $tag;
						}
				}

				if (isset($_POST["editar-menu"])) {

						$menuP = $_POST["editar-menu"];

						$datosController = array("nombre"=>$_POST["edit-name-menu"],
										 "etiqueta"=> $etiqueta,
										 "id"=> $_POST["edit-id-menu"],
										 "menuP"=> $menuP,
										 "url"=> $_POST["edit-url-menu"]);
				}else{

					$datosController = array("nombre"=>$_POST["edit-name-menu"],
										 "etiqueta"=> $etiqueta,
										 "id"=> $_POST["edit-id-menu"],
										 "url"=> $_POST["edit-url-menu"]);

				}

				//var_dump($datosController);

				$resultado = gestorMenuModel::editMenuModel($datosController, 'menu');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
			}
		}

		public function cambiarPosicionMenuController(){
			
			if (isset($_POST["actualizar"])) {

				$respuesta = gestorMenuModel::verMenuModel('menu');

				$arr = [];

				foreach ($_POST["positions"] as $position) {
					$index = $position[0];
					$newPosition = $position[1];

					$datosController = array("index"=>$position[0],
									 "newPosition"=> $position[1]);

					$resultado = gestorMenuModel::cambiarPosicionMenuModel($datosController, 'menu');
				}

				for ($i=0; $i < count($_POST["positions"]); $i++) { 

					$arr[] = $i;

					if (count($_POST["positions"])==1) {
						$estado = "ok";
					}else{
						$estado = "vamos bien";
					}
					
				}

				// var_dump($arr);

				// $actualizados = intval($_POST["actualizados"]);

				return $estado;

			}
		}

		public function verMenuListaController(){

			$resultado = gestorMenuModel::verMenuModel('menu');

			foreach ($resultado as $row => $item) {

				echo '<option name="categories-parent" value="'.$item["nombre"].'">'.$item["nombre"].'</option>';
			}

		}

		public function eliminarMenuController(){

			if(isset($_POST["eliminarMenu"])){

				$datosController = $_POST["eliminarMenu"];

				$resultado = gestorMenuModel::eliminarMenuModel($_POST["eliminarMenu"], 'menu');

				if ($resultado == "ok") {
					return "ok";
				}else{
					echo "fallo en controlador";
				}
					
			}
		
		}
}

?>