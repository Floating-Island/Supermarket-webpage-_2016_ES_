<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['id']) )
{
    $carrito = test_input( $_REQUEST["q"] );

    $sql = "SELECT producto 
            FROM carritos_productos  
            WHERE id_carrito=:carrito";

    $array_bind = [];
    $array_bind[':carrito'] =$carrito;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    $lista=[];

    if ($result->rowCount() > 0)
        while($row = $result->fetch(PDO::FETCH_ASSOC))
            $lista[]=$row["producto"];
            
    $_SESSION['carrito']=$lista;

    echo "Se ha movido el carrito al carrito actual.";
}

?>