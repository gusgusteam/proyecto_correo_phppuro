/*=============================================
    EDITAR CATEGORIA/* 
=============================================*/

$(".tablas").on("click", ".btnEditarCategoria", function () {
  //capturamos id :
  var idCategoria = $(this).attr("idCategoria");
  // console.log("idCategoria", idCategoria);

  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta", respuesta);

      $("#editarCategoria").val(respuesta["categoria"]);
      $("#idCategoria").val(respuesta["id"]);
    },
  });
});

/*=============================================
    BORRAR CATEGORIA/* 
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function () {
  var idCategoria = $(this).attr("idCategoria");
  console.log("idCategoria", idCategoria);
  swal({
    title: "¿Está seguro de borrar la categoria?",
    Text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
    }
  });
});
