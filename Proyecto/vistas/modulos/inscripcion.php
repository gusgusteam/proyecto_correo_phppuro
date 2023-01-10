<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Inscripcion

        </h1>

        <ol class="breadcrumb">

            <li><a href="contenido"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active"> Administrar Inscripcion </li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarTipoMov">

                    Agregar Inscripcion

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Alumno</th>
                            <th>Carrera</th>
                            <th>Periodo</th>
                            <th>Modalida</th>
                            <th>Fecha</th>
                            <th>Accciones</th>

                        </tr>

                    </thead>

                    <tbody>

<!-- IMPRIMEINTDO DATOS DESDE LA BD -->

<?php
$item =  null;
$valor = null;

$inscripcion = ControladorInscripcion::ctrMostrarInscripcion($item, $valor);

//var_dump($usuarios); // para mostrar datos de esa variable

foreach ($inscripcion as $key => $value) { //recorrer un arrays

  //var_dump($value["nombre"]);
  echo '
<tr>
<td>' . ($key + 1) . '</td>';

  $itemAlumno = "id";
  $valorAlumno = $value["id_alumno"];
  $respuestaAlumno = ControladorClientes::ctrMostrarClientes($itemAlumno, $valorAlumno);

  echo '<td>' . $respuestaAlumno["nombre"] . '</td>';
  


  $itemCarrera = "id";
  $valorCarrera = $value["id_carrera"];
  $respuestaCarrera = ControladorMovimientos::ctrMostrarTipoMov($itemCarrera, $valorCarrera);

  echo '<td>' . $respuestaCarrera["nombre"] . '</td>';
  
  echo ' <td>' . $value["periodo"] . '</td>';
  echo ' <td>' . $value["modalidad"] . '</td>';
  echo ' <td>' . $value["fecha"] . '</td>
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
MODAL AGREGAR INSCRIPcion
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

                    <h4 class="modal-title">Agregar Insripcion</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA ALUMNO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg    " id="seleccionarAlumno" name="seleccionarAlumno">

                                    <option value="">Seleccionar Alumno (*)</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $alumnos = ControladorClientes::ctrMostrarClientes($item, $valor);

                                    foreach ($alumnos as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                    }

                                    ?>


                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA CARRERA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg    " id="seleccionarCarr" name="seleccionarCarr">

                                    <option value="">Seleccionar carrera (*)</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $carr = ControladorMovimientos::ctrMostrarTipoMov($item, $valor);

                                    foreach ($carr as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                    }

                                    ?>


                                </select>
                                

                            </div>

                        </div>


                        <!-- ENTRADAnuevoPeriodo-->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar periodo">

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR MODALIDAD -->

                        <div class="col-xs-10" style="padding-right:0px">
                  <label>Tipo de Modalidad:</label>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>

                    <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" onchange="listarMetodos();" required>
                      <option value="">Seleccionar Modalidad</option>
                      <option value="PRESENCIAL">===> Presencial</option>
                      <option value="SEMIPRESENCIAL">===> SemiPresencial</option>
                      <option value="ONLINE">===> Online</option>
                      <option value="SEMINARIO">===> Seminario</option>
                      <option value="INTENSIVO">===> Intensivo</option>
                    </select>

                  </div>

                </div>

                <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">
                        <p>Salir</p>
                    </button>

                    <button type="submit" class="btn btn-primary custom">Guardar Inscripcion.</button>

                </div>


                <?php

                $crearInscripcion = new ControladorInscripcion();
                $crearInscripcion->ctrCrearInscripcion();

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