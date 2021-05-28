<?php

include_once __DIR__.'/../sesion/php_session_expire.php';

include 'comparar_carrito_functions.php';



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_SESSION['carrito']))
        {
            echo "El carrito está vacío...";
            exit();
        }
    
    $supermercados = get_supermercados();

    $productos = get_productos_actual($_SESSION['carrito']);

    $precios = get_precios($productos, $supermercados);

    $tabla = fill_precios($productos,$supermercados,$precios);

    $info = faltantes($supermercados, $precios);

    $barato = barato($supermercados,$precios,$productos);

    $resultado =menu_carritocomparar($tabla,$barato,$info);

    echo $resultado;
}

?>