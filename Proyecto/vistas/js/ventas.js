/*=============================================
CARGAR LA TABLA DINAMICAMENTE DE VENTAS
=============================================*/

//probando la carga desde ajax:

$.ajax({
  url: "ajax/datatable-ventas.ajax.php",
  success: function (respuesta) {
    // console.log("respuesta", respuesta);
  },
});

$(".tablaVentas").DataTable({
  ajax: "ajax/datatable-ventas.ajax.php",
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
AGREGANDO PRODUCTO A LA VENTA DESDE LA TABLA 
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function () {
  //capturamos el id del producto

  var idProducto = $(this).attr("idProducto");
  console.log("idProducto", idProducto);

  // desactivar botton cuando agregamos
  $(this).removeClass("btn-primary agregarProducto"); //removemos
  $(this).addClass("btn-default"); //adicionamos

  //pedir ajax trae listado q pertenesca sola a ese id
  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php", // reutilizo el archivo productos,ajax
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("respuesta", respuesta);

      //almacenar en variables los datos a usar:
      var categoria = respuesta["categoria"];
      var nombre = respuesta["nombre"];
      var stock = respuesta["stock"];
      var precio = respuesta["precio"];

      //EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTE EN CERO

      if (stock == 0) {
        swal({
          title: "No hay producto disponible por el momento",
          type: "error",
          confirmButtonText: "¡Cerrar!",
        });

        $("button[idProducto='" + idProducto + "']").addClass(
          "btn-primary agregarProducto"
        );

        return;
      }

      ///////////////////////////////////////////////////////////////////////////

      $(".nuevoProducto").append(
        '<div class="row" style="padding:5px 15px">' +
          "<!--  producto -->" +
          '<div class="col-xs-6" style="padding-right:0px">' +
          "<label>Producto:</label>" +
          '<div class="input-group">' +
          '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' +
          idProducto +
          '"><i class="fa fa-times"></i></button></span>' +
          '<input type="text" class="form-control nuevaDescripcionProducto " idProducto="' +
          idProducto +
          '"  name="agregarProducto" value="' +
          nombre +
          '" readonly required>' +
          '<input type="hidden" class="form-control nuevaDescripcioncategoria " idProducto="' +
          idProducto +
          '"  name="agregarProducto" value="' +
          categoria +
          '" readonly required>' +
          "</div>" +
          "</div>" +
          "<!-- Cantidad del producto -->" +
          '<div class="col-xs-3">' +
          "<label>Cantidad:</label>" +
          '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="' +
          stock +
          '" nuevoStock="' +
          Number(stock - 1) +
          '" required>' +
          "</div>" +
          "<!-- Precio del producto -->" +
          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +
          "<label>Precio:</label>" +
          '<div class="input-group">' +
          '<span class="input-group-addon"><i class="fa fa-cc-diners-club"></i></span>' +
          '<input type="text" class="form-control nuevoPrecioProducto" precioReal="' +
          precio +
          '" name="nuevoPrecioProducto" value="' +
          precio +
          '" readonly required>' +
          "</div>" +
          "</div>" +
          "</div>"
      );

      //SUMAR TOTAL DE PRECIO(function creada)
      sumarTotalPrecios();
      //agregardescuento
      agregarDescuento();
    },
  });
});

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA ()
=============================================*/

$(".tablaVentas").on("draw.dt", function () {
  //draw.dt s usa para navegar en datatable(dibujar)y hacer la tarea que uno le coloque
  //console.log("tabla");

  if (localStorage.getItem("quitarProducto") != null) {
    var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto")); // convertido en un datos json

    for (var i = 0; i < listaIdProductos.length; i++) {
      //recorrido como si fuera un arrays

      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).removeClass("btn-default");
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).addClass("btn-primary agregarProducto");
    }
  }
});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN X
=============================================*/

var idQuitarProducto = []; //creamos arrays vacio
localStorage.removeItem["quitarProducto"]; // se eliman el item cada vej que carga la pagina

$(".formularioVenta").on("click", "button.quitarProducto", function () {
  $(this).parent().parent().parent().parent().remove();

  //capturo id para recuperar botton cuando elimino producto x
  var idProducto = $(this).attr("idProducto");
  // console.log("idProducto",idProducto);
  //almacenar en el LOCALSTORAGE el id del producto a quitar
  if (localStorage.getItem("quitarProducto") == null) {
    //no exist o no tiene informacion

    idQuitarProducto = [];
  } else {
    // si viene con informacion

    idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
  }

  idQuitarProducto.push({ idProducto: idProducto });

  localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass(
    "btn-default"
  );
  $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass(
    "btn-primary agregarProducto"
  );

  if ($(".nuevoProducto").children().length == 0) {
    $("#nuevoTotalVenta").val(0);
  } else {
    //SUMAR TOTAL DE PRECIO(function creada)
    sumarTotalPrecios();
    //agregardescuento
    agregarDescuento();
  }
});

