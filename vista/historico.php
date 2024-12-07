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
	
	<h1 class="w3-center">Consultar Compras</h1>

	<table class="w3-table-all">
		
		<tr class="w3-indigo">
			<th>#</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
			<th>Acciones</th>
		</tr>

<?php
$co_compra = 0;
$total = 0;

for($x = 0; $x < count($lista); $x++){

	$detalle = $lista[$x];
	$ca_producto = $detalle->getCa_producto();

	$compra = $detalle->getCompra();
	$nu_compra = $compra->getNu_compra();
	
	// verificar si hubo ruptura de control
	if(
		$nu_compra <> $co_compra
	){
		if($x > 0){
			echo "<tr>";
			echo "<td colspan=4>Fecha: $fe_compra - Despacho: $despacho</td>";
			echo "<td>TOTAL: $total</td>";
			if($in_despacho == 'C'){
				echo "<td>";
				echo "<a href='Historico.php?nu_compra=$nu_compra&despachar=1'><img src='../iconos/despacho.png' style='height:32px;'></a>";
				echo "</td>";
			}else{
				echo "<td></td>";
			}
			echo "</tr>";
		}

		$total = 0;
		$co_compra = $nu_compra;
	}

	$fe_compra = $compra->getFe_compra();
	$in_despacho = $compra->getIn_despacho();
	$fe_despacho = $compra->getFe_despacho();

	$producto = $detalle->getProducto();
	$nb_producto = $producto->getNb_producto();
	$va_precio = $producto->getVa_precio();

	$subtotal = $ca_producto * $va_precio;


	$total += $subtotal;
	$despacho = ($in_despacho == 'C')?"Pagada":"Despachada";

?>

	<tr>
		<td><?=($x+1)?></td>
		<td><?=$nb_producto?></td>
		<td><?=$ca_producto?></td>
		<td><?=$va_precio?></td>
		<td><?=$subtotal?></td>
		<td></td>
	</tr>

<?php

	// Verificar si hubo ruptura de control al final de la lista
	if(
		$x == count($lista)-1
	){
		echo "<tr>";
		echo "<td colspan=4>Fecha: $fe_compra - Despacho: $despacho</td>";
		echo "<td>TOTAL: $total</td>";
		if($in_despacho == 'C'){
			echo "<td>";
			echo "<a href='Historico.php?nu_compra=$nu_compra&despachar=1'><img src='../iconos/despacho.png' style='height:32px;'></a>";
			echo "</td>";
		}else{
			echo "<td></td>";
		}
		echo "</tr>";
	}

}
?>
	</table>

</div>




<?php
include("../vista/mensaje.php");
?>

<?php
include("../vista/pie.php");
?>


</body>
</html>