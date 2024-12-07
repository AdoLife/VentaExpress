<?php

class OperacionDB {

	// Atributos
	private $server = "localhost";
	private $user = "root";
	private $pass = "";
	private $bd = "ventaexpress";

	
	private function conexion(){
		$conexion = mysqli_connect(
			$this->server, $this->user, $this->pass, $this->bd
		);
		
		return $conexion;
	}
	
	private function desconexion($conexion){
		$close = mysqli_close($conexion);

		return $close;
	}
	
	public function runQuery($query){
		$conex=$this->conexion();
		try{

			$result = mysqli_query($conex, $query);

		}catch(Exception $error){

			$msg = $error->getMessage();
			echo "<p class='w3-center w3-text-red w3-padding w3-light-grey'><b>Advertencia:</b> $msg</p>";
			$result = false;

		}
/*
		if(mysqli_error($conex)){
			print "Ocurrió un error en la ejecución del query: " .
				"$query - Error:" . mysqli_error($conex);
		}
*/
		$this->desconexion($conex);
		
		return $result;
	}

	public function runSelect($query){
		$arreglo = array();
		$conex=$this->conexion();
		$result = mysqli_query($conex, $query);
		if(mysqli_error($conex)){
			print "Ocurrió un error en la ejecución del query: " .
				"$query - Error:" . mysqli_error($conex);
		}else{
			
			for($i = 0; $i < $result->num_rows; $i++){
				$arreglo[$i] = $result->fetch_assoc();
			}

		}
		$this->desconexion($conex);

		return $arreglo;
	}
	
} // fin  OperacionDB

?>