/*=============================================
MODIFICAR CANTIDAD(por cada producto)
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function () {
  //cambio del input

  var precio = $(this)
    .parent()
    .parent()
    .children(".ingresoPrecio")
    .children()
    .children(".nuevoPrecioProducto");

  var precioFinal = $(this).val() * precio.attr("precioReal"); //lo multiplico cada vej cambie cantidad

  precio.val(precioFinal);
  //console.log("precioFinal", precioFinal);
  //console.log("$(this).val()", $(this).val()); //sacando el value de la cantidad cuando cambia
  //console.log("precio", precio.val()); //ver el value del precio que viene

  if (Number($(this).val()) > Number($(this).attr("stock"))) {
    //coloco Number para compare como numero y no como string

    /*=============================================
			SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
			=============================================*/
    $(this).val(1); //volver el val a 1 para que sepa que tiene q volver a elegir cantidad
    var precioFinal = $(this).val() * precio.attr("precioReal");

    precio.val(precioFinal);

    sumarTotalPrecios(); // para sumar de nuevo cada uno de los precios

    swal({
      title: "La cantidad supera el Stock existente",
      text: "¡Sólo hay " + $(this).attr("stock") + " unidades!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    return;
  }
  //SUMAR TOTAL DE PRECIO(function creada)
  sumarTotalPrecios();

  //agregardescuento
  agregarDescuento();
});

/*=============================================
SUMAR TODOS LOS PRECIOS (creamos una funcion)
=============================================*/

function sumarTotalPrecios() {
  var precioItem = $(".nuevoPrecioProducto");
  var arraySumaPrecio = []; //pa ir metiendo  precio de cada producto (push)

  //console.log("precioItem123", precioItem.val());
  //hacemos un recorrido ya que se creo el array que almacena todas las clases precioItem
  for (i = 0; i < precioItem.length; i++) {
    arraySumaPrecio.push(Number($(precioItem[i]).val())); //capturamos (se nesecita sumar numeros en el arrays y colocamos Number par poder hacer la suma)
  }
  //console.log("arraySumaPrecio", arraySumaPrecio);
  function sumaArrayPrecios(total, numero) {
    //para sumar los indice de un mismo array

    return total + numero;
  }

  var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios); //El método reduce() aplica una función a un acumulador y a cada valor de una array (de izquierda a derecha) para reducirlo a un único valor.
  //console.log("sumaTotalPrecio", sumaTotalPrecio);
  $("#nuevoTotalVenta").val(sumaTotalPrecio); //coloco la sumaTotalPrecio(al input)
  $("#totalVenta").val(sumaTotalPrecio);
  $("#nuevoTotalVenta").attr("total", sumaTotalPrecio);
}

/*=============================================
DESCUENTO(input ingreso de descuento)
=============================================*/

function agregarDescuento() {
  var descuento = $("#nuevoDescuento").val(); //capturamos su value

  var totaConDelivery = $("#nuevoTotalVenta").attr("total");

  //  console.log("totaConDelivery",totaConDelivery);

  var delivery = $("#nuevoCostoD").val();

  //  console.log("delivery",delivery);

  // OPERACIONES:

  var precioDescuento = Number(totaConDelivery) - descuento;

  var precioDescuentoT = Number(precioDescuento) + Number(delivery);

  //  console.log("precioDescuento",precioDescuento);
  //  console.log("precioDescuentoT",precioDescuentoT);

  var totalConDescuento = Number(totaConDelivery) - Number(precioDescuento);

  //  console.log("totalConDescuento",totalConDescuento);

  // ASIGNANDO LAS NUEVAS VARIABLES

  $("#nuevoTotalVenta").val(precioDescuentoT);

  $("#nuevoPrecioNeto").val(totaConDelivery);

  var totaConDelivery = Number(precioDescuento) + Number(delivery);

  //  console.log("totaConDelivery",totaConDelivery);
}

/*=============================================
  CUANDO CAMBIA EL DESCUENTO
=============================================*/

$("#nuevoDescuento").change(function () {
  agregarDescuento();
});

/*=============================================
SELECT PARA INPUT (input : precio total delibery)
=============================================*/

$("#nuevoMetodoPagoo").change(function () {
  //capturo value del select
  var metodo = $(this).val();
  // console.log("metodo1", metodo);

  if (metodo == "Costo") {
    $(this).parent().parent().removeClass("col-xs-10");

    $(this).parent().parent().addClass("col-xs-6");

    $(this)
      .parent()
      .parent()
      .parent()
      .children(".cajasMetodoPago")
      .html(
        '<div class="col-xs-6">' +
          "<label>Monto envio:</label>" +
          '<div class="input-group">' +
          '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
          '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="0000" required>' +
          "</div>" +
          "</div>"
      );
  }
});

/*=============================================
COSTO EN EFECTIVO (delibery)  acuerdo al negocio
=============================================*/

$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function () {
  var efectivo = $(this).val();
  //console.log("efectivo", efectivo);
  $("#nuevoCostoD").val(efectivo);

  agregarDescuento(); //funcion descuento
});
