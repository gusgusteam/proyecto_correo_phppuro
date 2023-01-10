<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear venta

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

    </ol>

  </section>


  <section class="content">

    <div class="row">

      <!-- EL FORMULARIO -->


      <div class="col-lg-5 col-xs-12">


        <div class="box box-success">

          <form role="form" method="post" class="formularioVenta ">

            <div class="box-body">

              <div class="box">


                <!--=====================================
                  ENTRADA DEL VENDEDOR
                ======================================-->

                <div class="form-group">

                  <label for="nombre">Vendedor:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                    <!--id oculto el que vamos almacenar-->

                  </div>

                </div>
                 <!--=====================================
                ENTRADA DEL CONDUCTOR
                ======================================-->
               
                <div class="form-group">

                  <label for="nombre">Buscar conductor por:</label>
                  
                  <div class="input-group ">
                    
                    <span class="input-group-addon"><i class="fa fa-motorcycle"></i></span>
                    
                    <select class="form-control select2" id="seleccionarconductor" name="seleccionarconductor" required>

                    <option value="">=== Nombre ó Telefono ===</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $conductor= ControladorRepartidores::ctrMostrarRepartidores($item,$valor);
                      foreach ($conductor as $key => $value) {

                        echo


                        ' <optgroup label="Datos del Cliente:">
                          <option  value="' . $value["id"] . '">' . $value["nombre"] . '==', $value["telefono"] . '</option>
                          
                          </optgroup>
                          
                          ';
                      }

                    ?>

                    </select>
                    
                  </div>
              

                </div>


                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->
                
               
                <div class="form-group">

                  <label for="nombre">Buscar cliente por:</label>
                  
                  <div class="input-group ">
                    
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control select2" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">===Nombre ó Telefono ===</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                      foreach ($clientes as $key => $value) {

                        echo


                        ' <optgroup label="Datos del Cliente:">
                          <option  value="' . $value["id"] . '">' . $value["nombre"] . '==', $value["telefono"] . '</option>
                          
                          </optgroup>
                          
                          ';
                      }

                    ?>

                    </select>
                    
                  
                  </div>
               
                  
                  <!--=====================================
                  BOTON AGREGAR NUEVO CLIENTE     
                  ======================================-->

                  <br>
                  <label for="nombre">Agregar cliente nuevo:</label>

                  <!-- <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs"  data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span> -->
                  <button type="button" class="btn btn-info custom" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar</button>


                </div>

               



                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO anexo mediante append dentro clase nuevoProducto
                ======================================-->

                <div class="form-group row nuevoProducto">


                </div>


                <input type="hidden" id="listaProductos" name="listaProductos">
                <!--para almacenar -->

              

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>



                <div class="row">

                  <!--=====================================
                  ENTRADA TOTAL (de un producto o varios)
                  ======================================-->

                  <div class="col-lg-8 col-xs-12  pull-right">


                    <table class="table">

                      <thead>


                        <tr>
                          <th>Descuento</th>
                          <th>Total en BS:</th>
                        </tr>

                      </thead>

                      <tbody>


                        <tr>

                          <td style="width: 50%">

                            <div class="input-group">

                              <input type="number" class="form-control input-lg" min="0" id="nuevoDescuento" name="nuevoDescuento" step="any" placeholder="0">
                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-cc-diners-club"></i></span>

                            </div>

                          </td>


                          <td style="width: 60%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-cc-diners-club"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" readonly required>
                              <input type="hidden" name="totalVenta" id="totalVenta">

                            </div>

                          </td>



                        </tr>



                      </tbody>


                    </table>


                  </div>


                </div>

                <hr>


              </div>

              <!--=====================================
                ENTRADA COSTO DELIBERY
              ======================================-->
              <div class="form-group row">

                <div class="col-xs-10" style="padding-right:5px">
                  <label>Delivery:</label>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>

                    <select class="form-control" id="nuevoMetodoPagoo" name="nuevoMetodoPagoo">
                      <option value="">Delivery</option>
                      <option value="Costo"> Monto </option>

                    </select>

                  </div>

                </div>
                <div class="cajasMetodoPago"></div>
                <input type="hidden" class="form-control input-lg" id="nuevoCostoD" name="nuevoCostoD">

              </div>

              <!--=====================================
              ENTRADA TIPO PAGO
              ======================================-->
              <div class="form-group row">

                <div class="col-xs-10" style="padding-right:0px">
                  <label>Tipo de Pago:</label>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>

                    <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" onchange="listarMetodos();" required>
                      <option value="">Seleccionar tipo de pago</option>
                      <option value="EFECTIVO">===> Efectivo</option>
                      <option value="POR COBRAR">===> Por Cobrar</option>
                      <option value="TRANSFERENCIA">===> Transferencia</option>
                      <option value="CORTESIA">===> Cortesia</option>
                      <option value="BAJA">===> Bajas</option>
                    </select>

                  </div>

                </div>

                <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">


              </div>


              <!--=====================================
              TIPO DE ENVIO (domicilio ; tienda)
              ======================================-->

              <div class="form-group row">

                <div class="col-xs-10" style="padding-right:0px">
                  <label>Tipo Entrega:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-taxi"></i></span>

                   
                    <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" onchange="listarTipoEntrega();" required>
                      <option value="">Seleccionar tipo de entrega</option>
                      <option value="TIENDA">===> Tienda</option>
                      <option value="DOMICILIO">===> Domicilio</option>
                    </select>

                  </div>

                </div>


              </div>


            </div>

            <!--=====================================
            ELEGIR FECHAS
            ======================================-->

            <div class="col-lg-12 col-md-10 col-sm-6 col-xs-12">
              <label>Fecha Entrega:</label>

              <input type="date" name="fechaReserva" id="fechaReserva" required onchange="diaSemana();" style="width:45%">

            </div>

            <hr>


           

            <!--=====================================
                ELEGIR HORA
            ======================================-->


            <div class="col-md-12 col-sm-6 col-xs-12">
              <label>Hora de Entrega:</label>
              <input list="browsers" name="limitetiempo" id="limitetiempo" list="listalimitestiempo" placeholder="ELEGIR HORA" style="width:43%">
              <datalist id="browsers">
                <option value="08:00">
                <option value="08:30">
                <option value="09:00">
                <option value="09:30">
                <option value="09:40">
                <option value="10:00">
                <option value="10:30">
                <option value="10:40">
                <option value="11:00">
                <option value="11:30">
                <option value="11:40">
                <option value="12:00">
                <option value="12:30">
                <option value="12:40">
                <option value="13:00">
                <option value="13:30">
                <option value="13:40">
                <option value="14:00">
                <option value="14:30">
                <option value="14:40">
                <option value="15:00">
                <option value="15:30">
                <option value="15:40">
                <option value="16:00">
                <option value="16:30">
                <option value="16:40">
                <option value="17:00">
                <option value="17:30">
                <option value="17:40">
                <option value="18:00">
                <option value="18:30">
                <option value="18:40">
                <option value="19:00">

              </datalist>

            </div>

            <hr>

            <hr>


            <!--=====================================
              PIE DEL MODAL
            ======================================-->

            <div class="box-footer">

              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

            </div>

          </form>

        </div>

      </div>


      <!-- TABLA DE PRODUCTOS  USA HIDDEN PARA OCULTAR TABLA EN MODO TABLE Y CELULAR-->
      <!--=====================================
      LA TABLA DE PRODUCTOS agregar
      ======================================-->

      <div class="col-lg-7  col-md-12   col-sm-12  col-xs-12">
        <!--escritorio muestro tabla y en sm-xs oculto con hidden-->

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaVentas" style="width:100%">

              <thead>
          
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Categoria </th>
                  <th>Precio </th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>
              </thead>

            </table>


          </div>

        </div>


      </div>









    </div>




  </section>

