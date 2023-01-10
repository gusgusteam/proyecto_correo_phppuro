/*=============================================
    EDITAR REPARTIDORES/* 
=============================================*/

$(".tablas").on("click", ".btnEditarRepartidor", function () {
  var idRepartidor = $(this).attr("idRepartidor");
  //console.log("idRepartidor", idRepartidor);

  var datos = new FormData();
  datos.append("idRepartidor",idRepartidor);

  $.ajax({
    url:"ajax/repartidores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
      //console.log("respuesta",respuesta);

      $("#idRepartidor").val(respuesta["id"]);
      $("#editarRepartidor").val(respuesta["nombre"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarZona").val(respuesta["zona"]);
    

     }

  })


});


/*=============================================
ELIMINAR REPARTIDOR
=============================================*/
$(".tablas").on("click", ".btnEliminarRepartidor", function(){

	var idRepartidor = $(this).attr("idRepartidor");

  //console.log("idRepartidor",idRepartidor);
  swal({
    title: '¿Está seguro de borrar el repartidor?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar cliente!'
  }).then(function(result){
    if (result.value) {
      
        window.location = "index.php?ruta=repartidores&idRepartidor="+idRepartidor;
    }

})
	


})

