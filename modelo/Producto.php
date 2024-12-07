<?php

/* Clase atomica de la tabla Producto */

//Relaciones entre tablas
require_once "Categoria.php";

class Producto {

	/* atributos */
	private $nu_producto;
	private $nb_producto;
	private $ca_existencia;
	private $va_precio;
	private $nu_categoria;
	private $de_producto;
	private $nb_imagen;

	//Definicion de objetos como atributos
	private $categoria;


	/* constructor vacio */
	public function __construct() {	} 

	/* seters  */
	public function setNu_producto($nu_producto) {
	if ($nu_producto != null) $this->nu_producto = $nu_producto;
	}

	public function setNb_producto($nb_producto) {
	if ($nb_producto != null) $this->nb_producto = $nb_producto;
	}

	public function setCa_existencia($ca_existencia) {
	if ($ca_existencia != null) $this->ca_existencia = $ca_existencia;
	}

	public function setVa_precio($va_precio) {
	if ($va_precio != null) $this->va_precio = $va_precio;
	}

	public function setNu_categoria($nu_categoria) {
	if ($nu_categoria != null) $this->nu_categoria = $nu_categoria;
	}

	public function setDe_producto($de_producto) {
	if ($de_producto != null) $this->de_producto = $de_producto;
	}

	public function setNb_imagen($nb_imagen) {
	if ($nb_imagen != null) $this->nb_imagen = $nb_imagen;
	}


	//Setters de los objetos
	public function setCategoria(Categoria $categoria) {
	$this->categoria = $categoria;
	}


	/* getters */
	public function getNu_producto() { return $this->nu_producto; }

	public function getNb_producto() { return $this->nb_producto; }

	public function getCa_existencia() { return $this->ca_existencia; }

	public function getVa_precio() { return $this->va_precio; }

	public function getNu_categoria() { return $this->nu_categoria; }

	public function getDe_producto() { return $this->de_producto; }

	public function getNb_imagen() { return $this->nb_imagen; }

	
	//Getters de los objetos
	public function getCategoria() { return $this->categoria; }

	
	public function __toString(){
		return "Clase: Producto" . 
		"<br>nu_producto=" . $this->nu_producto . 
		"<br>nb_producto=" . $this->nb_producto . 
		"<br>ca_producto=" . $this->ca_producto . 
		"<br>va_precio=" . $this->va_precio . 
		"<br>nu_categoria=" . $this->nu_categoria . 
		"<br>de_producto=" . $this->de_producto;
	}

}


?>