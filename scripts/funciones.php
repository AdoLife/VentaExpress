<?php

// Pool de funciones publicas


function uploadFile($carpeta, $archivo){

	$miarch = $carpeta . $_FILES[$archivo]["name"];

	$tipo_imagen = strtolower(pathinfo($miarch, PATHINFO_EXTENSION));

	// verificar el tamaño del archivo
	if ($_FILES[$archivo]["size"] > 500000) {
		return -1;
	}

	// verificar el formato de la imagen
	if(
		$tipo_imagen != "jpg" &&
		$tipo_imagen != "png" && 
		$tipo_imagen != "jpeg" &&
		$tipo_imagen != "gif"
	){
		return -2;
	}

	// hacer el upload a la carpeta
	if (move_uploaded_file($_FILES[$archivo]["tmp_name"], $miarch)){
		return 1;
	}else{
		return -3;
	}

} // fin uploadFile



?>