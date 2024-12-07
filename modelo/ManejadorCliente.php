<?php

require_once "OperacionDB.php";
require_once "Cliente.php";


// Manejador de la clase atómica Cliente

class ManejadorCliente {

public function ingresar (Cliente $m) {
	$db = new OperacionDB();
	$query="INSERT INTO cliente (nb_cliente, co_correo, co_clave, nu_cedula) " .
		"VALUES (" . 
		"'" . $m->getNb_cliente() . "'" . 
		", " . "'" . $m->getCo_correo() . "'" . 
		", " . "'" . $m->getCo_clave() . "'" . 
		", " . "'" . $m->getNu_cedula() . "'" . 
		")";

//echo "query: " . $query;

	$result = $db->runQuery($query);
	
	return $result;

}


public function modificar (Cliente $m) {
	$db = new OperacionDB();
	$query="UPDATE cliente SET nb_cliente='" . $m->getNb_cliente() . "'" . 
		", " . "co_correo='" . $m->getCo_correo() . "'" . 
		", " . "co_clave='" . $m->getCo_clave() . "'" . 
		", " . "nu_cedula='" . $m->getNu_cedula() . "'" . 
		" WHERE 1=1 AND nu_cliente='" . $m->getNu_cliente() . "'";

//echo "query: " . $query;

	$result = $db->runQuery($query);
	
	return $result;

}


public function eliminar ($nu_cliente) {
	$db = new OperacionDB();
	$query="DELETE FROM cliente WHERE 1=1 AND nu_cliente='" . $nu_cliente . "'";
//echo "query: " . $query;
	$result = $db->runQuery($query);
	
	return $result;

}


public function buscar ( $condicion="1=1" ) {
	$cliente = new Cliente();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula " .
		"FROM cliente WHERE $condicion";

//echo "query: " . $query;

	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;
		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

	}

	return $cliente;

}


public function listar($condicion='1=1') {
	$arreglo = array();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula " .
		"FROM cliente WHERE $condicion";

//echo "query: " . $query;

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {
		$cliente = new Cliente();

		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

		array_push($arreglo,$cliente);

	}

	return $arreglo;

}


} // fin class ManejadorCliente

?>