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


<main class="w3-padding w3-pale-blue">
	
	<h1 class="w3-center">Control de Acceso</h1>

	<form action="Login.php" method="post" name="acceso">
		<input type="hidden" name="control" value="qwertyuiopasdfghjkl">

		<p class="w3-center">
			<label for="co_correo">Email</label>
			<input type="email" name="co_correo" id="co_correo" required maxlength="35">
		</p>

		<p class="w3-center">
			<label for="co_clave">Clave</label>
			<input type="password" name="co_clave" id="co_clave" required maxlength="35">
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