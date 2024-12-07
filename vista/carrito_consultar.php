<!DOCTYPE html>
<html>
<head>
	<title>VentaExpress</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<script src="../scripts/jquery.js"></script>
	<style>

		main {
			width: 90%;
			margin: auto;
			min-height: 400px;
		}

	</style>
	<script>

		function calcular(nu_producto, va_precio, id_campo){
/*
			txt = "producto: "+nu_producto+", precio: "+va_precio+", cantidad: "+id_campo.value
			alert(txt)
*/
			aux = va_precio * id_campo.value;

			campo = "#subtotal"+nu_producto;
			$(campo).val(aux);

			return false;

		}

	</script>
</head>
<body>


<?php
include("../vista/tope.php");
include("../vista/menu_ppal.php");
?>


<main class="w3-padding">
	
	<h1 class="w3-center">Carrito de Compras</h1>

	<table class="w3-table-all">
		
		<tr class="w3-indigo">
			<th>#</th>
			<th>Producto</th>
			<th>Existencia</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
			<th>Acciones</th>
		</tr>

	<?php
	for($x = 0; $x < count($lista); $x++){

		$carrito = $lista[$x];
		$producto = $carrito->getProducto();

		$nu_producto = $producto->getNu_producto();
		$nb_producto = $producto->getNb_producto();
		$ca_existencia = $producto->getCa_existencia();
		$va_precio = $producto->getVa_precio();
		$subtotal = $va_precio;

	?>

		<form method="post" action="CarritoConsultar.php" id="eliminar<?=$x?>">
			<input type="hidden" name="opcion" value="4">
			<input type="hidden" name="nu_producto" value="<?=$nu_producto?>">
		</form>


		<tr>
			<td><?=$x+1?></td>
			<td><?=$nb_producto?></td>
			<td><?=$ca_existencia?></td>
			<td><?=$va_precio?></td>
			<td>

				<form method="post" action="CarritoConsultar.php" id="comprar<?=$x?>">
					<input type="hidden" name="comprar" value="1">
					<input type="hidden" name="nu_producto" value="<?=$nu_producto?>">

					<input type="number" name="ca_producto" id="ca_producto<?=$nu_producto?>" value="1" min="1" max="<?=$ca_existencia?>" onChange="calcular(<?=$nu_producto?>, <?=$va_precio?>, this)">
				</form>

			</td>
			<td>
				<input type="text" id="subtotal<?=$nu_producto?>" value="<?=$subtotal?>" readonly size="10">
			</td>
			<td>

				<img src="../iconos/eliminar.png" title="Haga click para eliminar este producto del carrito" onclick="eliminar<?=$x?>.submit();">

				<img src="../iconos/compra.png" title="Haga click para comprar este producto" onclick="comprar<?=$x?>.submit();" style="height: 32px;">

			</td>
		</tr>

	<?php
	}
	?>

	</table>

</main>


<?php
include("../vista/mensaje.php");
?>

<?php
include("../vista/pie.php");
?>



</body>
</html>