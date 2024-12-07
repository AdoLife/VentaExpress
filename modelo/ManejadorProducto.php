<?php

require_once "OperacionDB.php";
require_once "Producto.php";

//Relaciones entre tablas
require_once "Categoria.php";


/*   Manejador de la clase atómica Producto   */

class ManejadorProducto {

public function ingresar(Producto $m) {
	$db = new OperacionDB();
	$query="INSERT INTO producto (nb_producto,ca_existencia,va_precio,nu_categoria,de_producto,nb_imagen) ".
	"VALUES (" . "'" . $m->getNb_producto() . "'" . 
	", " . "'" . $m->getCa_existencia() . "'" . 
	", " . "'" . $m->getVa_precio() . "'" . 
	", " . "'" . $m->getNu_categoria() . "'" . 
	", " . "'" . $m->getDe_producto() . "'" . 
	", " . "'" . $m->getNb_imagen() . "'" . 
	")";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}


public function modificar(Producto $m) {
	$db = new OperacionDB();
	$query="UPDATE producto SET nb_producto='" . $m->getNb_producto() . "'" . 
	", " . "ca_existencia='" . $m->getCa_existencia() . "'" . 
	", " . "va_precio='" . $m->getVa_precio() . "'" . 
	", " . "nu_categoria='" . $m->getNu_categoria() . "'" . 
	", " . "de_producto='" . $m->getDe_producto() . "'" . 
	", " . "nb_imagen='" . $m->getNb_imagen() . "'" . 
	" WHERE nu_producto='" . $m->getNu_producto() . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}


public function eliminar($nu_producto) {
	$db = new OperacionDB();
	$query="DELETE FROM producto WHERE nu_producto='" . $nu_producto . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	return $result;
}


public function buscar( $nu_producto ) {
	$producto = new Producto();
	$db = new OperacionDB();
	$query="SELECT nu_producto, nb_producto, de_producto, ca_existencia, va_precio, ".
	"nu_categoria, nb_categoria, nb_imagen FROM view_producto WHERE nu_producto='" . $nu_producto . "'";
//echo "query: " . $query;
	$result = $db->runSelect($query);
	
	if (count($result) > 0) {

		$x=0;

		//Uso del Modelo
		$categoria = new Categoria();

		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		$producto->setNu_producto($result[$x]["nu_producto"]);
		$producto->setNb_producto($result[$x]["nb_producto"]);
		$producto->setDe_producto($result[$x]["de_producto"]);
		$producto->setCa_existencia($result[$x]["ca_existencia"]);
		$producto->setVa_precio($result[$x]["va_precio"]);
		$producto->setNu_categoria($result[$x]["nu_categoria"]);
		$producto->setNb_imagen($result[$x]["nb_imagen"]);
		
		$producto->setCategoria($categoria);

	}

	return $producto;

}


public function listar($condicion='1=1') {
	$arreglo = array();
	$db = new OperacionDB();
	$query="SELECT nu_producto, nb_producto, de_producto, ca_existencia, va_precio, ".
	"nu_categoria, nb_categoria, nb_imagen FROM view_producto WHERE $condicion";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		//Uso del Modelo
		$categoria = new Categoria();

		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);


		$producto = new Producto();

		$producto->setNu_producto($result[$x]["nu_producto"]);
		$producto->setNb_producto($result[$x]["nb_producto"]);
		$producto->setDe_producto($result[$x]["de_producto"]);
		$producto->setCa_existencia($result[$x]["ca_existencia"]);
		$producto->setVa_precio($result[$x]["va_precio"]);
		$producto->setNu_categoria($result[$x]["nu_categoria"]);
		$producto->setNb_imagen($result[$x]["nb_imagen"]);

		$producto->setCategoria($categoria);

		array_push($arreglo, $producto);

	}

	return $arreglo;

}


} // Fin class ManejadorProducto

?>