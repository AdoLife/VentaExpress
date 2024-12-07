<?php

include_once("../modelo/ManejadorProducto.php");
include_once("../modelo/ManejadorCategoria.php");
include_once("../scripts/funciones.php");


$man_categoria = new ManejadorCategoria();
$man_producto = new ManejadorProducto();

$nu_categoria = 0;


if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	$nb_producto = $_POST['nb_producto'];
	$de_producto = $_POST['de_producto'];
	$va_precio = $_POST['va_precio'];
	$ca_existencia = $_POST['ca_existencia'];
	$nb_imagen = $_FILES['nb_imagen']['name'];
	$nu_categoria = $_POST['nu_categoria'];

	$producto = new Producto();

	$producto->setNb_producto($nb_producto);
	$producto->setDe_producto($de_producto);
	$producto->setVa_precio($va_precio);
	$producto->setCa_existencia($ca_existencia);
	$producto->setNb_imagen($nb_imagen);
	$producto->setNu_categoria($nu_categoria);

	$res = $man_producto->ingresar($producto);

	if($res){
		$up = uploadFile("../productos/", "nb_imagen");
		if($up == 1)
			$mensaje = "Datos agregados satisfactoriamente";
		else if($up == -1)
			$mensaje = "La imagen supera el tamaño permitido (500 Kbytes)";
		else if($up == -2)
			$mensaje = "El formato de la imagen es desconocido";
		else if($up == -3)
			$mensaje = "Ha ocurrido un error durante la carga del archivo";

	}else{
		$mensaje = "Ha ocurrido un error durante el proceso";
	}

}


$combo = $man_categoria->combo($nu_categoria);



include_once("../vista/producto_ingresar.php");

?>