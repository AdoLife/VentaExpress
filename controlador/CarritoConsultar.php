<?php

session_start();


include_once("../modelo/ManejadorCarrito.php");
include_once("../modelo/ManejadorCompra.php");
include_once("../modelo/ManejadorDetalle_compra.php");


if(
	isset($_SESSION['nu_cliente'])
){

	$nu_cliente = $_SESSION['nu_cliente'];
	$condicion = "nu_cliente = $nu_cliente";

	$man = new ManejadorCarrito();

	// eliminar producto del carrito
	if(
		isset($_POST['opcion']) && $_POST['opcion'] == 4
	){

		$nu_producto = $_POST['nu_producto'];

		$res = $man->eliminar ($nu_cliente, $nu_producto);

		if($res)
			$mensaje = "Datos eliminados satisfactoriamente";
		else
			$mensaje = "Ha ocurrido un error durante el proceso";

	}


	// agregar un producto al detalle_compra
	if(
		isset($_POST['comprar']) && $_POST['comprar'] == 1
	){

		$nu_producto = $_POST['nu_producto'];
		$ca_producto = $_POST['ca_producto'];

		// 1) verificar una compra abierta
		$man_compra = new ManejadorCompra();
		$compras = $man_compra->listar("nu_cliente = $nu_cliente and in_despacho = 'A'");

		$existe = false;

		// no existe compra
		if(count($compras) == 0){

			$compra = new Compra();
			$compra->setNu_cliente($_SESSION['nu_cliente']);
			$compra->setIn_despacho("A");

			$res = $man_compra->insertar($compra);

			if($res){

				$compras = $man_compra->listar("nu_cliente = $nu_cliente and in_despacho = 'A'");

				if(count($compras) > 0) $existe = true;
			}


		}else{
			$existe = true;
		}

		if($existe){

			// si existe compra
			$compra = $compras[0];

			$nu_compra = $compra->getNu_compra();

			$detalle_compra = new Detalle_compra();
			$detalle_compra->setNu_compra($nu_compra);
			$detalle_compra->setNu_producto($nu_producto);
			$detalle_compra->setCa_producto($ca_producto);

			$man_detalle = new ManejadorDetalle_compra();
			$man_detalle->insertar($detalle_compra);

		}


	} // fin agregar producto al detalle



	$lista = $man->listar($condicion);
	//var_dump($lista);

}else{

	header("location: Catalogo.php");

}


include_once("../vista/carrito_consultar.php");

?>