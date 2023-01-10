/*=============================================
EDITAR TIPO MOVIMIENTO
=============================================*/

$(".tablas").on("click", ".btnEditarTipoMov", function () {

	var idTipo = $(this).attr("idTipo");
	console.log("idTipo", idTipo);

	var datos = new FormData();
	datos.append("idTipo", idTipo);

	$.ajax({
		url: "ajax/carreras.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			//console.log("respuesta", respuesta);

			$("#idTipo").val(respuesta["id"]);
			$("#editarTipoMov").val(respuesta["nombre"]);
			$("#editarDescripcion").val(respuesta["descripcion"]);



		}

	})


})





/*=============================================
ELIMINAR TIPO MOVIMIENTO
=============================================*/

$(".tablas").on("click", ".btnEliminarTipoMov", function(){

    var idTipo = $(this).attr("idTipo");

	console.log("idTipo",idTipo);

    swal({
        title: '¿Está seguro de borrar el tipo movimiento?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tipo movimiento!'
    }).then(function(result){

        if(result.value){

         window.location = "index.php?ruta=tipo-movimiento&idTipo="+idTipo; //variable get en controlador va esta esperando esa variable

        }

    })

})