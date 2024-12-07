<!DOCTYPE html>
<html>
<head>
	<title>VentaExpress</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<script src="../scripts/jquery.js"></script>
	<style>

		main {
			width: 50%;
			margin: auto;
		}

	</style>
</head>
<body>


<?php
include("../vista/menu_ppal.php");
?>


<main class="w3-pale-blue w3-padding">
	
	<h1 class="w3-center">Modificar Datos del Cliente</h1>

	<form name="form_ingreso" method="post" action="ClienteModificar.php">
		
		<input type="hidden" name="opcion" value="2">
		<input type="hidden" name="nu_cliente" value="<?=$nu_cliente?>">

		<p class="w3-center">
			<label for="nb_cliente">Nombre</label>
			<input type="text" name="nb_cliente" id="nb_cliente" required maxlength="50" value="<?=$nb_cliente?>">
		</p>

		<p class="w3-center">
			<label for="nu_cedula">C&eacute;dula</label>
			<input type="number" name="nu_cedula" id="nu_cedula" min="1000000" max="99999999" value="<?=$nu_cedula?>">
		</p>

		<p class="w3-center">
			<label for="co_correo">Email</label>
			<input type="email" name="co_correo" id="co_correo" required maxlength="35" value="<?=$co_correo?>">
		</p>

		<p class="w3-center">
			<label for="co_clave">Clave de Acceso</label>
			<input type="password" name="co_clave" id="co_clave" required maxlength="35" value="<?=$co_clave?>">
		</p>

		<p class="w3-center">
			<button class="w3-btn w3-blue">ACEPTAR</button>
		</p>

	</form>

</main>


<?php
include("../vista/mensaje.php");
?>


</body>
</html>