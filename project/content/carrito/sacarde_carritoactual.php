<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/php_session_expire.php';


if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $producto = test_input( $_REQUEST["q"] );

    if( isset( $_SESSION['carrito'] ) )
    {
        $arreglo = [];
        foreach( $_SESSION['carrito'] as $elemento )
            if($elemento != $producto)
                    $arreglo[] = $elemento;

        $_SESSION['carrito']=$arreglo;
        echo meterEnCarrito($producto);
    }   
}

function meterEnCarrito($id)
{
    $agregar=   '<button id=agregar_' . $id . ' class="boton boton_agregar-borrar" onclick="carrito_agregar(' . $id . ');">
                    Agregar al carrito
                </button>';
    return $agregar;
}

?>
