<?php

class ControladorRepartidores{

/*=============================================
    CREAR REPARTIDORES
=============================================*/

public static function ctrCrearRepartidor()  { 

    if (isset($_POST["nuevoRepartidor"])) {

        if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRepartidor"]) &&
            preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])) {

            $tabla = "repartidores";

            $datos = array("nombre" => $_POST["nuevoRepartidor"],
                "telefono" => $_POST["nuevoTelefono"],
                "zona" => $_POST["nuevaZona"]);

            $respuesta = ModeloRepartidores::mdlIngresarRepartidor($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                    type: "success",
                    title: "El repartidor ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                                if (result.value) {

                                window.location = "repartidores";

                                }
                            })

                </script>';

            }

        } else {

            echo '<script>

                swal({
                    type: "error",
                    title: "¡El repartidor no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {

                        window.location = "repartidores";

                        }
                    })

            </script>';

        }

    }

}


/*=============================================
    MOSTRAR REPARTIDORES
=============================================*/

    public static function ctrMostrarRepartidores($item, $valor)
    {

        $tabla = "repartidores";

        $respuesta = ModeloRepartidores::mdlMostrarRepartidores($tabla, $item, $valor);
        //solicitamos una respuesta del modelo

        return $respuesta;

    }

/*=============================================
    EDITAR REPARTIDORES
=============================================*/


    public static function ctrEditarRepartidor()  { 

        if (isset($_POST["editarRepartidor"])) {
    
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRepartidor"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])) {
    
                $tabla = "repartidores";
    
                $datos = array("id"=>$_POST["idRepartidor"],
                    "nombre" => $_POST["editarRepartidor"],
                    "telefono" => $_POST["editarTelefono"],
                    "zona" => $_POST["editarZona"]);
    
                $respuesta = ModeloRepartidores::mdlEditarRepartidor($tabla, $datos);
    
                if ($respuesta == "ok") {
    
                    echo '<script>
    
                    swal({
                        type: "success",
                        title: "El repartidor ha sido cambiado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {
    
                                    window.location = "repartidores";
    
                                    }
                                })
    
                    </script>';
    
                }
    
            } else {
    
                echo '<script>
    
                    swal({
                        type: "error",
                        title: "¡El repartidor no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
    
                            window.location = "repartidores";
    
                            }
                        })
    
                </script>';
    
            }
    
        }
    
    }

    /*=============================================
	ELIMINAR REPARTIDOR
	=============================================*/

	static public function ctrEliminarRepartidor(){

		if(isset($_GET["idRepartidor"])){

			$tabla ="repartidores";
			$datos = $_GET["idRepartidor"];

			$respuesta = ModeloRepartidores::mdlEliminarRepartidor($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El repartidor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "repartidores";

								}
							})

				</script>';

			}		

		}

	}

    



}