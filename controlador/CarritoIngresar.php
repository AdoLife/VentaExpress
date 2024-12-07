<?php

session_start();


include_once("../modelo/ManejadorCarrito.php");

if(
	isset($_POST['nu_producto'])
){

	$nu_producto = $_POST['nu_producto'];
	$nu_cliente = $_SESSION['nu_cliente'];

	$carrito = new Carrito();

	$carrito->setNu_cliente($nu_cliente);
	$carrito->setNu_producto($nu_producto);

	$man = new ManejadorCarrito();

	$res = $man->ingresar($carrito);

}


header("location: Catalogo.php");


?>