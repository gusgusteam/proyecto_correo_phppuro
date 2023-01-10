<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Carreras

    </h1>

    <ol class="breadcrumb">

      <li><a href="contenido"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active"> Administrar Carreras </li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarTipoMov">

          Agregar Carrera

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Fecha</th>
              <th>Accciones</th>

            </tr>

          </thead>

          <tbody>

            <?php
            //null porque tengo que traer todos dato de la tabla
            $item = null;
            $valor = null;

            $movimientos = ControladorMovimientos::ctrMostrarTipoMov($item, $valor);

            //var_dump($movimientos); //mostrar consola


            foreach ($movimientos as $key => $value) {


              echo ' <tr>

               <td>' . ($key + 1) . '</td>
               <td >' . $value["Codigo"] . '</td>
   
               <td class="text-uppercase">' . $value["nombre"] . '</td>

               <td >' . $value["descripcion"] . '</td>

               <td>' . $value["fecha"] . '</td>
   
               <td>

                      <div class="btn-group">
                          
                        <button  title="Editar" class="btn1 btn1-primary btn1-outline custom1 btnEditarTipoMov" idTipo="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarTipoMov"><i class="fa fa-edit"></i></button>

                        <button title="EliminaAr"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarTipoMov" idTipo="' . $value["id"] . '"><i class="fa fa-trash"></i></button>

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
MODAL AGREGAR CARRERA
======================================-->

<div id="modalAgregarTipoMov" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Carrera</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar codigo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTipoMov" placeholder="Ingresar nombre(*)" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCION-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg " name="nuevaDescripcion" placeholder="Ingresar descripción (*)"></textarea>

              </div>


            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">
            <p>Salir</p>
          </button>

          <button type="submit" class="btn btn-primary custom">Guardar Carrera.</button>

        </div>


        <?php

        $crearTipoMovimiento = new ControladorMovimientos();
        $crearTipoMovimiento->ctrCrearTipoMov();

        ?>


      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL EDITAR TIPO MOVIMIENTO
======================================-->

<div id="modalEditarTipoMov" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Carrera</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">
              <label>Nombre:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarTipoMov" name="editarTipoMov" required>
                <input type="hidden" name="idTipo" id="idTipo" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DESCRIPCION-->
            <div class="form-group">
              <label>Descripcion:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion"></textarea>

              </div>


            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">
            <p>Salir</p>
          </button>

          <button type="submit" class="btn btn-primary custom">Guardar cambios</button>

        </div>


        <?php

        $editarTipoMovimiento = new ControladorMovimientos();
        $editarTipoMovimiento->ctrEditarTipoMov();

        ?>


      </form>

    </div>

  </div>

</div>




<!--=====================================
        METODO BORRAR UNIDAD
======================================-->


<?php

$borrarTipoMovimiento = new ControladorMovimientos();
$borrarTipoMovimiento->ctrBorrarTipoMov();

?>