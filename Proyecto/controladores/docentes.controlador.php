<?php

class ControladorDocentes
{

    /*=============================================
    CREAR DOCENTE
    =============================================*/

    public static function ctrCrearDocente()
    {

        if (isset($_POST["nuevoCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])) {

                $tabla = "docente";

                $datos = array("nombre" => $_POST["nuevoCliente"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "edad" => $_POST["nuevaEdad"],
                    "direccion" => $_POST["nuevaDireccion"],
                    "correo" => $_POST["nuevoCorreo"],
                    "log" => $_POST["longitud"],
                    "lnt" => $_POST["latitud"]);

                $respuesta = ModeloDocentes::mdlIngresarDocente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El docente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "docente";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El docente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "docente";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    CREAR CLIENTES(para pedidos)
    =============================================*/

    public static function ctrCrearClientePedido()
    {

        if (isset($_POST["nuevoCliente"])) {

            // if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
            //    preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
            //    preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])){

            $tabla = "alumno";

            $datos = array("nombre" => $_POST["nuevoCliente"],
                "telefono" => $_POST["nuevoTelefono"],
                "direccion" => $_POST["nuevaDireccion"]);

            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "crear-venta";

									}
								})

					</script>';

            }

            // }else{

            //     echo'<script>

            //         swal({
            //               type: "error",
            //               title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
            //               showConfirmButton: true,
            //               confirmButtonText: "Cerrar"
            //               }).then(function(result){
            //                 if (result.value) {

            //                 window.location = "crear-venta";

            //                 }
            //             })

            //       </script>';

            // }

        }

    }

    /*=============================================
    MOSTRAR CLIENTES
    =============================================*/

    public static function ctrMostrarDocentes($item, $valor)
    {

        $tabla = "docente";

        $respuesta = ModeloDocentes::mdlMostrarDocente($tabla, $item, $valor);
        //solicitamos una respuesta del modelo

        return $respuesta;

    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public static function ctrEditarDocente()
    {

        if (isset($_POST["editarCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])) {

                $tabla = "docente";

                $datos = array("id" => $_POST["idCliente"],
                    "nombre" => $_POST["editarCliente"],
                    "edad" => $_POST["editarEdad"],
                    "telefono" => $_POST["editarTelefono"],
                    "direccion" => $_POST["editarDireccion"],
                    "correo" => $_POST["editarCorreo"],
                    "log" => $_POST["Editarlongitud"],
                    "lnt" => $_POST["Editarlatitud"]);

                $respuesta = ModeloDocentes::mdlEditarDocente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El docente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "docente";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El docente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "docente";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarDocente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "docente";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloDocentes::mdlEliminarDocente($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El docente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "docente";

								}
							})

				</script>';

            }

        }

    }

}
