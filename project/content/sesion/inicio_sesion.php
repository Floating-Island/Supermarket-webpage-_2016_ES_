<?php

include 'validacion.php';
include 'conexion_db.php';
include 'php_session_expire.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = test_input($_POST["inputmail"]);
    $contrasena = test_input($_POST["inputcontrasena"]);

    if(validar_email($email))
    {
        $sql = "SELECT id, alias, contrasena FROM clientes WHERE correo=:email";

        $array_bind = [];
        $array_bind[':email'] =$email;

        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        if ($result->rowCount() > 0)
        {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ( password_verify( $contrasena, $row['contrasena'] ) ) 
            {
                $_SESSION['cliente']= $row['alias'];
                $_SESSION['id']= $row['id'];
                session_write_close();
                $url = 'http://localhost/proyecto/content/index.php';
                header( "Location: $url" );
            } 
        } 
    }
    else
    {
        $url = 'http://localhost/proyecto/content/iniciar_sesion.php';
        header( "Location: $url" );
    }
}

?>