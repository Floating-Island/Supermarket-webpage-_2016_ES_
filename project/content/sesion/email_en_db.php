<?php

require_once __DIR__.'/../sesion/conexion_db.php';

function email_endb($email,$id)
{   
    $sql = "SELECT  id 
    FROM clientes
    WHERE correo=:email AND (NOT id=:id) LIMIT 1";

    $array_bind = [];
    $array_bind[':email'] = $email;
    $array_bind[':id'] = $id;
    
    $respuesta = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    if($respuesta->rowCount() > 0)
            return true;
    else
        return false;
}

?>