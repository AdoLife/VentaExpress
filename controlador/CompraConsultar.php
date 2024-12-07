<?php

session_start();

if(
	!isset($_SESSION['nu_cliente'])
){

	header("location: Catalogo.php");

}

include_once("../modelo/ManejadorDetalle_compra.php");
include_once("../modelo/ManejadorCompra.php");


if(
	isset($_POST['pagar']) && $_POST['pagar'] == 1
){

	$nu_compra = $_POST['nu_compra'];
	$nu_cliente = $_SESSION['nu_cliente'];

	$compra = new Compra();
	$compra->setNu_cliente($nu_cliente);
	$compra->setNu_compra($nu_compra);
	$compra->setIn_despacho('C');

	$man_compra = new ManejadorCompra();
	$res = $man_compra->modificar($compra);

}




$manejador = new ManejadorDetalle_compra();

$condicion = "nu_cliente = " . $_SESSION['nu_cliente'] . 
	" and in_despacho = 'A'";

$lista = $manejador->listar($condicion);


include_once("../vista/compra_consultar.php");

?>