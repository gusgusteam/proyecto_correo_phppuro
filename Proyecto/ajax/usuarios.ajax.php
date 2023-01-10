<?php

//requeiro los archivos de nuevo :

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";



//CREAMOS UNA CLASE
class AjaxUsuarios{

/*=============================================
EDITAR USUARIOS
=============================================*/

//propiedad publica: para recojer el idUsuario
public $idUsuario; // que me va a mandar js
//recojo el valor a travej de un metodo

public function ajaxEditarUsuario(){

    $item = "id";
    $valor = $this -> idUsuario;

    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item,$valor);

    echo json_encode($respuesta);



}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

    //creo dos propiedades publicas que vendran de las variables pos ActivarId ,activarUsuario  del archivo usuario.js
    public $activarId;
    public $activarUsuario;
    //creamos un metodo ajax
    public function ajaxActivarUsuario(){

        $tabla = "usuario";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);



    }


	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

	$item = "usuarios";
    $valor = $this -> validarUsuario;

    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item,$valor);

    echo json_encode($respuesta);



	}





}

/*=============================================
creamos el objeto:EDITAR USUARIOS
=============================================*/

if(isset($_POST["idUsuario"])){
$editar = new AjaxUsuarios();
$editar -> idUsuario = $_POST["idUsuario"];
$editar -> ajaxEditarUsuario(); //ejecumatos el metodo
}

/*=============================================
creamos el objeto:para activar el usuario 
los que van a recivir esas variables post

=============================================*/

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset($_POST["validarUsuario"])){

$valUsuario = new AjaxUsuarios();
$valUsuario -> validarUsuario = $_POST["validarUsuario"];
$valUsuario -> ajaxValidarUsuario();




}