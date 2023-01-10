<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/repartidores.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/docentes.controlador.php";
require_once "controladores/carreras.controlador.php";
require_once "controladores/inscripcion.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/repartidores.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/docentes.modelo.php";
require_once "modelos/carreras.modelo.php";
require_once "modelos/inscripcion.modelo.php";

//creo un objeto llamado plantilla

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
