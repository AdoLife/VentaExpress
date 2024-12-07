<?php

session_start();

unset($_SESSION['nu_cliente']);
unset($_SESSION['nb_cliente']);
unset($_SESSION['co_correo']);


session_destroy();

header("location: Catalogo.php");

?>