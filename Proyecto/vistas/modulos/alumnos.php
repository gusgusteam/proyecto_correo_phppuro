<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Alumnos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Alumnos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar alumnos

        </button>

      </div>

      <div class="box-body">

        <table id="example" class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Edad</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Ubicacion(Lat)</th>
              <th>Ubicaion(lng)</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            //var_dump($clientes); 

            foreach ($clientes as $key => $value) {

              echo '   <tr>

            <td>' . ($key + 1) . '</td>
            <td>' . $value["nombre"] . '</td>
            <td>' . $value["edad"] . '</td>
            <td>' . $value["telefono"] . '</td>
            <td>' . $value["direccion"] . '</td>
            <td>' . $value["log"] . '</td>
            <td>' . $value["lnt"] . '</td>

            <td>

              <div class="btn-group">

                <button title="Editar" class="btn1 btn1-primary btn1-outline custom1 btnEditarAlumno" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-edit"></i></button>

                <button title="Eliminar"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-trash"></i></button>

              </div>  

            </td>

          </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ALUMNO
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

          <h4 class="modal-title">Agregar alumno</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre completo" required>

              </div>

            </div>
            <!-- ENTRADA PARA EDAD DEL ALUMNNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-male"></i></span>

                <input type="number" class="form-control input-lg" name="nuevaEdad" placeholder="Ingresar Edad" required>

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

          <button type="submit" class="btn btn-primary custom">Guardar Alumno</button>

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

<!--=====================================
MODAL EDITAR ALUMNO
======================================-->
<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar alumno</h4>

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

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente">
                <input type="hidden" id="idCliente" name="idCliente">


              </div>

            </div>

            <!-- ENTRADA PARA EDAD DEL ALUMNNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-male"></i></span>

                <input type="number" class="form-control input-lg" name="editarEdad" id="editarEdad" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono">

              </div>

            </div>


            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion">

              </div>

            </div>

            <!-- COORDENADAS-->

            <div class="form-group row">

              <div class="col-xs-6">
                <!-- ENTRADA LATITUD-->

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" id="Editarlatitud" name="Editarlatitud" required>

                </div>

              </div>

              <!-- ENTRADA LONGITUD-->

              <div class="col-xs-6">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" id="Editarlongitud" name="Editarlongitud" required>

                </div>


              </div>


            </div>

            <!--VISTA MAPA-->

            <div class="form-group row">

              <div class="col-xs-6">

                <div id="mapa2" style="width: 200%; height: 400px;"></div>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary custom">Guardar cambios</button>

        </div>

      </form>


      <?php

      $editarCliente = new ControladorClientes();
      $editarCliente->ctrEditarCliente();

      ?>
      <br>
      <div class="row">

        <div class="col-md-8"></div>
        <div class="col-md-2">
          <button id="cargarcoordenadas" class="btn btn-primary">Cargar coordenadas</button>
        </div>

      </div>

      <br>



    </div>

  </div>

</div>





<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>




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


////////**Api key googlw map */
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQASVKSNH9d6hns7dU-imN9cYts5oPvUg&callback=iniciarMapa">
</script>