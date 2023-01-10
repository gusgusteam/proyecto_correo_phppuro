<?php

require_once "../controladores/repartidores.controlador.php";
require_once "../modelos/repartidores.modelo.php";


class AjaxRepartidores{
/*=======================================
EDITAR REPARTIDOR
=========================================*/

public $idRepartidor;

public function ajaxEditarRepartidor(){

    $item = "id";
    $valor = $this->idRepartidor;

    $respuesta = ControladorRepartidores::ctrMostrarRepartidores($item,$valor);

    echo json_encode($respuesta);

}



}

/*=======================================
creando el objeto para REPARTIDOR
=========================================*/

if(isset($_POST["idRepartidor"])){
$repartidor = new AjaxRepartidores();
$repartidor -> idRepartidor = $_POST["idRepartidor"];
$repartidor -> ajaxEditarRepartidor();

}
