<?php

/* Clase atomica de la tabla Compra */

//Relaciones entre tablas
require_once "Cliente.php";

class Compra {

	/* atributos */
	private $nu_compra;
	private $nu_cliente;
	private $fe_compra;
	private $fe_despacho;
	private $in_despacho;

	//Definicion de objetos como atributos
	private $cliente;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setNu_compra($nu_compra) {
	if ($nu_compra != null) $this->nu_compra = $nu_compra;
	}

	public function setNu_cliente($nu_cliente) {
	if ($nu_cliente != null) $this->nu_cliente = $nu_cliente;
	}

	public function setFe_compra($fe_compra) {
	if ($fe_compra != null) $this->fe_compra = $fe_compra;
	}

	public function setFe_despacho($fe_despacho) {
	if ($fe_despacho != null) $this->fe_despacho = $fe_despacho;
	}

	public function setIn_despacho($in_despacho) {
	if ($in_despacho != null) $this->in_despacho = $in_despacho;
	}

	//Setters de los objetos
	public function setCliente(Cliente $cliente) {
	$this->cliente = $cliente;
	}


	/* getters */
	public function getNu_compra() { return $this->nu_compra; }

	public function getNu_cliente() { return $this->nu_cliente; }

	public function getFe_compra() { return $this->fe_compra; }

	public function getFe_despacho() { return $this->fe_despacho; }

	public function getIn_despacho() { return $this->in_despacho; }

	//Getters de los objetos
	public function getCliente() { return $this->cliente; }


	public function __toString(){
		return "Clase: Compra" .
		"<br>nu_compra=" . $this->nu_compra . 
		"<br>nu_cliente=" . $this->nu_cliente . 
		"<br>fe_compra=" . $this->fe_compra . 
		"<br>in_despacho=" . $this->in_despacho . 
		"<br>fe_despacho=" . $this->fe_despacho
		;
	}

}


?>