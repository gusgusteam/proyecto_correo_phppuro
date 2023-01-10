<?php

require_once "conexion.php";


class ModeloVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

    static public function mdlMostrarVentas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha_reserva DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha_reserva, '%d / %m / %Y') AS fecha_reserva , DATE_FORMAT(fecha, '%d / %m / %Y - %H:%i:%s ') AS fecha  FROM $tabla ORDER BY fecha_reserva DESC , hora ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		}



		$stmt = null;
	}






}