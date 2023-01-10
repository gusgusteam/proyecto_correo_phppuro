<?php

//requerimos archivos;
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class AjaxProductos{
 /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
 //recibodesdejs en una variablle publica:
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){

    $item = "id_categoria";
    $valor = $this->idCategoria;

    $respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

    echo json_encode($respuesta);


  }

 /*=============================================
  EDITAR PRODUCTO   
  =============================================*/ 

   // recibo en una variable publica
   public $idProducto;
  

   public function ajaxEditarProducto(){

      $item = "id";
      $valor = $this->idProducto;

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

      echo json_encode($respuesta);

    

  }







}

///////////////////////////////////////OBJETOS  A CREAR /////////////////////////////////////

/*=============================================
  CREOEL OBJETO PARA  RECIVIR LA VARIABLE  POST
  =============================================*/

if(isset($_POST["idCategoria"])){
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto ->ajaxCrearCodigoProducto();
}

/*=============================================
  CREOEL OBJETO PARA  RECIVIR LA VARIABLE  POST
  =============================================*/

  IF(isset($_POST["idProducto"])){
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();//ejecutamos metodo
  }

