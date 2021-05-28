<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'productos_functions.php';


if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $categoria = test_input( $_REQUEST["q"] );

    $limit = 10;
    if(isset( $_SESSION['limiteCat' . $categoria] ))
        $limit = $_SESSION['limiteCat' . $categoria];
    
    $sql = "SELECT id, nombre, informacion, imagen 
            FROM productos 
            WHERE categoria=:categoria LIMIT {$limit}";

    $array_bind = [];
    $array_bind[':categoria'] =$categoria;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);
    
    echo crear_lista($result);
 
}

?>