</div>




<!--=====================================
MODAL AGREGAR CLIENTE(ventas)
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección">

              </div>

            </div>

            <!-- COORDENADAS-->

            <div class="form-group row">

              <div class="col-xs-6">
                <!-- ENTRADA LATITUD-->

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" id="latitud" name="latitud" placeholder="Ingresar Lat" required>

                </div>

              </div>

              <!-- ENTRADA LONGITUD-->

              <div class="col-xs-6">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" id="longitud" name="longitud" placeholder="Ingresar Long" required>

                </div>


              </div>


            </div>

            <!--VISTA MAPA-->

            <div class="form-group row">

              <div class="col-xs-6">

                <div id="mapa" style="width: 200%; height: 400px;"></div>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary custom">Guardar cliente</button>

        </div>

      </form>
      <br>
      <div class="row">

        <div class="col-md-8"></div>
        <div class="col-md-2">
          <button id="cargarcoordenadas" class="btn btn-primary">Cargar coordenadas</button>
        </div>

      </div>

      <br>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();

      ?>

    </div>

  </div>

</div>



<!--SCRIPT DEL MAPA INICIAR, MARCADOR-->

<script>
  /////////////////////////////////////////////
  $("#cargarcoordenadas").click(function() {
    var latitud = $("#latitud").val();
    var longitud = $("#longitud").val();
    coordenadas = {
      lng: longitud,
      lat: latitud
    }

    generarMapa(coordenadas);

  });


  /////////////////////////////////////////////

  function iniciarMapa() {
    var latitud = -17.79217025974373;
    var longitud = -63.095641525390626;

    coordenadas = {
      lng: longitud,
      lat: latitud
    }

    generarMapa(coordenadas);

  }

  ///////////////////////////////////////////

  function generarMapa(coordenadas) {

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 12,
      center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

    var mapa2 = new google.maps.Map(document.getElementById('mapa2'), {
      zoom: 12,
      center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

    marcador = new google.maps.Marker({
      map: mapa,
      draggable: true,
      position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

    marcador = new google.maps.Marker({
      map: mapa2,
      draggable: true,
      position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });




    marcador.addListener('dragend', function(event) {
      document.getElementById("latitud").value = this.getPosition().lat();
      document.getElementById("longitud").value = this.getPosition().lng();

    })

  }
</script>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQASVKSNH9d6hns7dU-imN9cYts5oPvUg&callback=iniciarMapa">
</script>

