<?php

class ControladorInscripcion
{

  /*========================
     CREAR TIPO INSCRIPCION
    =======================*/

  static public function ctrCrearInscripcion()
  {

    //si vienen una variable post nuevoTipoMov es porq se va crear un nuevo tipo movimiento

    if (isset($_POST["nuevoCodigo"])) {
        
			//var_dump($_POST["nuevoCodigo"]);
        
        //enviar informacion al modelo
        $tabla = "inscripcion";

        $datos = array(
          "id_alumno" => $_POST["seleccionarAlumno"],
          "periodo" => $_POST["nuevoCodigo"],
          "id_carrera" => $_POST["seleccionarCarr"],
          "modalidad" => $_POST["listaMetodoPago"]
        );
      //var_dump($datos);

        $respuesta = ModeloTipoInscripcion::mdlIngresarInscripcion($tabla, $datos);
        var_dump($respuesta);

        if ($respuesta == "ok") {
            
          echo '<script>

                swal({
                      type: "success",
                      title: "Nueva iscripcion ha sido guardada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "inscripcion";

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

  static public function ctrMostrarInscripcion($item, $valor)
  {

    $tabla = "inscripcion";
    //respuesta que nos traiga de modelo
    $respuesta = ModeloTipoInscripcion::mdlMostrarInscripcion($tabla, $item, $valor);

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
