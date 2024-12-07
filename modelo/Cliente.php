<?php

/* Clase atomica de la tabla Cliente */
class Cliente {

	/* atributos */
	private $nu_cliente;
	private $nu_cedula;
	private $nb_cliente;
	private $co_correo;
	private $co_clave;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setNu_cliente($nu_cliente) {
		if ($nu_cliente != null) $this->nu_cliente = $nu_cliente;
	}

	public function setNb_cliente($nb_cliente) {
		if ($nb_cliente != null) $this->nb_cliente = $nb_cliente;
	}

	public function setCo_correo($co_correo) {
		if ($co_correo != null) $this->co_correo = $co_correo;
	}

	public function setCo_clave($co_clave) {
		if ($co_clave != null) $this->co_clave = $co_clave;
	}

	public function setNu_cedula($nu_cedula) {
		if ($nu_cedula != null) $this->nu_cedula = $nu_cedula;
	}

	
	/* getters */
	public function getNu_cliente() { return $this->nu_cliente; }

	public function getNb_cliente() { return $this->nb_cliente; }

	public function getCo_correo() { return $this->co_correo; }

	public function getCo_clave() { return $this->co_clave; }

	public function getNu_cedula() { return $this->nu_cedula; }


	public function __toString(){
		return "Clase: Cliente" . 
		"<br>>nu_cliente=" . $this->nu_cliente . 
		"<br>nb_cliente=" . $this->nb_cliente . 
		"<br>co_correo=" . $this->co_correo . 
		"<br>co_clave=" . $this->co_clave . 
		"<br>nu_cedula=" . $this->nu_cedula;
	}

}


?>