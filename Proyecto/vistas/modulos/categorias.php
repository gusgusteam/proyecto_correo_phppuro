<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar categorías

    </h1>

    <ol class="breadcrumb">

      <li><a href="contenido"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar categorías</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarCategoria">

          Agregar categoría

        </button>

      </div>

      <div class="box-body">

<table class="table table-bordered table-striped dt-responsive tablas" width="100%">

  <thead>

  <tr>

    <th style="width:2px">#</th>
    <th style="width:150px">Categoria</th>
    <th style="width:100px">Fecha</th>
    <th style="width:50px">Acciones</th>

  </tr>

  </thead>

  <tbody>

    <?php

    $item = null;
    $valor = null;

    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

    foreach ($categorias as $key => $value) {

    echo ' <tr>

          <td>' . ($key + 1) . '</td>
          <td class="text-uppercase">' . $value["categoria"] . '</td>
          <td >' . $value["fecha"] . '</td>

          <td>

            <div class="btn-group">
                
              <button  title="Editar" class="btn1 btn1-primary btn1-outline custom1 btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-edit"></i></button>

              <button title="Eliminar"  class="btn1 btn1-danger btn1-outline custom1 btnEliminarCategoria" idCategoria="' . $value["id"] . '"><i class="fa fa-trash"></i></button>

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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close custom" data-dismiss="modal">&times;</button>

          <h4 class="modal-title ">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>

              </div>

            </div>

          </div>

        </div>



        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-primary pull-left custom" data-dismiss="modal"><p>Salir</p></button>

          <button type="submit" class="btn btn-primary custom">Guardar categoría</button>

        </div>

        <?php

        $crearCategoria = new ControladorCategorias();
        $crearCategoria -> ctrCrearCategoria();
        
        ?>

      

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

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

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                <input type="hidden" name="idCategoria" id="idCategoria" required>

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

        <?php
        
        $editarCategoria = new ControladorCategorias();
        $editarCategoria -> ctrEditarCategoria();
        
        ?>

  
      </form>

    </div>

  </div>

</div>

<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();

?>