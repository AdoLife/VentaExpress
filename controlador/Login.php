<?php

session_start();


include_once("../modelo/ManejadorCliente.php");


if(
	isset($_POST['control']) && $_POST['control'] == "qwertyuiopasdfghjkl"
){

	$co_correo = $_POST['co_correo'];
	$co_clave = $_POST['co_clave'];
	$condicion = "co_correo = '$co_correo' and co_clave = '$co_clave'";

	$man = new ManejadorCliente();

	$cliente = $man->buscar($condicion);
	if($cliente->getNu_cliente() <> ""){

		$nu_cliente = $cliente->getNu_cliente();
		$nb_cliente = $cliente->getNb_cliente();

		$_SESSION['nu_cliente'] = $nu_cliente;
		$_SESSION['nb_cliente'] = $nb_cliente;
		$_SESSION['co_correo'] = $co_correo;

		$mensaje = "Bienvenido al sistema, Sr(a): $nb_cliente";

	}else{

		$mensaje = "Datos no registrados en nuestra base de datos. Registrese!!";

	}

}


include_once("../vista/login.php");

?>