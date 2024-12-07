<?php

require_once "OperacionDB.php";
require_once "Carrito.php";

//Relaciones entre tablas
require_once "Cliente.php";
require_once "Producto.php";
require_once "Categoria.php";


/*   Manejador de la clase atómica Carrito   */

class ManejadorCarrito {

public function ingresar (Carrito $m) {
	$db = new OperacionDB();
	$query="INSERT INTO carrito (nu_cliente, nu_producto) VALUES (" . 
		"'" . $m->getNu_cliente() . "', " . 
		"'" . $m->getNu_producto() . "'" . 
	")";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}


public function eliminar ($nu_cliente, $nu_producto) {
	$db = new OperacionDB();
	$query="DELETE FROM carrito WHERE nu_cliente='" . $nu_cliente . "'" . 
	" AND nu_producto='" . $nu_producto . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}

/*
public function buscarCarrito ( $nu_cliente, $nu_producto ) {
	$carrito = new Carrito();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula, " .
	"nu_producto, nb_producto, de_producto, ca_existencia, va_precio, nb_imagen, " .
	"nu_categoria, nb_categoria, fe_registro FROM view_carrito " .
	"WHERE nu_cliente='" . $nu_cliente . "'" . " AND nu_producto='" . $nu_producto . "'";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	if (count($result)) {

		$x=0;

		//Uso del Modelo
		$cliente = new Cliente();

		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

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


		$x=0;
		$carrito->setNu_cliente($result[$x]["nu_cliente"]);
		$carrito->setNu_producto($result[$x]["nu_producto"]);
		$carrito->setFe_registro($result[$x]["fe_registro"]);

		$carrito->setCliente($cliente);
		$carrito->setProducto($producto);


	}

	return $carrito;

}
*/

public function listar($condicion='1=1') {
	$arreglo = array();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula, " .
	"nu_producto, nb_producto, de_producto, ca_existencia, va_precio, nb_imagen, " .
	"nu_categoria, nb_categoria, fe_registro FROM view_carrito " .
	"WHERE $condicion";

//echo "query: " . $query;

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		//Uso del Modelo
		$cliente = new Cliente();

		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

		$categoria = new Categoria();

		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		$producto = new Producto();

		$producto->setNu_producto($result[$x]["nu_producto"]);
		$producto->setNb_producto($result[$x]["nb_producto"]);
		$producto->setCa_existencia($result[$x]["ca_existencia"]);
		$producto->setVa_precio($result[$x]["va_precio"]);
		$producto->setNu_categoria($result[$x]["nu_categoria"]);
		$producto->setDe_producto($result[$x]["de_producto"]);
		$producto->setNb_imagen($result[$x]["nb_imagen"]);

		$producto->setCategoria($categoria);


		$carrito = new Carrito();

		$carrito->setNu_cliente($result[$x]["nu_cliente"]);
		$carrito->setNu_producto($result[$x]["nu_producto"]);
		$carrito->setFe_registro($result[$x]["fe_registro"]);

		$carrito->setCliente($cliente);
		$carrito->setProducto($producto);

		array_push($arreglo, $carrito);

	}

	return $arreglo;

}


} // Fin class ManejadorCarrito

?>
