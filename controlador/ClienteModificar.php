<?php

session_start();

include_once("../modelo/ManejadorCliente.php");

$man = new ManejadorCliente();


if(
	isset($_SESSION['nu_cliente'])
){


	$nu_cliente = $_SESSION['nu_cliente'];
	$cliente = $man->buscar("nu_cliente = $nu_cliente");

	$nb_cliente = $cliente->getNb_cliente();
	$nu_cedula = $cliente->getNu_cedula();
	$co_correo = $cliente->getCo_correo();
	$co_clave = $cliente->getCo_clave();

}else{

	header("location: Catalogo.php");

}


if(
	isset($_POST['opcion']) && $_POST['opcion'] == 2
){

	$nu_cliente = $_POST['nu_cliente'];
	$nb_cliente = $_POST['nb_cliente'];
	$nu_cedula = $_POST['nu_cedula'];
	$co_correo = $_POST['co_correo'];
	$co_clave = $_POST['co_clave'];

	$cliente = new Cliente();

	$cliente->setNu_cliente($nu_cliente);
	$cliente->setNb_cliente($nb_cliente);
	$cliente->setNu_cedula($nu_cedula);
	$cliente->setCo_correo($co_correo);
	$cliente->setCo_clave($co_clave);

	$res = $man->modificar($cliente);
	if($res){

		$_SESSION['nb_cliente'] = $nb_cliente;
		$_SESSION['nu_cedula'] = $nu_cedula;
		$_SESSION['co_correo'] = $co_correo;

		$mensaje = "Datos modificados satisfactoriamente";
	}
	else
		$mensaje = "Ha ocurrido un error durante el proceso";


}


include_once("../vista/modificar_cliente.php");

?>