<?php

require_once "OperacionDB.php";
require_once "Compra.php";

//Relaciones entre tablas
require_once "Cliente.php";


/*   Manejador de la clase atómica Compra   */

class ManejadorCompra {

public function insertar (Compra $m) {

	$db = new OperacionDB();
	$query = "INSERT INTO compra (nu_cliente, fe_compra, in_despacho, fe_despacho) VALUES (" . 
		"'" . $m->getNu_cliente() . "'" . 
		", now()" . 
		", " . "'" . $m->getIn_despacho() . "'" . 
		", null" . 
		")";

//echo "query: " . $query;

	$result = $db->runQuery($query);

	return $result;

}


public function modificar (Compra $m) {

	$db = new OperacionDB();
	$query = "UPDATE compra SET nu_cliente='" . $m->getNu_cliente() . "'" . 
		//", " . "fe_compra='" . $m->getFe_compra() . "'" . 
		", " . "in_despacho='" . $m->getIn_despacho() . "'" . 
		", " . "fe_despacho='" . $m->getFe_despacho() . "'" . 
		" WHERE 1=1 AND nu_compra='" . $m->getNu_compra() . "'";

//echo "query: " . $query;

	$result = $db->runQuery($query);

	return $result;

}

/*
public function eliminarCompra ($nu_compra) {
	$db = new OperacionDB();
	$query="DELETE FROM compra WHERE 1=1 AND nu_compra='" . $nu_compra . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);

	return $result;

}


public function buscarCompra ( $nu_compra ) {
	$compra = new Compra();
	$db = new OperacionDB();
	$query="SELECT nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
	"nb_cliente, co_correo, co_clave, nu_cedula " .
	"FROM view_compra WHERE nu_compra='" . $nu_compra . "'";
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

		$compra->setNu_compra($result[$x]["nu_compra"]);
		$compra->setNu_cliente($result[$x]["nu_cliente"]);
		$compra->setFe_compra($result[$x]["fe_compra"]);
		$compra->setIn_despacho($result[$x]["in_despacho"]);
		$compra->setFe_despacho($result[$x]["fe_despacho"]);

		$compra->setCliente($cliente);

	}

	return $compra;

}
*/

public function listar ($condicion='1=1') {

	$arreglo = array();
	$db = new OperacionDB();
	$query = "SELECT nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
		"nb_cliente, co_correo, co_clave, nu_cedula " .
		"FROM view_compra WHERE $condicion";

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

		array_push($arreglo,$compra);

	}

	return $arreglo;

}


} // Fin class ManejadorCompra

?>