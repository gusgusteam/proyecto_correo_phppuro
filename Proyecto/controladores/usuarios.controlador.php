<?php

//CREAMOS UNA CLASE Y UN METODO:

class ControladorUsuarios{

/*=============================================
	INGRESO DE USUARIO
=============================================*/

static public function ctrIngresoUsuario(){

if(isset($_POST["ingUsuario"])){

    if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"]) && (preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"]))){

        //creamos variables
        $tabla ="usuario";
        $item ="usuarios";
        $valor = $_POST["ingUsuario"];

        //solicitamos una respuesta
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);//tomamos los 3 parametros

        if (is_array($respuesta) && $respuesta["usuarios"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) { 
            //var_dump($respuesta["usuarios"]);
           // echo '<br><div class="alert alert-success">Bienvenido al Sistema</div>';

            if($respuesta["estado"]==1){ 

        $_SESSION["iniciarSesion"] = "ok";
        $_SESSION["id"] = $respuesta["id"];
        $_SESSION["nombre"] = $respuesta["nombre"];
        $_SESSION["usuarios"] = $respuesta["usuarios"];
        $_SESSION["id_rol"] = $respuesta["id_rol"];
/*=============================================
	REGISTRAR FECHA DEL ULTIMO LOGIN
=============================================*/
            date_default_timezone_set('America/La_Paz');
            //capturamos fechas y hora
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha.' '.$hora;

            $item1 = "ultimo_login";
            $valor1 = $fechaActual;

            $item2 = "id";
            $valor2 = $respuesta["id"];

            $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

            if($ultimoLogin == "ok"){

                echo'<script>
        
                window.location = "inicio";
                
                </script>';

            }

    }else{
        
        echo '<br>
        <div class="alert alert-danger">El usuario aún no está activado</div>';

    }

        } else {

            echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
        }

        
        

    }



}


}


/*=============================================
	REGISTRO DE USUARIO
=============================================*/

static public function ctrCrearUsuario(){

    if(isset($_POST["nuevoUsuario"])){
        //usamos pregmach para nombre para que acepte caracteres especiales
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

            $tabla = "usuario";
            
            $datos = array("nombre"=> $_POST["nuevoNombre"],
            "usuarios"=> $_POST["nuevoUsuario"],
            "password"=> $_POST["nuevoPassword"],
            "id_rol"=> $_POST["nuevoRol"]);

            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";
						}
					});
					</script>';
            }

        }else{

            echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				</script>';

        }


    }
} 


/*=============================================
	MOSTRAR USUARIOS
=============================================*/

static public function  ctrMostrarUsuario($item , $valor){ // secoinectara con el modelo
    //pasamos a este metodos parametros:
    $tabla = "usuario";

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);//tomamos los 3 parametros

    return $respuesta;

}


/*=============================================
	EDITAR DE USUARIO
=============================================*/


static public function ctrEditarUsuario(){

    if(isset($_POST["editarUsuario"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


            $tabla = "usuario";

            if($_POST["editarPassword"] != ""){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                    $encriptar = ($_POST["editarPassword"]);

                }else{

                    echo'<script>

                            swal({
                                type: "error",
                                title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if (result.value) {

                                    window.location = "usuarios";

                                    }
                                })

                        </script>';

                }

            }else{

                $encriptar = $_POST["passwordActual"];

            }

            $datos = array("nombre" => $_POST["editarNombre"],
                            "usuarios" => $_POST["editarUsuario"],
                            "password" => $encriptar,
                            "id_rol" => $_POST["seleccionarRol"],
                            );

            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "El usuario ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "usuarios";

                                }
                            })

                </script>';

            }


        }else{

            echo'<script>

                swal({
                        type: "error",
                        title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                        if (result.value) {

                        window.location = "usuarios";

                        }
                    })

                </script>';

        }

    }

}



/*=============================================
	BORRAR DE USUARIO
=============================================*/

static public function ctrBorrarUsuario(){

    if(isset($_GET["idUsuario"])){

        $tabla ="usuario";
        $datos = $_GET["idUsuario"];


        $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

        if($respuesta == "ok"){

            echo'<script>

            swal({
                    type: "success",
                    title: "El usuario ha sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                            if (result.value) {

                            window.location = "usuarios";

                            }
                        })

            </script>';

        }		

    }     

}





}