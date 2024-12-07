 
<style>

	.menu {
		height: 48px;
	}

</style>

<div class="w3-padding w3-pale-yellow w3-right-align">

	<a href="Catalogo.php"><img src="../iconos/catalogo.png" class="menu w3-btn w3-light-grey" title="Haga click para consultar el catalogo"></a>

	<?php
		if(isset($_SESSION['nb_cliente'])){
	?>

		<div class="w3-padding w3-left">
			Cliente: <span class="w3-white w3-padding"><?=$_SESSION['nb_cliente']?></span>
		</div>

		<a href="ClienteModificar.php"><img src="../iconos/modificar.png" class="menu w3-btn w3-light-grey" title="Haga click para modificar los datos del cliente"></a>

		<a href="CarritoConsultar.php"><img src="../iconos/carrito.png" class="menu w3-btn w3-light-grey" title="Haga click para consultar el carrito de compras"></a>

		<a href="CompraConsultar.php"><img src="../iconos/compra.png" class="menu w3-btn w3-light-grey" title="Haga click para consultar la compra actual"></a>

		<a href="Historico.php"><img src="../iconos/despacho.png" class="menu w3-btn w3-light-grey" title="Haga click para consultar las compras"></a>

		<a href="Logout.php"><img src="../iconos/logout.png" class="menu w3-btn w3-light-grey" title="Haga click para salir del sistema"></a>

	<?php
		}else{
	?>

		<a href="Registrese.php"><img src="../iconos/registrese.png" class="menu w3-btn w3-light-grey" title="Haga click para registrase al sistema"></a>

		<a href="Login.php"><img src="../iconos/login.png" class="menu w3-btn w3-light-grey" title="Haga click para ingresar al sistema"></a>

	<?php
		}
	?>

</div>
