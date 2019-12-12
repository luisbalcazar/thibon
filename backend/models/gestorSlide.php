<?php 

class GestorSlideModel{

	public function nuevaImagenSlide(){
		$consulta = new Consulta();

		$imagen = $_FILES["imagen"];
		$name = $imagen["name"];
		$ex = ($imagen["type"] == "image/jpeg") ? ".jpg" : ".png";
		

		$imagenes = $consulta -> ver_registros("select * from slide order by idimagen desc");
		$orden = $consulta -> ver_registros("select * from slide order by orden desc");

		if (count($imagenes) != 0) {
			$idimagen = $imagenes[0]["idimagen"] + 1;
			$orden = $orden[0]["orden"] + 1;
		}else{
			$idimagen = 1;
			$orden = 1;
		}
			
		$ruta = "views/images/slide/imagenSlide$idimagen$ex";

		move_uploaded_file($imagen["tmp_name"], "../../$ruta");

		$consulta ->nuevo_registro("insert into slide (imagen,orden) values ('$ruta','$orden')");

		return "ok";
	}

	public function verImagenes(){
		$consulta = new Consulta();

		$registros = $consulta->ver_registros("select * from slide order by orden");

		return $registros;
	}

	public function ver_texto_imagen(){
		$consulta = new Consulta();

		$id = $_POST["id_imagen"];

		$registros = $consulta->ver_registros("select * from slide where idimagen = '$id'");

		return $registros;
	}

	public function ver_config_slide(){
		$consulta = new Consulta();


		$speed = $consulta->ver_registros("select * from config where config_name = 'speed_slider'");
		$effect = $consulta->ver_registros("select * from config where config_name = 'effect_slider'");
		$auto = $consulta->ver_registros("select * from config where config_name = 'auto_slider'");
		$effect_t_slider = $consulta->ver_registros("select * from config where config_name = 'effect_text_slider'");
		
		$arr["speed"] = $speed[0];
		$arr["effect"] = $effect[0];
		$arr["auto"] = $auto[0];
		$arr["effect_t_slider"] = $effect_t_slider[0];		

		return $arr;
	}

	public function guardar_text_imagen(){

		$consulta = new Consulta();

		$id = $_POST["id_imagen"];
		$texto = htmlspecialchars($_POST["texto_slide_imagen"], ENT_QUOTES);
	
		$consulta -> actualizar_registro("update slide set text_imagen = '$texto' where idimagen = '$id'");

		$arr["status"] = "ok";

		return $arr;


	}

	public function borrarImagen(){
		$consulta = new Consulta();

		$idimagen = $_POST["idimagen"];

		$img = $consulta ->ver_registros("select imagen from slide where idimagen = '$idimagen'");

		if (file_exists("../../".$img[0]["imagen"])) {
			unlink("../../".$img[0]["imagen"]);
		}

		$consulta -> borrar_registro("delete from slide where idimagen = '$idimagen'");

		return 'ok';
	}

	public function actualizarImagen(){

		$consulta = new Consulta();

		$idimagen = $_POST["idimagen"];
		$imagen = $_FILES["imagen"];
		$name = $imagen["name"];
		$ex = ($imagen["type"] == "image/jpeg") ? ".jpg" : ".png";

		$oldImg = $consulta->ver_registros("select * from slide where idimagen = '$idimagen'");

		// echo "../servicios/" . $oldImg[0]["imagen"];

		if (file_exists("../../".$oldImg[0]["imagen"])) {
			unlink("../../".$oldImg[0]["imagen"]);
		}

		$ruta = "views/images/slide/imagenSlide$idimagen$ex";

		move_uploaded_file($imagen["tmp_name"], "../../$ruta");

		$consulta ->actualizar_registro("update slide set imagen = '$ruta' where idimagen = '$idimagen'");

		return "ok";

	}

	public function actualizarOrden(){

		$consulta = new Consulta();

		$nuevoOrden = $_POST["nuevoOrden"];
		$contador = 1;
		for ($i=0; $i < count($nuevoOrden); $i++) { 
			$id = $nuevoOrden[$i]; 

			$consulta -> actualizar_registro("update slide set orden = '$contador' where idimagen = '$id'");

			$contador++;
		}

		return 'ok';


	}
	public function guardarTextoSlide(){

		$consulta = new Consulta();

		$titulo = $_POST["titulo"];
		$subtitulo = $_POST["subtitulo"];
		$palabras = $_POST["palabras"];
		
		$consulta -> actualizar_registro("update textoslide set titulo = '$titulo',subtitulo = '$subtitulo',palabras = '$palabras'");
		return 'ok';


	}

}