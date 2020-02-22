<?php

	class crud{
		public function agregar($datos){
			$obj = new conectar();
			$conexion = $obj->conexion();

			$sql = "INSERT INTO t_juegos (nombre, anio, empresa) VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";

			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idjuego){
			$obj = new conectar();
			$conexion = $obj->conexion();

			$sql = "SELECT id_juego, nombre, anio, empresa FROM t_juegos WHERE id_juego = '$idjuego'";

			$result = mysqli_query($conexion, $sql);

			$ver = mysqli_fetch_row($result);

			$datos = array(
				'id_juego'	=> $ver[0],
				'nombre'	=> $ver[1],
				'anio'		=> $ver[2],
				'empresa'	=> $ver[3]
			);

			return $datos;
		}
	}

?>