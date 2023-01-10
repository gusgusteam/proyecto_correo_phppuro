<?php
require_once "../controladores/roles.controlador.php";
require_once "../modelos/roles.modelo.php";

class AjaxRoles{

/*=============================================
EDITAR ROL
=============================================*/

public $idRol;

public function AjaxEditarRoles(){

    $item = "id";
    $valor = $this->idRol;

    $respuesta = ControladorRol::ctrMostrarRol($item, $valor);

    echo json_encode($respuesta);

}



}

/*=============================================
creamos el objeto:EDITAR ROL
=============================================*/

if(isset($_POST["idRol"])){

    $rol = new AjaxRoles();
    $rol -> idRol = $_POST["idRol"];
    $rol -> AjaxEditarRoles();
}