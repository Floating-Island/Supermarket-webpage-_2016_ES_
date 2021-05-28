<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'carrito_functions.php';


if( isset( $_SESSION['id'] ) && $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $carrito = test_input( $_POST['carrito'] );
    $id = test_input( $_SESSION['id'] );
     
    $sql = "DELETE 
            FROM carritos
            WHERE id=:carrito AND cliente=:id";

    $array_bind = [];
    $array_bind[':carrito'] =$carrito;
    $array_bind[':id'] =$id;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_DELETER, DB_USUARIO_DELETER_PASS, DataBase, $sql, $array_bind);

    if( $result->rowCount() > 0 )
        echo "Carrito eliminado con éxito!!";
    else
        echo "No se pudo eliminar el carrito...";
}

?>