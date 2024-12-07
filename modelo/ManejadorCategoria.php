<?php

require_once "OperacionDB.php";
require_once "Categoria.php";


/*   Manejador de la clase atómica Categoria   */
class ManejadorCategoria {

	public function ingresar(Categoria $m) {
		
		$db = new OperacionDB();
		$query="INSERT INTO categoria (nb_categoria) VALUES (" . 
			"'" . $m->getNb_categoria() . "'" . ")";
	//echo "query: " . $query;
		$result = $db->runQuery($query);
		
		return $result;

	}


	public function modificar(Categoria $m) {

		$db = new OperacionDB();
		$query="UPDATE categoria SET nb_categoria='" . $m->getNb_categoria() . "'" . 
		" WHERE nu_categoria='" . $m->getNu_categoria() . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}


	public function eliminar($nu_categoria) {

		$db = new OperacionDB();
		$query="DELETE FROM categoria WHERE nu_categoria='" . $nu_categoria . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}


	public function buscar( $nu_categoria ) {
		$categoria = new Categoria();

		$db = new OperacionDB();
		$query="SELECT nu_categoria, nb_categoria from categoria " .
			"WHERE nu_categoria='" . $nu_categoria . "'";
	//echo "query: " . $query;
		$result = $db->runSelect($query);
		if (count($result)>0) {

			$x=0;
			$categoria->setNu_categoria($result[$x]["nu_categoria"]);
			$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		}

		return $categoria;

	}


	public function listar($condicion='1=1') {
		$arreglo=array();

		$db = new OperacionDB();
		$query="SELECT nu_categoria, nb_categoria FROM categoria WHERE $condicion ORDER BY nb_categoria";
	//echo "query: " . $query;
		$result = $db->runSelect($query);

		for($x=0; $x < count($result); $x++) {
			$categoria = new Categoria();

			$categoria->setNu_categoria($result[$x]["nu_categoria"]);
			$categoria->setNb_categoria($result[$x]["nb_categoria"]);

			array_push($arreglo,$categoria);

		}

		return $arreglo;

	}
	

	public function combo($valor=0){

		$arreglo = $this->listar();

		$etiqueta = "<select name='nu_categoria' id='nu_categoria' class='w3-select w3-border'>" . 
			"\n<option value='0'>Seleccione</option>";

		for($x=0; $x < count($arreglo); $x++){
			$cateoria = $arreglo[$x];
			$nu_categoria = $cateoria->getNu_categoria();
			$nb_categoria = $cateoria->getNb_categoria();
			if($nu_categoria == $valor)
				$sel = " selected ";
			else
				$sel = "";
			$etiqueta .= "\n<option value='" . $nu_categoria . "'" . $sel . ">";
			$etiqueta .= $nb_categoria . "</option >";
		}

		$etiqueta .= "</select>";
		
		return $etiqueta;
	}

}

// Elaborado por: Douglosky Barriosnovick 2024 "Amor a la madre Rusia"

?>