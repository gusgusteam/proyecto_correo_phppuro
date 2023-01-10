<?php

require_once "conexion.php";


class ModeloTipoInscripcion
{


    /*=============================================
	CREAR  TIPO MOVIMIENTO
	=============================================*/

    static public function mdlIngresarInscripcion($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_alumno,periodo,id_carrera,modalidad) VALUES (:id_alumno, :periodo, :id_carrera, :modalidad)");

       // var_dump($stmt);

		$stmt->bindParam(":id_alumno", $datos["id_alumno"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);
        $stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);
        $stmt->bindParam(":modalidad", $datos["modalidad"], PDO::PARAM_STR);
	
		
    

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error22";
        }


        $stmt = null;


        
    }

    static public function mdlMostrarInscripcion($tabla, $item, $valor)
    {

        if ($item != null) { //selecconar un item en especifico

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

            $stmt->execute();

            return $stmt->fetchAll(); ///devolvemos todos los item

        }

        $stmt = null;
    }



}
