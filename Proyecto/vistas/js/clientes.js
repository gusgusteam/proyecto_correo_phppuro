/*=============================================
EDITAR ALUMNO
=============================================*/
$(".tablas").on("click", ".btnEditarAlumno", function () {
  var idCliente = $(this).attr("idCliente");
 console.log("idCliente",idCliente);

  ////CARGA CON LAS COORDENADAS DE LA BASE DE DATOS///

  var latitud = $("#Editarlatitud").val();
  var longitud = $("#Editarlongitud").val();
  coordenadas = {
    lng: longitud,
    lat: latitud,
  };

  generarMapa(coordenadas);

  ///////////////////////////////////////////////////////

  var datos = new FormData();
  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta",respuesta);

      $("#idCliente").val(respuesta["id"]); //para saber que id editar
      $("#editarCliente").val(respuesta["nombre"]);
      $("#editarEdad").val(respuesta["edad"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarDireccion").val(respuesta["direccion"]);
      $("#Editarlatitud").val(respuesta["lnt"]);
      $("#Editarlongitud").val(respuesta["log"]);
    },
  });
});

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function () {
  var idCliente = $(this).attr("idCliente");
  //console.log("idCliente", idCliente);
  swal({
    title: "¿Está seguro de borrar el estudiante?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar estudiante!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=alumnos&idCliente=" + idCliente;
    }
  });
});
