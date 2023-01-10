/*=============================================
CARGAR LA TABLA DINAMICAMENTE
=============================================*/

//probando la carga desde ajax:

// $.ajax({
//   url: "ajax/datatable-productos.ajax.php",
//   success: function (respuesta) {
//     console.log("respuesta", respuesta);
//   },
// });

$(".tablaProductos").DataTable({
  ajax: "ajax/datatable-productos.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

/*=============================================
CAPTURANDO CATEGORIA PARA ASIGNAR CODIGO
=============================================*/

$("#nuevaCategoria").change(function () {
  var idCategoria = $(this).val();

  //console.log("idCategoria",idCategoria);

  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta",respuesta);
      if (!respuesta) {
        //SI VIENE FALSO (NO VIENE NINGUNA INFORMACION)

        var nuevoCodigo = idCategoria + "01";
        $("#nuevoCodigo").val(nuevoCodigo);
      } else {
        //CASO CONTRARIO YA VIENEN CON codigo

        var nuevoCodigo = Number(respuesta["codigo"]) + 1;
        $("#nuevoCodigo").val(nuevoCodigo);
      }
    },
  });
});

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$(".nuevaImagen").change(function () {
  var imagen = this.files[0];

  /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=============================================
EDITAR PRODUCTOS
=============================================*/
$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function () {
  var idProducto = $(this).attr("idProducto");
  // console.log("idProducto",idProducto);

  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta",respuesta);

      //traemos la categoria para mostrar en productos ala cual pertenece:
      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria", respuesta["id_categoria"]);

      //solicitud ajax:
      $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log("respuesta", respuesta);

          $("#editarCategoria").val(respuesta["id"]);
          $("#editarCategoria").html(respuesta["categoria"]);
        },
      });

      $("#editarProducto").val(respuesta["nombre"]);
      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarPrecioCompra").val(respuesta["precio"]);
      $("#editarStock").val(respuesta["stock"]);

      if (respuesta["imagen"] != "") {
        $("#imagenActual").val(respuesta["imagen"]);

        $(".previsualizar").attr("src", respuesta["imagen"]);
      }
    },
  });
});

/*=============================================
ELIMINAR PRODUCTOS
=============================================*/
$(".tablaProductos tbody").on(
  "click",
  "button.btnEliminarProducto",
  function () {
    var idProducto = $(this).attr("idProducto");
    //console.log("idProducto", idProducto);
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");

    // console.log("idProducto", idProducto);
    swal({
      title: "¿Está seguro de borrar el producto?",
      text: "¡Si no lo está puede cancelar la accíón!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar producto!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=productos&idProducto=" +
          idProducto +
          "&imagen=" +
          imagen +
          "&codigo=" +
          codigo;
      }
    });
  }
);
