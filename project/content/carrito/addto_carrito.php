<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/php_session_expire.php';



function sacarDeCarrito($id)
{
    $borrar=    '<button id=borrar_' . $id . ' class="boton boton_agregar-borrar" onclick="carrito_borrar(' . $id . ');">
                    Borrar del carrito
                </button>';
    return $borrar;
}




if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $q = test_input( $_REQUEST["q"] );

    if( ! isset( $_SESSION['carrito'] ) )
    {
        $_SESSION['carrito']=array($q);
        echo sacarDeCarrito($q);
    }
    else
    {
        foreach( $_SESSION['carrito'] as $elemento )
            if($elemento == $q)
                {
                    echo sacarDeCarrito($q);
                    exit;
                }
        $_SESSION['carrito'][]=$q;
        echo sacarDeCarrito($q);
    }
}

?>
