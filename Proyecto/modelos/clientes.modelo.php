<?php

require_once "conexion.php";

class ModeloClientes
{

    /*=============================================
    CREAR CLIENTE
    =============================================*/

    public static function mdlIngresarCliente($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,edad,telefono,direccion,log,lnt) VALUES (:nombre, :edad, :telefono, :direccion,:log,:lnt)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":log", $datos["log"], PDO::PARAM_STR);
        $stmt->bindParam(":lnt", $datos["lnt"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        //    $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR CLIENTES
    =============================================*/

    public static function mdlMostrarClientes($tabla, $item, $valor)
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
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,edad = :edad, telefono = :telefono, direccion = :direccion , log = :log , lnt=:lnt WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":log", $datos["log"], PDO::PARAM_STR);
        $stmt->bindParam(":lnt", $datos["lnt"], PDO::PARAM_STR);
		

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		//$stmt->close();
		$stmt = null;
	}
    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function mdlEliminarCliente($tabla, $datos)
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

    /*=============================================
    ACTUALIZAR CLIENTE
    =============================================*/

    public static function mdlActualizarCliente($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        //$stmt -> close();

        $stmt = null;
    }
}
