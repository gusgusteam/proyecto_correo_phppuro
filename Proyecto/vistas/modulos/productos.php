<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar productos

    </h1>

    <ol class="breadcrumb">

      <li><a href="contenido"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar productos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary custom" data-toggle="modal" data-target="#modalAgregarProducto">

          Agregar productos

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

          <thead>
            <tr>
              <th style="width: 5px;">#</th>
              <th>Imagen</th>
              <th>nombre</th>
              <th style="width:1px;">Codigo</th>
              <th style="width: 160px;">Descripcion</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th style="width:5px;">Precio</th>
              <th>Acciones</th>
            </tr>

          </thead>



        </table>


      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZERA -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Producto(campos obligatorias(*))</h4>
        </div>

        <!-- CUERPO -->
        <div class="modal-body">


          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProducto" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- SELECCIONAR CATEGORIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg    seleccionarCategoria" id="nuevaCategoria" name="nuevaCategoria" required>

                  <option value="">Seleccionar categoria (*)</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                  }

                  ?>


                </select>

              </div>

            </div>

            <!-- ENTRADA CODIGO-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder=" Codigo Producto(*) ejemplo 101" readonly required>

              </div>


            </div>


            <!-- ENTRADA PARA LA DESCRIPCION-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg " name="nuevaDescripcion" placeholder="Ingresar descripción producto (*)"></textarea>

              </div>


            </div>


            <!-- ENTRADA PRECIO -->
            <div class="form-group row">

              <div class="col-xs-6">


                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min="0" placeholder="Ingresar Precio(*)" required>

                </div>

              </div>

              <!-- ENTRADA stock-->

              <div class="col-xs-6">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-check"></i></span>

                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar Stock(*)" required>

                </div>


              </div>


            </div>


            <!-- SUBIR IMAGEN-->
            <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/anonymous.png" class="img-thumbnail previsualizar" width="100px">


            </div>

          </div>

        </div>

        <!-- PIER DE PAGINA -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">
            <p>salir</p>
          </button>

          <button type="submit" class="btn btn-primary guardarProducto custom">Guardar Productos</button>

        </div>

        <!-- crear un objeto y poder ejeutar el metodo q nos permite guardar ese usuario -->


      </form>

      <?php

      $crearProducto = new ControladorProductos();
      $crearProducto->ctrCrearProducto();

      ?>

    </div>

  </div>
</div>

<!--=====================================
MODAL EDITAR PRODUCTOS
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZERA -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Producto(campos obligatorias(*))</h4>
        </div>

        <!-- CUERPO -->
        <div class="modal-body">


          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarProducto" id="editarProducto" required>

              </div>

            </div>

            <!-- SELECCIONAR CATEGORIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg " name="editarCategoria" readonly required>

                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA CODIGO-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>


            </div>


            <!-- ENTRADA PARA LA DESCRIPCION-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg " id="editarDescripcion" name="editarDescripcion"></textarea>

              </div>


            </div>


            <!-- ENTRADA PRECIO -->
            <div class="form-group row">

              <div class="col-xs-6">


                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" required>

                </div>

              </div>

              <!-- ENTRADA STOCK-->

              <div class="col-xs-6">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-check"></i></span>

                  <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

                </div>


              </div>


            </div>


            <!-- SUBIR IMAGEN-->
            <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">


            </div>

          </div>

        </div>

        <!-- PIER DE PAGINA -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left custom" data-dismiss="modal">
            <p>salir</p>
          </button>

          <button type="submit" class="btn btn-primary guardarProducto custom">Guardar Cambios</button>

        </div>

        <!-- crear un objeto y poder ejeutar el metodo q nos permite guardar ese usuario -->
        <?php

        $editarProducto = new ControladorProductos();
        $editarProducto->ctrEditarProducto();

        ?>


      </form>

    </div>

  </div>
</div>

<?php

$eliminarProducto = new ControladorProductos();
$eliminarProducto->ctrEliminarProducto();

?>