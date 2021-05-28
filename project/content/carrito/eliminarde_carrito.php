<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'carrito_functions.php';


if( isset( $_SESSION['id'] ) && $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $carrito = test_input( $_POST['carrito'] );
    $producto = test_input( $_POST['producto'] );
     
    $sql = "DELETE 
            FROM carritos_productos
            WHERE carritos_productos.producto=:producto AND id_carrito=:carrito";
    
    $array_bind = [];
    $array_bind[':carrito'] =$carrito;
    $array_bind[':producto'] =$producto;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_DELETER, DB_USUARIO_DELETER_PASS, DataBase, $sql, $array_bind);

    echo get_carrito($carrito);
}

?>