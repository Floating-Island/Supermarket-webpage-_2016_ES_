<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'carrito_functions.php';



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['id']) )
{
    $carrito = test_input( $_REQUEST["q"] );

    echo get_carrito($carrito);
}

?>