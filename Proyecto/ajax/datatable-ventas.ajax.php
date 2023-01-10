<?php

//requerimos los archivos controladores y modelos:
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


/*=============================================
MOSTRAR LA TABLA DE PRODUCTOS
=============================================*/

class TablaProductosVentas
{

	public function mostrarTablaProductosVentas()
	{

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);


		//var_dump($productos);

		$datosJson = '{
        "data": [';

		for ($i = 0; $i < count($productos); $i++) { //camtidaddeiten existentes count

			//TRAEMOS LA IMAGEN

			$imagen = "<img src='" . $productos[$i]["imagen"] . "' width='70px'>";

			//TRAEMOS LAS CATEGORIAS

			$item = "id";
			$valor = $productos[$i]["id_categoria"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			//colores del stock

			if ($productos[$i]["stock"] <= 10) {
				$stock = "<button class='btn btn-danger custom2'>" . $productos[$i]["stock"] . "</button>";
			} else {
				$stock = "<button class='btn btn-success custom2'>" . $productos[$i]["stock"] . "</button>";
			}


			//traemos los botones de acciones 
			$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton'  idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";

			$datosJson .= '[
            "' . ($i + 1) . '",
            "' . $imagen . '",
			"' . $productos[$i]["nombre"] . '",
            "' . $categorias["categoria"] . '",
            "' . $productos[$i]["precio"] . '",
			"' . $stock . '",
            "' . $botones . '"
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
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas->mostrarTablaProductosVentas();
