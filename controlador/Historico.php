<?php

session_start();

if(
	!isset($_SESSION['nu_cliente'])
){

	header("location: Catalogo.php");

}


include_once("../modelo/ManejadorDetalle_compra.php");

$man_detalle = new ManejadorDetalle_compra();


// despachar una compra
if(
	isset($_GET['despachar']) && $_GET['despachar'] == 1
){

	$nu_compra = $_GET['nu_compra'];
	$in_despacho = 'D';

	$res = $man_detalle->despachar($nu_compra, $in_despacho);

}




$nu_cliente = $_SESSION['nu_cliente'];
$condicion = "nu_cliente = $nu_cliente and in_despacho <> 'A'";

$lista = $man_detalle->listar($condicion, "nu_compra, nu_detalle");


include_once("../vista/historico.php");

?>