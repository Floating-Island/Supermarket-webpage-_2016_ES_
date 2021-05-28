<?php

include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';


function cargar_carritos($nombre,$id)
{
    $categoria='<a class="boton boton_menu" id="boton_carrito_' . $id. '" onclick="productos_carrito(' . $id . ');">
                   ' . $nombre . '
                </a>';

    return $categoria;
}

function mostrar_carritos()
{
    if( isset($_SESSION['id']) )
    {
        $id = $_SESSION['id'];

        $sql = "SELECT id, carrito 
                FROM carritos 
                WHERE cliente=:id";
        
        $array_bind = [];
        $array_bind[':id'] =$id;

        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        $menu="";

        if ($result->rowCount() > 0)
        {
            while($row = $result->fetch(PDO::FETCH_ASSOC))
                $menu.=cargar_carritos($row["carrito"],$row["id"]);
            echo $menu;
        }
        else
            echo '<a class="boton boton_menu">No hay carritos.</a>';
        return;
    }
}

?>
