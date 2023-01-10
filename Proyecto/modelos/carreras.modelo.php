<?php

require_once "conexion.php";


class ModeloTipoMovimiento
{


    /*=============================================
	CREAR  TIPO MOVIMIENTO
	=============================================*/

    static public function mdlIngresarTipoM($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Codigo,nombre,descripcion) VALUES (:Codigo,:nombre,:descripcion)");
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


        $stmt = null;
    }





    /*========================
    MOSTRAR TIPO MOVIMIENTOS
    =======================*/

    static public function mdlMostrarTipoMov($tabla, $item, $valor)
    {

        if ($item != null) { //selecconar un item en especifico

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre desc");

            $stmt->execute();

            return $stmt->fetchAll(); ///devolvemos todos los item

        }

        $stmt = null;
    }



    /*=============================================
	EDITAR TIPO MOVIMIENTO
	=============================================*/

    static public function mdlEditarTipoMov($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , descripcion = :descripcion   WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


        $stmt = null;
    }




    /*=============================================
	BORRAR TIPO MOVIMIENTO
	=============================================*/

    static public function  mdlBorrarTipoMov($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		

		$stmt = null;


    }





}
