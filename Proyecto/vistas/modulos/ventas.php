<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar ventas
      <a href="crear-venta">
        <!--DIRRECIONA ALA VISTA CREAR-VENTA -->


        <button class="btn btn-primary">
          <span> <i class="fa fa-plus"></i></span>

          Agregar venta

        </button>

      </a>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar ventas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">




      <!--  DATATABLE VENTAS -->

      <table id="example" class="table table-bordered table-striped dt-responsive tablas" width="170%">

        <thead>

          <tr>

            <th style="width:5px">#</th>
            <!-- <th>usuario</th> -->
            <th style="width: 70px;size: 13px;text-align: center;">Fecha pedido </th>
            <th style="width: 8px;size: 13px;text-align:center;">Fecha de entrega</th>
            <th style="width: 8px;size: 13px;text-align: left;">Hora de entrega</th>
            <th style="width: 75px;size: 13px;text-align: left;">Cliente</th>
            <th style="width: 50px;size: 13px;text-align: center;">Proceso del pedido</th>

            <?php
            if ($_SESSION["perfil"] == "Administrador") {

              echo '  <th style="width: 50px;size: 13px;text-align: center;">Estado del pedido</th>';
            }
            ?>
            <!-- <th style="width: 5px;size: 13px;text-align: left;">Total pedido</th> -->
            <!-- <th style="width: 8px;size: 13px;text-align: left;">Costo envio</th>
            <th style="width: 2px;size: 13px;text-align: left;">Descuento</th> -->
            <th style="width: 5px;size: 13px;text-align: left;">Total a pagar</th>
            <!-- <th style="width: 20px;size: 13px;text-align: left;">Total con descuento</th> -->
            <th style="width: 10px;size: 13px;text-align: left;">Forma de pago</th>

            <th style="width: 75px;size: 13px;text-align: center;">Tipo de entrega</th>
            <!-- <th style="width: 75px;size: 13px;text-align: center;">Reclamo</th> -->
            <th style="width: 75px;size: 13px;text-align: center;">Feedback</th>

            <?php
            if ($_SESSION["perfil"] == "Vendedor") {

              echo '    <th style="width: 75px;size: 13px;text-align: center;">Estado de pedido</th>';
            }
            ?>


            <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

          <tr>

            <td>1</td>
            <td>28/03/2022</td>
            <td>20:45</td>
            <td>felix añlberto</td>
            <td>en camino</td>
            <td>150</td>
            <td>efectivo</td>
            <td>domicilio</td>
            <td>PROTOTIPO PROYECTO WEB</td>
            <td>DAVID</td>

            <td>

                  <div class="btn-group">

                    <button title="Editar" class="btn1 btn1-primary btn1-outline custom1 btnEditarRepartidor" data-toggle="modal" data-target="#modalEditarRepartidor" idRepartidor="' . $value[" id"] . '"><i class="fa fa-edit"></i></button>
                    <button title="Eliminar"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarRepartidor" idRepartidor="' . $value["id"] . '"><i class="fa fa-trash"></i></button>
                    <button title="Eliminar"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarRepartidor" idRepartidor="' . $value["id"] . '"><i class="fa fa-print"></i></button>


                  </div>  

            </td>

          </tr>


        </tbody>

      </table>

    </div>

</div>
</section>

</div>





<!--=====================================
MODAL VER PEDIDO
======================================-->


