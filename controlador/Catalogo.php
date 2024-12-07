<?php

session_start();


include_once("../modelo/ManejadorCategoria.php");


$man_categoria = new ManejadorCategoria();
$combo = $man_categoria->combo();


include_once("../vista/catalogo.php");

?>
