
<?php
//requerimos los archivos controladores y modelos:
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


/*=============================================
MOSTRAR LA TABLA DE PRODUCTOS
=============================================*/

class TablaProductos{

    public function mostrarTablaProductos(){

      $item = null;
      $valor = null;

    $productos = ControladorProductos::ctrMostrarProductos($item,$valor);

  

      //var_dump($productos);

      $datosJson = '{
        "data": [';

        for($i = 0; $i< count($productos); $i++){//camtidaddeiten existentes count
          
          //TRAEMOS LA IMAGEN

          $imagen = "<img src='".$productos[$i]["imagen"]."' width='70px'>";

          //TRAEMOS LAS CATEGORIAS

          $item = "id";
          $valor = $productos[$i]["id_categoria"];

          $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

          //colores del stock

          if( $productos[$i]["stock"]<=10){
            $stock = "<button class='btn btn-danger custom2'>" . $productos[$i]["stock"] . "</button>";
          }else{
            $stock = "<button class='btn btn-success custom2'>" . $productos[$i]["stock"] . "</button>";
          }


          //traemos los botones de acciones 
          $botones =  "<div class='btn-group'><button  title='Editar' class='btn1 btn1-primary btn1-outline custom1 btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-edit'></i></button><button  title='Eliminar'  class='btn1 btn1-danger btn1-outline custom1 btnEliminarProducto' idProducto='" . $productos[$i]["id"] . "' codigo='" . $productos[$i]["codigo"] . "' imagen='" . $productos[$i]["imagen"] . "'><i class='fa fa-trash'></i></button></div>";

          $datosJson .='[
            "'.($i +1).'",
            "'.$imagen.'",
            "'.$productos[$i]["nombre"].'",
            "'.$productos[$i]["codigo"].'",
            "'.$productos[$i]["descripcion"].'",
            "'.$categorias["categoria"].'",
            "'. $stock.'",
            "'.$productos[$i]["precio"].'",
            "'.$botones.'"
          ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
      }';     


        echo $datosJson;


      


    
        

    }





}

/*=============================================
CREAMOS EL OBJETO  (activar tabla productos)
=============================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();