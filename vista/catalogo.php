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
		}

	</style>
	<script>

		$(document).ready(
			function(){

				// cargue la lista por defecto
				carga();

				$("#nu_categoria").click(function(){

					carga();

				});

			}
		);


		function carga(){
			nu_categoria = $("#nu_categoria").val();

			$.ajax(
			{
				url: "../scripts/lista_catalogo.php",
				data: {
					nu_categoria : nu_categoria
				},
				type : 'GET',
				success: function(result){
					$("#lista").html(result);
				}
			}
			);
		}

	</script>
</head>
<body>


<?php
include("../vista/tope.php");
include("../vista/menu_ppal.php");
?>


<main class="w3-pale-blue w3-padding">
	
	<h1 class="w3-center">Cat&aacute;logo</h1>

	<p class="w3-center">
		<label for="nu_categoria">Categor&iacute;a</label>
		<?=$combo?>
	</p>

	<div id="lista"></div>

</main>


<?php
include("../vista/pie.php");
?>



</body>
</html>