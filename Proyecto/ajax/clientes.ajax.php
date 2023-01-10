<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

/*=============================================
EDITAR CLIENTE
=============================================*/
 public $idCliente;

 public function ajaxEditarcliente(){

    $item = "id";
    $valor = $this->idCliente;

    $respuesta = ControladorClientes::ctrMostrarClientes($item,$valor);

    echo json_encode($respuesta);

 }




}

/*=============================================
creamos el objeto:EDITAR CLIENTES
=============================================*/

if(isset($_POST["idCliente"])){
    $Cliente = new AjaxClientes();
    $Cliente -> idCliente= $_POST["idCliente"];
    $Cliente -> ajaxEditarcliente();
}