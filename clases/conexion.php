<?php 

class conectar {
	public function conexion(){
		$conexion = mysqli_connect('localhost', 'root', '', 'up_tabla_dinamica');

		$conexion->set_charset('utf8');

		return $conexion;
	}
}


?>