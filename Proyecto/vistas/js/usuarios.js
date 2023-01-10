/*=============================================
EDITAR USUARIO   
/* linea cogido para ver en consola:*/

/*console.log("idUsuario"  , idUsuario) 
=============================================*/

$(document).on("click", "button.btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	console.log("idUsuario",idUsuario);
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
      //console.log("respuesta",respuesta);
  
    var datosRoles = new FormData();
    datosRoles.append("idRol",respuesta["id_rol"]);

    $.ajax({
      url: "ajax/roles.ajax.php",
      method: "POST",
      data: datosRoles,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log("respuesta", respuesta);
        $("#seleccionarRol").html(respuesta["nombre"]);
        $("#seleccionarRol").val(respuesta["id"]);


      },
    });

	  $("#passwordActual").val(respuesta["password"]);
    $("#editarNombre").val(respuesta["nombre"]);
    $("#editarUsuario").val(respuesta["usuarios"]);
    

		}

	})

})
/*=============================================
    ACTIVAR USUARIO/* 
=============================================*/

$(".tablas").on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        swal({
          title: "El usuario ha sido actualizado",
          type: "success",
          confirmButtonText: "¡Cerrar!",
        }).then(function (result) {
          if (result.value) {
            window.location = "usuarios";
          }
        });
      }
    },
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoUsuario", 0);
  }
});

/*=============================================
    REVISAR SI EL USUARIO ESTA REGISTRADO/* 
=============================================*/

$("#nuevoUsuario").change(function () {
  $(".alert").remove();
  //capturar usuario que se esta escribiendo
  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta", respuesta);

      if (respuesta) {
        $("#nuevoUsuario")
          .parent()
          .after(
            '<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>'
          );

        $("#nuevoUsuario").val("");
      }
    },
  });
});

/*=============================================
    ELIMINAR USUARIO/* 
=============================================*/

$(".tablas").on("click", ".btnEliminarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");
  var usuario = $(this).attr("usuario");

  console.log("idUsuario", idUsuario);

  swal({
    title: "¿Está seguro de borrar el usuario?",
    Text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=usuarios&idUsuario=" +
        idUsuario +
        "&usuario=" +
        usuario;
    }
  });
});
