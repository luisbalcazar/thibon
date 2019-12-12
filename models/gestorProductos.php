<?php 

class GestorProductosModel{


	public static function ver_productos_destacados(){

		$consulta = new Consulta();

		$productos = $consulta->ver_registros("select * from productos where destacado = 'true'");
			

		return $productos;
	}
	public static function ver_productos_oferta(){

		$consulta = new Consulta();

		$productos = $consulta->ver_registros("select * from productos where oferta != '0.00'");
			

		return $productos;
	}
	public static function ver_productos_promocion(){

		$consulta = new Consulta();

		$promociones = $consulta->ver_registros("select * from promociones where estado = 'activado'");

		for ($i=0; $i < count($promociones); $i++) { 
			$promo = $promociones[$i];
			$ides = explode("-",$promo["id_productos"]);
			$unidades = explode("-",$promo["cantidad"]);
			$promo["productos"] = [];

			for ($j=0; $j < count($ides); $j++) { 

				$id_ = $ides[$j];
				$product = $consulta->ver_registros("select * from productos where id = '$id_'");

				$aux_product = $product[0];
				$aux_product["unidades_promo"] = $unidades[$j];

				array_push($promo["productos"],$aux_product);
			}

			$promociones[$i] = $promo;
			
		}
			

		return $promociones;
	}

	public static function ver_productos_categoria($categoria){

		$consulta = new Consulta();

		$productos = $consulta->ver_registros("select * from productos where categoria = '$categoria'");
		$info_categoria = $consulta->ver_registros("select * from categorias where nombre = '$categoria'");

		$arr["p"] = $productos;
		$arr["c"] = (isset($info_categoria[0])) ? $info_categoria[0] : [];
			
		return $arr;
	}


}