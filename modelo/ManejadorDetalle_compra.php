<?php

require_once "OperacionDB.php";
require_once "Detalle_compra.php";

//Relaciones entre tablas
require_once "Compra.php";
require_once "Cliente.php";
require_once "Producto.php";
require_once "Categoria.php";


/*   Manejador de la clase atómica Detalle_compra   */

class ManejadorDetalle_compra {


public function despachar($nu_compra, $in_despacho){

	if($in_despacho == 'D')
		$sql = "update compra set in_despacho = '$in_despacho', fe_despacho = now() " .
			" where nu_compra = $nu_compra";
	else
		$sql = "update compra set in_despacho = '$in_despacho' where nu_compra = $nu_compra";

	$db = new OperacionDB();

	return $db->runQuery($sql);
	
}


public function insertar (Detalle_compra $m) {

	$db = new OperacionDB();
	$query = "INSERT INTO detalle_compra (nu_compra, nu_producto, ca_producto, fe_registro) VALUES (" . 
		"'" . $m->getNu_compra() . "'" . 
		", " . "'" . $m->getNu_producto() . "'" . 
		", " . "'" . $m->getCa_producto() . "'" . 
		", now()" . 
		")";

//echo "query: " . $query;

	$result = $db->runQuery($query);
	if($result){

		// actualizar el inventario de productos
		$nu_producto = $m->getNu_producto();
		$ca_producto = $m->getCa_producto();
		$sql = "update producto set ca_existencia = ca_existencia - $ca_producto " .
			"where nu_producto = $nu_producto";
		$bd = new OperacionDB();
		$bd->runQuery($sql);

		// sacar el producto del carrito
		$sql = "delete from carrito where nu_producto = $nu_producto and nu_cliente = " . $_SESSION['nu_cliente'];
		$bd->runQuery($sql);

	}
	
	return $result;

}

/*
public function buscarDetalle_compra ( $nu_detalle ) {
	$detalle_compra = new Detalle_compra();
	$db = new OperacionDB();
	$query="SELECT nu_detalle, ca_producto, fe_registro, " .
	"nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
	"nb_cliente, co_correo, co_clave, nu_cedula, " .
	"nu_producto, nb_producto, de_producto, ca_existencia, va_precio, nu_categoria, nb_categoria " .
	"FROM view_detalle_compra WHERE 1=1 AND nu_detalle='" . $nu_detalle . "'";
//echo "query: " . $query;
	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;

		//Uso del Modelo
		$cliente = new Cliente();
		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);


		$compra = new Compra();
		$compra->setNu_compra($result[$x]["nu_compra"]);
		$compra->setNu_cliente($result[$x]["nu_cliente"]);
		$compra->setFe_compra($result[$x]["fe_compra"]);
		$compra->setIn_despacho($result[$x]["in_despacho"]);
		$compra->setFe_despacho($result[$x]["fe_despacho"]);

		$compra->setCliente($cliente);

		
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

		
		$detalle_compra->setNu_detalle($result[$x]["nu_detalle"]);
		$detalle_compra->setNu_compra($result[$x]["nu_compra"]);
		$detalle_compra->setNu_producto($result[$x]["nu_producto"]);
		$detalle_compra->setCa_producto($result[$x]["ca_producto"]);
		$detalle_compra->setFe_registro($result[$x]["fe_registro"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setProducto($producto);

	}

	return $detalle_compra;

}
*/

public function listar($condicion='1=1', $orden="nu_detalle") {

	$arreglo = array();
	$db = new OperacionDB();
	$query = "SELECT nu_detalle, ca_producto, fe_registro, " .
		"nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
		"nb_cliente, co_correo, co_clave, nu_cedula, " .
		"nu_producto, nb_producto, de_producto, ca_existencia, va_precio, nu_categoria, nb_categoria, nb_imagen " .
		"FROM view_detalle_compra WHERE $condicion ORDER BY $orden";
		
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


		$compra = new Compra();
		$compra->setNu_compra($result[$x]["nu_compra"]);
		$compra->setNu_cliente($result[$x]["nu_cliente"]);
		$compra->setFe_compra($result[$x]["fe_compra"]);
		$compra->setIn_despacho($result[$x]["in_despacho"]);
		$compra->setFe_despacho($result[$x]["fe_despacho"]);

		$compra->setCliente($cliente);

		
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

	
		$detalle_compra = new Detalle_compra();

		$detalle_compra->setNu_detalle($result[$x]["nu_detalle"]);
		$detalle_compra->setNu_compra($result[$x]["nu_compra"]);
		$detalle_compra->setNu_producto($result[$x]["nu_producto"]);
		$detalle_compra->setCa_producto($result[$x]["ca_producto"]);
		$detalle_compra->setFe_registro($result[$x]["fe_registro"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setProducto($producto);


		array_push($arreglo,$detalle_compra);

	}

	return $arreglo;

}


} // Fin class ManejadorDetalle_compra

?>