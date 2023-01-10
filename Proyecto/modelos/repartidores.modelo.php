<?php

require_once "conexion.php";

class ModeloRepartidores{


    /*=============================================
    CREAR REPARTIDORES
    =============================================*/

    public static function mdlIngresarRepartidor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,telefono,zona) VALUES (:nombre, :telefono, :zona)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":zona", $datos["zona"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        //    $stmt->close();
        $stmt = null;
    }




    /*=============================================
    MOSTRAR REPARTIDORES
    =============================================*/

    public static function mdlMostrarRepartidores($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        //$stmt -> close();

        $stmt = null;
    }



    
	/*=============================================
	EDITAR REPARTIDOR
	=============================================*/

	static public function mdlEditarRepartidor($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, telefono = :telefono, zona = :zona WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":zona", $datos["zona"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		//$stmt->close();
		$stmt = null;
	}


    /*=============================================
	ELIMINAR REPARTIDORES
	=============================================*/

	static public function mdlEliminarRepartidor($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		//$stmt -> close();

		$stmt = null;
	}



}