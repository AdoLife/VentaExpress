<?php

/* Clase atomica de la tabla Detalle_compra */

//Relaciones entre tablas
require_once "Compra.php";
require_once "Producto.php";


class Detalle_compra {

	/* atributos */
	private $nu_detalle;
	private $nu_compra;
	private $nu_producto;
	private $ca_producto;
	private $fe_registro;


	//Definicion de objetos como atributos
	private $compra;
	private $producto;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setNu_detalle($nu_detalle) {
	if ($nu_detalle != null) $this->nu_detalle = $nu_detalle;
	}

	public function setNu_compra($nu_compra) {
	if ($nu_compra != null) $this->nu_compra = $nu_compra;
	}

	public function setNu_producto($nu_producto) {
	if ($nu_producto != null) $this->nu_producto = $nu_producto;
	}

	public function setCa_producto($ca_producto) {
	if ($ca_producto!= null) $this->ca_producto = $ca_producto;
	}

	public function setFe_registro($fe_registro) {
	if ($fe_registro != null) $this->fe_registro = $fe_registro;
	}


	//Setters de los objetos
	public function setCompra(Compra $compra) {
	$this->compra = $compra;
	}

	public function setProducto(Producto $producto) {
	$this->producto = $producto;
	}


	/* getters */
	public function getNu_detalle() { return $this->nu_detalle; }

	public function getNu_compra() { return $this->nu_compra; }

	public function getNu_producto() { return $this->nu_producto; }

	public function getCa_producto() { return $this->ca_producto; }

	public function getFe_registro() { return $this->fe_registro; }


	//Getters de los objetos
	public function getCompra() { return $this->compra; }

	public function getProducto() { return $this->producto; }


	public function __toString(){
		return "Clase: Detalle_compra" . 
		"<br>nu_detalle=" . $this->nu_detalle . 
		"<br>nu_compra=" . $this->nu_compra . 
		"<br>nu_producto=" . $this->nu_producto . 
		"<br>ca_producto=" . $this->ca_producto . 
		"<br>fe_registro=" . $this->fe_registro;
	}

} // Fin class Detalle_compra


?>