<div id="modalVerPedido" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"> Detalle del pedio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group row">


              <!-- ENTRADA -->

              <div class="col-xs-6">

                <label>PEDIDO N°:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verPedido" name="verPedido" readonly>
                  <input type="hidden" id="idVenta3" name="idVenta3">

                </div>

              </div>

              <!-- ENTRADA -->

              <div class="col-xs-6">
                <label>FECHA DE PEDIDO:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verFecha" name="verFecha" readonly>

                </div>


              </div>

            </div>


            <div class="form-group row">


              <!-- ENTRADA -->

              <div class="col-xs-6">

                <label>FECHA ENTREGA:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verFechaReserva" name="verFechaReserva" readonly>

                </div>

              </div>

              <!-- ENTRADA -->

              <div class="col-xs-6">
                <label>HORA ENTREGA:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verHora" name="verHora" readonly>

                </div>


              </div>

            </div>

            <div class="form-group row">
              <!-- ENTRADA -->

              <div class="col-xs-12">
                <label>CLIENTE:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" name="verCliente" id="verCliente" readonly required>
                  <input type="hidden" id="idCliente" name="idCliente">
                </div>


              </div>


            </div>

            <div class="form-group row">


              <!-- ENTRADA -->

              <div class="col-xs-6">

                <label>TELEFONO:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verTelefono" name="verTelefono" readonly>

                </div>

              </div>

              <!-- ENTRADA -->

              <div class="col-xs-6">
                <label>FORMA DE PAGO:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="verMetodoPago" name="verMetodoPago" readonly>

                </div>


              </div>

            </div>




            <div class="form-group row ">

              <div class="row" style="padding: 0px 15px;">


                <div class="col-xs-6" style="padding-right: 0px;">

                  <span>Produccto(s)</span>

                </div>

                <div class="col-xs-3">

                  <span>Precio</span>

                </div>


                <div class="clo-xs-3" style="padding-left: 0px;">

                  <span>Cantidad</span>

                </div>



              </div>


              <div class="form-group mostrarProductos">




              </div>


            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->

            <div class="modal-footer">

              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Salir</button>

            </div>

      </form>



    </div>

  </div>
</div>

</div>

</div>





<!--=====================================
MODAL FELLBACK
======================================-->
<div id="modalFellback" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"> Agregar Feedback</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TEXTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="500" rows="6" class="form-control input-lg " name="nuevoFellback" id="nuevoFellback" placeholder="Ingrese el feedback"></textarea>
                <input type="hidden" name="idVenta" id="idVenta">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      </form>



    </div>

  </div>

</div>



<!--=====================================
MODAL RECLAMO
======================================-->

<div id="modalReclamo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"> Agregar Reclamo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TEXTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="500" rows="6" class="form-control input-lg " name="nuevoReclamo" id="nuevoReclamo" placeholder="Ingrese Reclamo"></textarea>
                <input type="hidden" name="idVenta1" id="idVenta1">

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary custom">Guardar</button>

        </div>

      </form>



    </div>

  </div>

</div>



<!--===================================== 
ANULAR PEDIDO
======================================-->

<div id="modalAnular" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                 CABEZA DEL MODAL
                  ======================================-->



        <!--=====================================
                  CUERPO DEL MODAL
                   ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TEXTO -->

            <div class="form-group">

              <h1><i class="fa fa-cubes" style="font-size: 45pt;"></i><br>Anular Pedido</h1>

              <p>Estas seguro de anular el siguiente pedido?</p>


              <div class="col-xs-10" style="padding-right:0px">
                <label>Tipo de Pago:</label>

                <div class="input-group">
                  <span class="input-group-addon"><i clalistaMetodoCancelarss="fa fa-money"></i></span>

                  <select class="form-control" id="nuevoMetodoCancelar" name="nuevoMetodoCancelar" onchange="listaCancelar();">
                    <option value="">Seleccionar:</option>
                    <option value="CANCELADO">===> Cancelado</option>
                    <option value="EFECTIVO">===> Baja</option>
                  </select>

                </div>

              </div>

              <input type="hidden" id="listaMetodoCancelar" name="listaMetodoCancelar">


            </div>



          </div>

        </div>

        <!--=====================================
                PIE DEL MODAL
                ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary btn_ok">Anular</button>

        </div>

      </form>




    </div>

  </div>

</div>


<script>
  $(document).ready(function() {
    var table = $(' #example').DataTable(); $('#example tbody').on('click', 'tr' , function() { if ($(this).hasClass('selected')) { $(this).removeClass('selected'); } else { table.$('tr.selected').removeClass('selected'); $(this).addClass('selected'); } }); $('#button').click(function() { table.row('.selected').remove().draw(false); }); }); </script>