<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'productos_functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $producto = test_input( $_POST["producto"] );
    $producto = str_replace("_","\_",$producto);
    $producto = str_replace("%","\%",$producto);
    $producto = str_replace("?","\?",$producto);

    if($producto === "" || $producto === " ")
        {
            echo "Por favor, ingrese un producto que desee buscar...";
            exit();
        }
    $limit = 10;
    if(isset( $_SESSION['limiteCat' . $producto] ))
        $limit = $_SESSION['limiteCat' . $producto];
    
    $sql = "SELECT id, nombre, informacion, imagen 
            FROM productos 
            WHERE nombre LIKE :producto ORDER BY nombre ASC LIMIT {$limit}";

    $array_bind = [];
    $array_bind[':producto'] ="%{$producto}%";
    try
    {
        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);
    }
    catch(Exception $e)
    {
        echo($e->getMessage());
    } 
    
    echo crear_lista($result);
}

?>
