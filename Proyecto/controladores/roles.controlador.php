<?php

class ControladorRol
{
	/*=============================================
	MOSTRAR ROLES
	=============================================*/

    public static function ctrMostrarRol($item,$valor)
    {
        $tabla = "rol";
        $respuesta = ModeloRol::mdlMostrarRol($tabla,$item,$valor);

        return $respuesta;


    }
    

}