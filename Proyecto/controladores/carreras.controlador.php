<?php

class ControladorMovimientos
{

  /*========================
     CREAR TIPO MOVIMIENTOS
    =======================*/

  static public function ctrCrearTipoMov()
  {

    //si vienen una variable post nuevoTipoMov es porq se va crear un nuevo tipo movimiento

    if (isset($_POST["nuevoTipoMov"])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipoMov"])) {

        //enviar informacion al modelo
        $tabla = "carrera";

        $datos = array(
          "Codigo" => $_POST["nuevoCodigo"],
          "nombre" => $_POST["nuevoTipoMov"],
          "descripcion" => $_POST["nuevaDescripcion"]
        );


        $respuesta = ModeloTipoMovimiento::mdlIngresarTipoM($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

                swal({
                      type: "success",
                      title: "Nueva carrera ha sido guardada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "carreras";

                                }
                            })

                </script>';
        }
      } else {

        echo '<script>

                swal({
                      type: "error",
                      title: "¡El nuevo Tipo movimiento no puede ir vacía o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "tipo-movimiento";

                        }
                    })

              </script>';
      }
    }
  }



  /*========================
    MOSTRAR TIPO MOVIMIENTOS
    =======================*/

  // funcion que recibe parametros

  static public function ctrMostrarTipoMov($item, $valor)
  {

    $tabla = "carrera";
    //respuesta que nos traiga de modelo
    $respuesta = ModeloTipoMovimiento::mdlMostrarTipoMov($tabla, $item, $valor);

    return $respuesta;
  }




  /*========================
    EDITAR TIPO DE MOVIMIENTO
    =======================*/

  static public function ctrEditarTipoMov()
  {

    //si vienen una variable post nuevaUnidada es porq se va crear una nueva unidada

    if (isset($_POST["editarTipoMov"])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipoMov"])) {

        //enviar informacion al modelo
        $tabla = "carrera";

        $datos = array(
          "nombre" => $_POST["editarTipoMov"],
          "descripcion" => $_POST["editarDescripcion"],
          "id" => $_POST["idTipo"]
        );


        $respuesta = ModeloTipoMovimiento::mdlEditarTipoMov($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

                swal({
                      type: "success",
                      title: "El tipo movimiento ha sido cambiada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "tipo-movimiento";

                                }
                            })

                </script>';
        }
      } else {

        echo '<script>

                swal({
                      type: "error",
                      title: "¡El tipo movimiento no puede ir vacía o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "tipo-movimiento";

                        }
                    })

              </script>';
      }
    }
  }


  /*========================
    BORRAR TIPO MOVIMIENTO
  =======================*/

  static public function ctrBorrarTipoMov()
  {

    if (isset($_GET["idTipo"])) { //reciviendo variable get 

      $tabla = "carrera";
      $datos = $_GET["idTipo"];

      $respuesta = ModeloTipoMovimiento::mdlBorrarTipoMov($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

					swal({
						  type: "success",
						  title: "El tipo movimiento ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-movimiento";

									}
								})

					</script>';
      }
    }
  }
}
