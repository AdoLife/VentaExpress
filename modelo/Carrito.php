<?php

//Clase de la tabla carrito

//Relaciones entre tablas
require_once "Cliente.php";
require_once "Producto.php";

class Carrito {

	//atributos
	private $nu_cliente;
	private $nu_producto;
	private $fe_registro;


	//Definicion de objetos como atributos
	private $cliente;
	private $producto;


	//constructor vacio
	public function __construct() {	} 

	//Seters
	public function setNu_cliente($nu_cliente) {
		if ($nu_cliente != null) $this->nu_cliente = $nu_cliente;
	}

	public function setNu_producto($nu_producto) {
		if ($nu_producto != null) $this->nu_producto = $nu_producto;
	}

	public function setFe_registro($fe_registro) {
		if ($fe_registro != null) $this->fe_registro = $fe_registro;
	}


	//Setters de los objetos
	public function setCliente(Cliente $cliente) {
		$this->cliente = $cliente;
	}

	public function setProducto(Producto $producto) {
		$this->producto = $producto;
	}


	//Getters
	public function getNu_cliente() { return $this->nu_cliente; }

	public function getNu_producto() { return $this->nu_producto; }

	public function getFe_registro() { return $this->fe_registro; }


	//Getters de los objetos
	public function getCliente() { return $this->cliente; }

	public function getProducto() { return $this->producto; }


	public function __toString(){
		return "Clase: Carrito" . 
		"<br>nu_cliente=" . $this->nu_cliente . 
		"<br>nu_producto=" . $this->nu_producto . 
		"<br>fe_registro=" . $this->fe_registro;
	}

} // Aqui se termina la clase Carrito

?>