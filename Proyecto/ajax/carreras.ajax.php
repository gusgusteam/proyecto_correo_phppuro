<?php

require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";

//CREAMOS LA CLASE

class AjaxMovimientos{

    /*=============================================
	EDITAR TIPO MOVIMIENTO
	=============================================*/	

    public $idTipo; //propiedad publica

    public function ajaxEditarMovimiento(){
      
        $item = "id";// para busque coincidencia
        $valor = $this->idTipo; // propieda
      
      //solicitamos una respuesta
      $respuesta = ControladorMovimientos::ctrMostrarTipoMov($item,$valor);

      echo json_encode($respuesta); // para que nos reciba javascript


    }


}


    /*=============================================
	   EDIDTAR TIPO MOVIMIENTO(OBJETO)
	=============================================*/	

    if(isset($_POST["idTipo"])){ //si viene la variable post idTipoMov entoncej se ejeucta instancia ala clase

     $movimientos = new AjaxMovimientos(); //instancia clases
     $movimientos -> idTipo = $_POST["idTipo"]; //ala propiedad publica agregamos el valor que viene el variable post
     $movimientos -> ajaxEditarMovimiento(); //ejecutamos el metodo
     

     
    }
       