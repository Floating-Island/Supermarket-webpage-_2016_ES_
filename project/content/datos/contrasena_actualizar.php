<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';


if( isset( $_SESSION['id'] ) && $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $contrasena = test_input( $_POST['contrasena'] );
    $nueva = test_input( $_POST['nueva'] );
    $confirmacion = test_input( $_POST['confirmar'] );

    $id = $_SESSION['id'];

    if($nueva === $confirmacion)
        echo actualizarContrasena($contrasena,$nueva,$id);
}
else
    echo "Error";


function actualizarContrasena($vieja,$nueva,$id)
{
        $contrasena = getContrasena($id);
        if ( password_verify( $vieja, $contrasena ) )
            return cambiarContrasena($id,$nueva);
        else
            return "Error"; 
}

function getContrasena($id)
{
    if(isset($id))
    { 
        $sql = "SELECT  contrasena 
                FROM clientes
                WHERE id=:id LIMIT 1";
        
        $array_bind = [];
        $array_bind[':id'] =$id;

        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        $datos = $result->fetch(PDO::FETCH_ASSOC);

        return $datos['contrasena'];
    }
}

function cambiarContrasena($id,$contrasena)
{
    $hash = password_hash( $contrasena, PASSWORD_DEFAULT );

    $sql = "UPDATE clientes 
            SET contrasena=:hash_contrasena 
            WHERE id=:id";
    
    $array_bind = [];
    $array_bind[':id'] = $id;
    $array_bind[':hash_contrasena'] = $hash;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_UPDATER, DB_USUARIO_UPDATER_PASS, DataBase, $sql, $array_bind);

    return  "Modificada";
}

?>