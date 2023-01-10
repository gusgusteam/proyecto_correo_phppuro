<?php

require_once "conexion.php";

class  ModeloRol{
/*=============================================
	MOSTRAR ROLES
=============================================*/

static public function mdlMostrarRol($tabla,$item,$valor){
   
    if($item != null){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

    }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

        $stmt -> execute();

        return $stmt -> fetchAll();

    }



    $stmt = null;

}




}