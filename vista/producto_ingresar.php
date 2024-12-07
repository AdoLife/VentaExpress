<!DOCTYPE html>
<html>
<head>
	<title>VentaExpress</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<style>

		#planilla {
			width: 60%;
			margin: auto;
		}

	</style>
</head>
<body>


<div id="planilla" class="w3-pale-green w3-padding">
	
	<h1 class="w3-center">Ingresar Productos</h1>

	<form name="formaproducto" method="post" action="ProductoIngresar.php" enctype="multipart/form-data">
		
		<input type="hidden" name="opcion" value="1">

		<p class="w3-center">
			<label for="nb_producto">Nombre</label>
			<br>
			<input type="text" name="nb_producto" id="nb_producto" maxlength="50" required>
		</p>

		<p class="w3-center">
			<label>Descripci&oacute;n</label>
			<br>
			<textarea name="de_producto" cols="30" rows="3" style="resize: none;" required></textarea>
		</p>

		<p class="w3-center">
			<label for="va_precio">Precio</label>
			<br>
			<input type="number" name="va_precio" id="va_precio" min="1" value="1" required>
		</p>

		<p class="w3-center">
			<label for="ca_existencia">Copias existentes</label>
			<br>
			<input type="number" name="ca_existencia" id="ca_existencia" min="0" value="0" required>
		</p>

		<p class="w3-center">
			<label for="nb_imagen">Imagen</label>
			<br>
			<input type="file" name="nb_imagen" id="nb_imagen" required>
		</p>

		<p class="w3-center">
			<label for="nu_categoria">Categor&iacute;a</label>
			<br>
			<?=$combo?>
		</p>

		<p class="w3-center">
			<button class="w3-button w3-teal">ACEPTAR</button>
		</p>

	</form>

</div>


<?php
include_once("../vista/mensaje.php");
?>


</body>
</html>