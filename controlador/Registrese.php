<?php

session_start();


include_once("../modelo/ManejadorCliente.php");


if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	//$nu_cliente = $_POST['nu_cliente'];
	$nb_cliente = $_POST['nb_cliente'];
	$nu_cedula = $_POST['nu_cedula'];
	$co_correo = $_POST['co_correo'];
	$co_clave = $_POST['co_clave'];

	$cliente = new Cliente();

	$cliente->setNb_cliente($nb_cliente);
	$cliente->setNu_cedula($nu_cedula);
	$cliente->setCo_correo($co_correo);
	$cliente->setCo_clave($co_clave);

	$man = new ManejadorCliente();

	$res = $man->ingresar($cliente);

	if($res){

		$condicion = "nb_cliente = '$nb_cliente'" .
			" and nu_cedula = '$nu_cedula'" . 
			" and co_correo = '$co_correo'";
		$cliente = $man->buscar($condicion);

		$_SESSION['nu_cliente'] = $cliente->getNu_cliente();
		$_SESSION['nb_cliente'] = $cliente->getNb_cliente();
		$_SESSION['nu_cedula'] = $cliente->getNu_cedula();
		$_SESSION['co_correo'] = $cliente->getCo_correo();

		$mensaje = "Datos agregados satisfactoriamente";

	}else{

		$mensaje = "Ha ocurrido un error durante el proceso";

	}

}

include_once("../vista/registrese.php");

?>