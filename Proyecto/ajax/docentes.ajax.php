<?php

require_once "../controladores/docentes.controlador.php";
require_once "../modelos/docentes.modelo.php";

class AjaxDocentes{

/*=============================================
EDITAR CLIENTE
=============================================*/
 public $idCliente;

 public function ajaxEditarDocente(){

    $item = "id";
    $valor = $this->idCliente;

    $respuesta = ControladorDocentes::ctrMostrarDocentes($item,$valor);

    echo json_encode($respuesta);

 }




}

/*=============================================
creamos el objeto:EDITAR CLIENTES
=============================================*/

if(isset($_POST["idCliente"])){
    $Cliente = new AjaxDocentes();
    $Cliente -> idCliente= $_POST["idCliente"];
    $Cliente -> ajaxEditarDocente();
}