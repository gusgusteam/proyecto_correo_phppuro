<?php

class ControladorClientes
{

    /*=============================================
    CREAR CLIENTES
    =============================================*/

    public static function ctrCrearCliente()
    {

        if (isset($_POST["nuevoCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])) {

                $tabla = "alumno";

                $datos = array("nombre" => $_POST["nuevoCliente"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "edad" => $_POST["nuevaEdad"],
                    "direccion" => $_POST["nuevaDireccion"],
                    "log" => $_POST["longitud"],
                    "lnt" => $_POST["latitud"]);

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El alumno ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "alumnos";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "alumnos";

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

    public static function ctrMostrarClientes($item, $valor)
    {

        $tabla = "alumno";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        //solicitamos una respuesta del modelo

        return $respuesta;

    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public static function ctrEditarCliente()
    {

        if (isset($_POST["editarCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])) {

                $tabla = "alumno";

                $datos = array("id" => $_POST["idCliente"],
                    "nombre" => $_POST["editarCliente"],
                    "edad" => $_POST["editarEdad"],
                    "telefono" => $_POST["editarTelefono"],
                    "direccion" => $_POST["editarDireccion"],
                    "log" => $_POST["Editarlongitud"],
                    "lnt" => $_POST["Editarlatitud"]);

                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El alumno ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "alumnos";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "alumnos";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarCliente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "alumno";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El alumno ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "alumnos";

								}
							})

				</script>';

            }

        }

    }

}
