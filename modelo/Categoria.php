<?php

/* Clase atomica de la tabla Categoria */
class Categoria {

	/* atributos */
	private $nu_categoria;
	private $nb_categoria;


	/* constructor vacio */
	public function __construct() {	} 

	
	/* seters  */
	public function setNu_categoria($nu_categoria) {
	if ($nu_categoria != null) $this->nu_categoria = $nu_categoria;
	}

	public function setNb_categoria($nb_categoria) {
	if ($nb_categoria != null) $this->nb_categoria = $nb_categoria;
	}

	
	/* getters */
	public function getNu_categoria() { return $this->nu_categoria; }

	public function getNb_categoria() { return $this->nb_categoria; }

	public function __toString(){
		return "Clase: Categoria" . 
			"<br>nu_categoria=" . $this->nu_categoria . 
			"<br>nb_categoria=" . $this->nb_categoria;
	}

}


?>