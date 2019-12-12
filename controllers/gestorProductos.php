<?php 


class GestorProductosController{

	public static function ver_productos_destacados(){

		$productos = GestorProductosModel::ver_productos_destacados();


		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];

			$id_item = $item["id"];		
			$nombre = $item["nombre"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$oferta = $item["oferta"];
			$imagen = $item["foto"];

			if (strlen($item["nombre"]) > 30) {
				$nombre = substr($item["nombre"],0,30) . "...";
			}else{
				$nombre = $item["nombre"];
			}
			if (strlen($item["descripcion"]) > 60) {
				$descripcion = substr($item["descripcion"],0,60) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			if ($oferta != "0.00") {
				$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
				$price = "";
				// <div class='overflow-hidden precio'>$ <span style='text-decoration: line-through;'>$precio</span></div>
				$label_oferta = "
					<div class='label_oferta'>
						<span>¡oferta!</span>
					</div>
				";
			}else{
				$offert = "";
				$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
				$label_oferta = "";
			}


			echo "
				<div class='item'>
	                <div class='image fit' style='position:relative;'>
	                	$label_oferta
	                    <img src='backend/$imagen' alt='producto' >
	                </div>
	                <div class='content'>
	                    <header class='align-center'>	                    
	                        <h4> <strong>$nombre</strong></h4>
	                    </header>
	                    <p>$descripcion</p>
	                    $price
	                    $offert
	                    <footer class='align-center'>
	                        <a href='#'  class='target-notice fa fa-shopping-cart add' data-id='419'></a>
	                        <a href='#' class='button alt'>Ver más</a>
	                    </footer>
	                </div>
	            </div>  

			";

			
		}

	}

	public static function ver_productos_oferta(){

		$productos = GestorProductosModel::ver_productos_oferta();


		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];

			$id_item = $item["id"];		
			$nombre = $item["nombre"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$oferta = $item["oferta"];
			$imagen = $item["foto"];

			if (strlen($item["nombre"]) > 30) {
				$nombre = substr($item["nombre"],0,30) . "...";
			}else{
				$nombre = $item["nombre"];
			}
			if (strlen($item["descripcion"]) > 60) {
				$descripcion = substr($item["descripcion"],0,60) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			if ($oferta != "0.00") {
				$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
				$price = "<div class='overflow-hidden precio' style='color: #000 !important;'>$ <span style='text-decoration: line-through;'>$precio</span></div>";			
				$label_oferta = "
					<div class='label_oferta'>
						<span>¡oferta!</span>
					</div>
				";
			}else{
				$offert = "";
				$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
				$label_oferta = "";
			}


			echo "
				<div class='item'>
	                <div class='image fit' style='position:relative;'>
	                	$label_oferta
	                  	<img src='backend/$imagen' alt='producto' />
	                </div>
	                <div class='content'>
	                  	<header class='align-center'>	                    
	                    	<h4> <strong> $nombre</strong></h4>
	                  	</header>
	                  	<p>$descripcion</p>
	                  	$price
	                  	$offert
	                  	<footer class='align-center'>
	                      	<a href='#' data-id='419'></a>
	                    	<a href='index.php?pagina=ver-producto' class='button alt'>Ver más</a>
	                  	</footer>
	                </div>
	            </div>

			";

			
		}

	}
	public static function ver_productos_promocion(){

		$promociones = GestorProductosModel::ver_productos_promocion();

		var_dump($promociones);

		// for($i = 0; $i < count($promociones); $i++) {
		// 	$item = $promociones[$i];

		// 	$id_item = $item["id"];		
		// 	$nombre = $item["alias"];
			
		// 	$precio = $item["precio"];
		// 	$oferta = $item["oferta"];
		// 	$imagen = $item["foto"];

		// 	if (strlen($item["nombre"]) > 30) {
		// 		$nombre = substr($item["nombre"],0,30) . "...";
		// 	}else{
		// 		$nombre = $item["nombre"];
		// 	}
		// 	if (strlen($item["descripcion"]) > 60) {
		// 		$descripcion = substr($item["descripcion"],0,60) . "...";
		// 	}else{
		// 		$descripcion = $item["descripcion"];
		// 	}


		// 	echo "
		// 		<div class='item'>
	 //                <div class='image fit' style='position:relative;'>
	 //                	$label_oferta
	 //                  	<img src='backend/$imagen' alt='producto' />
	 //                </div>
	 //                <div class='content'>
	 //                  	<header class='align-center'>	                    
	 //                    	<h4> <strong> $nombre</strong></h4>
	 //                  	</header>
	 //                  	<p>$descripcion</p>
	 //                  	$price
	 //                  	$offert
	 //                  	<footer class='align-center'>
	 //                      	<a href='#' data-id='419'></a>
	 //                    	<a href='index.php?pagina=ver-producto' class='button alt'>Ver más</a>
	 //                  	</footer>
	 //                </div>
	 //            </div>

		// 	";

			
		// }

	}

	public static function ver_productos_categoria($categoria){

		$array = GestorProductosModel::ver_productos_categoria($categoria);

		$productos = $array["p"];

		$str_productos = "";

		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];

			$id_item = $item["id"];		
			$nombre = $item["nombre"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$oferta = $item["oferta"];
			$imagen = $item["foto"];

			if (strlen($item["nombre"]) > 30) {
				$nombre = substr($item["nombre"],0,30) . "...";
			}else{
				$nombre = $item["nombre"];
			}
			if (strlen($item["descripcion"]) > 60) {
				$descripcion = substr($item["descripcion"],0,60) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			if ($oferta != "0.00") {
				$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
				$price = "";			
				$label_oferta = "
					<div class='label_oferta'>
						<span>¡oferta!</span>
					</div>
				";
			}else{
				$offert = "";
				$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
				$label_oferta = "";
			}


			$str_productos .= "
				<div class='item'>
	                <div class='image fit' style='position:relative;'>
	                	$label_oferta
	                  	<img src='backend/$imagen' alt='producto' />
	                </div>
	                <div class='content'>
	                  	<header class='align-center'>	                    
	                    	<h4> <strong> $nombre</strong></h4>
	                  	</header>
	                  	<p>$descripcion</p>
	                  	$price
	                  	$offert
	                  	<footer class='align-center'>
	                      	<a href='#' data-id='419'></a>
	                    	<a href='index.php?pagina=ver-producto' class='button alt'>Ver más</a>
	                  	</footer>
	                </div>
	            </div>

			";

			
		}

		$arr["productos"] = $str_productos;
		$arr["categoria"] = $array["c"];

		return $arr;

	}


	
}