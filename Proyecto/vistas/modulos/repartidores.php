<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar repartidor

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar repartidor</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarRepartidor">

                    Agregar repartidor

                </button>

            </div>

            <div class="box-body">

                <table id="example" class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Zona</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>



                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $repartidores = ControladorRepartidores::ctrMostrarRepartidores($item, $valor);

                        //var_dump($repartidores); 

                        foreach ($repartidores as $key => $value) {

                            echo '  
                        <tr>

                                <td>' . ($key + 1) . '</td>
                                <td>' . $value["nombre"] . '</td>
                                <td>' . $value["telefono"] . '</td>
                                <td>' . $value["zona"] . '</td>

                            <td>

                                <div class="btn-group">

                                    <button title="Editar" class="btn1 btn1-primary btn1-outline custom1 btnEditarRepartidor" data-toggle="modal" data-target="#modalEditarRepartidor" idRepartidor="' . $value["id"] . '"><i class="fa fa-edit"></i></button>

                                    <button title="Eliminar"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarRepartidor" idRepartidor="' . $value["id"] . '"><i class="fa fa-trash"></i></button>

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
MODAL AGREGAR REPARTIDOR
======================================-->

<div id="modalAgregarRepartidor" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar repartidor</h4>

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

                                <input type="text" class="form-control input-lg" name="nuevoRepartidor" placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELÉFONO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA LA ZONA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaZona" placeholder="Ingresar zona">

                            </div>

                        </div>




                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary custom">Guardar repartidor</button>

                </div>

            </form>

            <?php
            $crearRepartidor = new ControladorRepartidores();
            $crearRepartidor->ctrCrearRepartidor();
            ?>



        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR REPARTIDOR
======================================-->

<div id="modalEditarRepartidor" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar repartidor</h4>

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

                                <input type="text" class="form-control input-lg" name="editarRepartidor" id="editarRepartidor">
                                <input type="hidden" id="idRepartidor" name="idRepartidor">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELÉFONO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lg" name="editarTelefono"  id="editarTelefono">

                            </div>

                        </div>


                        <!-- ENTRADA PARA LA ZONA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="editarZona" id="editarZona">

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
            
            $editarRepartidor = new ControladorRepartidores();
            $editarRepartidor -> ctrEditarRepartidor();
            
            ?>




        </div>

    </div>

</div>

<?php

$eliminarRepartidor = new ControladorRepartidores();
$eliminarRepartidor->ctrEliminarRepartidor();

?>
