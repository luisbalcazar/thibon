<?php 


class GestorSlideController{

	public function nuevaImagenSlide(){

		$imagen = $_FILES["imagen"];
		$array = [];

		if ($imagen["name"] != "" && $imagen["size"] != 0) {

			if ($imagen["type"] == "image/jpeg" || $imagen["type"] == "image/png") {
				$size = getimagesize($imagen["tmp_name"]);

				$array["img"] = $imagen;
				$array["size"] = $size;
				if ($size[0] >= 1024 && $size[1] >= 700) {
						
					$respuesta = GestorSlideModel::nuevaImagenSlide();

					if ($respuesta == "ok") {
						$array["status"] = "ok";

					}else{
						$array["status"] = "error";
						$array["mensaje"] = "Ha ocurrido un error al guardar en la base de datos";
					}

				}else{
					$array["status"] = "error";
					$array["mensaje"] = "esta imagen es muy pequeña, debe ser mínimo 1024 x 700";
				}

			}else{
				$array["img"] = $imagen;
				$array["status"] = "error";
				$array["mensaje"] = "El archivo debe ser una imagen jpg o png";
			}

				

			return $array;
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Seleccione un archivo";

			return $array;

		}
	}

	public function verImagenes(){

		$registros = GestorSlideModel::verImagenes();

		$contenido1 = "";
		$contenido2 = "";

		$modals = "";



		for($i = 0; $i < count($registros); $i++) {
			$item = $registros[$i];

			$id_item = $item["idimagen"];

			$texto = $item["text_imagen"];

			if (count($registros) > 1) {
				$btnBorrar = '<span class="icon icon-trash borrarImagenSlide" accesskey="'.$item["idimagen"].'" data-toggle="tooltip" title="borrar"></span>';
			}else{
				$btnBorrar = "";
			}

			$btn_act = '

				<span class="span-left" data-toggle="tooltip" title="actualizar imagen">
					<form id="formImg'.$item["idimagen"].'">
	                    <div class="">                          
	                        <div class="file-field">
	                            <div class="d-flex ">
	                                <div class="btn btn-mdb-color icon-attachment">
	                                    <span>up</span>
	                                    <input type="file" name="imagen" class="inputSlide" id="imgSlide'.$item["idimagen"].'" accesskey="'.$item["idimagen"].'">
	                                    
	                                </div>
	                            </div>
	                        </div>
	                        
	                    </div>
	                </form>
				</span>
				
			';

			$btn_text = "
				
				<span class='span_3 icon icon-pencil s5 actualizar_text_img' data-toggle='tooltip' title='actualizar texto' data-id='$id_item'>
					
				</span>

			";


			$modals .= "
				
				<div id='contenedor_editar_$id_item' class='contenedores_editar_texto' style='display: none;'>	
					<form enctype='multipart/form-data' method='post' action='slide'>
	                    <textarea name='texto_slide_imagen' class='mymce'  rows='15' placeholder='Enter text ...'>$texto</textarea>    
	                                
	                    <input type='text' name='id_imagen' hidden='' value='$id_item'> 
	                    <br>
	                    <button class='btn btn-primary' type='submit'>
		                    guardar
		                </button>                       
	                </form>
	                <br>

				</div>

			";


			$contenido2 = $contenido2 .'

				<li id="'.$item["idimagen"].'" class="bloqueSlide">
                    '.$btnBorrar.'
                    '.$btn_act.'
                    '.$btn_text.'
                    <img src="'.$item["imagen"].'" class="handleImg" style="width: 100%;height: 250px;">
                </li>
			';
		}


		$contenido1 = $contenido1 . '

			<div class="col-md-3">
				<button id="nuevaImagenSlide" class="btn btn-primary" data-toggle="tooltip" title="agregar imagen">
					<i class="icon icon-attachment"></i> 
				</button>
			</div>
				
			
		';

		echo '

			<div style="display:flex; flex-wrap:wrap; justify-content:space-between;">
				'.$contenido1.'
				
				<div class="col-md-12">
					<div id="barraActualizarImagenes" class="mb-3" style="position:relative;"></div>
					<div class="mensajeActualizarSlide"></div>
				</div>
				
			</div>
		';

		echo '

			<div id="imgSlide" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">
	            <ul id="columnasSlide">
	          		'.$contenido2.'      
	            </ul>

	            <button id="ordenarSlide" class="btn btn-warning" style="margin:10px 30px">Ordenar Slide</button>

	            <button id="guardarOrdenSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slide</button>

	        </div>
		';


		return $modals;

	}
	public function ver_texto_imagen(){

		$registros = GestorSlideModel::ver_texto_imagen();
		
		return $registros;
	}
	public function ver_config_slide(){

		$registros = GestorSlideModel::ver_config_slide();
		
		return $registros;
	}
	public function guardar_text_imagen(){

		$registros = GestorSlideModel::guardar_text_imagen();
		
		return $registros;
	}


	
	public function borrarImagen(){

		$respuesta = GestorSlideModel::borrarImagen();

		if ($respuesta == 'ok') {
			$array["status"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
		
	}
	public function actualizarImagen(){

		// $respuesta = GestorSlideModel::actualizarImagen();

		$imagen = $_FILES["imagen"];
		$array = [];

		if ($imagen["name"] != "" && $imagen["size"] != 0) {

			if ($imagen["type"] == "image/jpeg" || $imagen["type"] == "image/png") {
				$size = getimagesize($imagen["tmp_name"]);

				$array["img"] = $imagen;
				$array["size"] = $size;
				if ($size[0] >= 1024 && $size[1] >= 700) {
						
					$respuesta = GestorSlideModel::actualizarImagen();

					if ($respuesta == "ok") {
						$array["status"] = "ok";

					}else{
						$array["status"] = "error";
						$array["mensaje"] = "Ha ocurrido un error al guardar en la base de datos";
					}

				}else{
					$array["status"] = "error";
					$array["mensaje"] = "esta imagen es muy pequeña, debe ser mínimo 1024 x 700";
				}

			}else{
				$array["img"] = $imagen;
				$array["status"] = "error";
				$array["mensaje"] = "El archivo debe ser una imagen jpg o png";
			}

				

			return $array;
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Seleccione un archivo";

			return $array;

		}

	}

	public function actualizarOrden(){
		$respuesta = GestorSlideModel::actualizarOrden();

		if ($respuesta == "ok") {
			$array["status"] = "ok";
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Ha ocurrido un error";
		}

		return $array;
	}
	public function guardarTextoSlide(){
		$respuesta = GestorSlideModel::guardarTextoSlide();

		if ($respuesta == "ok") {
			$array["status"] = "ok";
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Ha ocurrido un error";
		}

		return $array;
	}
	
}