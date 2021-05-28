<?php

include_once __DIR__.'/../sesion/conexion_db.php';


//llenar menu

function llenarMenu($nombre,$id)
{
    $categoria='<a class="boton_menu" onclick="productos_categoria(' . $id . ');">
                   ' . $nombre . '
                </a>';

    return $categoria;
}

function cargar_categorias()
{
    $sql = "SELECT id, nombre FROM categorias";

    $result = db_query_normal(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql);//no es una consulta parametrizada.

    if ($result->rowCount() > 0) 
    {
        $menu="";
        while( $row = $result->fetch(PDO::FETCH_ASSOC) ) 
            $menu.=llenarMenu($row["nombre"],$row["id"]);
        return $menu;
    } 
    else 
        return "0 results";
}

?>