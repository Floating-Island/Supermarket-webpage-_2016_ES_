<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'get_carritoactual.php';


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
        echo get_carritoactual();
    }  
}

?>