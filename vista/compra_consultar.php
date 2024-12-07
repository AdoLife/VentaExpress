<!DOCTYPE html>
<html>
<head>
	<title>VentaExpress</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<script src="../scripts/jquery.js"></script>
</head>
<body>


<?php
include("../vista/tope.php");
include("../vista/menu_ppal.php");
?>


<div class="w3-padding" style="width: 75%; margin: auto;">
	
	<h1 class="w3-center">Consultar Compra</h1>

<?php
if(count($lista) > 0){
	$detalle = $lista[0];
	$compra = $detalle->getCompra();
	$fe_compra = $compra->getFe_compra();
	$in_despacho = $compra->getIn_despacho();

	// A: abierta, C: Pagada, D: Despachada
	$despacho = ($in_despacho = 'A')?"Abierta":"...";

	echo "<table class='w3-table w3-indigo'>";
	echo "<tr><th>Fecha: $fe_compra</td><th>Despacho: $despacho</td></tr>";
	echo "</table>";

}
?>

	<table class="w3-table-all">
		
		<tr class="w3-indigo">
			<th>#</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
		</tr>

<?php
$total = 0;

for($x = 0; $x < count($lista); $x++){
	$item = $lista[$x];

	$producto = $item->getProducto();
	$ca_producto = $item->getCa_producto();
	$nb_producto = $producto->getNb_producto();
	$va_precio = $producto->getVa_precio();
	$subtotal = $ca_producto * $va_precio;
	$total += $subtotal;

?>

	<tr>
		<td><?=($x+1)?></td>
		<td><?=$nb_producto?></td>
		<td><?=$ca_producto?></td>
		<td><?=$va_precio?></td>
		<td><?=$subtotal?></td>
	</tr>
<?php
}

echo "<tr><td colspan=99 class='w3-center w3-black'><b>Total: $total</b></td></tr>";

?>
	</table>

</div>

<?php
if(count($lista) > 0){
	$nu_compra = $compra->getNu_compra();
?>

	<div class="w3-center">
		<form id="pagar" method="post" action="CompraConsultar.php">
			<input type="hidden" name="pagar" value="1">
			<input type="hidden" name="nu_compra" value="<?=$nu_compra?>">
		</form>
		<p class="w3-padding">
			<img src="../iconos/pagar.png" onclick="pagar.submit();" title="Haga click para efectuar el pago">
		</p>
	</div>

<?php
}
?>



<?php
include("../vista/mensaje.php");
?>

<?php
include("../vista/pie.php");
?>




</body>
</html>