<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';


if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $email = test_input($_POST['mail']);

    if(validar_email($email))
    {
        $sql = "SELECT alias FROM clientes WHERE correo=:email LIMIT 1";

        $array_bind = [];
        $array_bind[':email'] =$email;

        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        if( $result->rowCount() > 0 )
        {
            $password_reset = bin2hex( random_bytes(9) );
            $hash = password_hash($password_reset, PASSWORD_DEFAULT);

            $sql = "UPDATE clientes
                    SET contrasena=:hash_contrasena
                    WHERE correo=:email";
            
            $array_bind[':hash_contrasena'] = $hash;

            if( db_query_preparada(Nombre_Servidor, DB_USUARIO_UPDATER, DB_USUARIO_UPDATER_PASS, DataBase, $sql, $array_bind) )
            {
                echo mail_contrasena_olvidada($password_reset,$email);
                exit(); 
            }
            echo "Error";
            exit();  
        }
    }
    echo "e-mail inválido";
}

function mail_contrasena_olvidada($password_reset,$email)
{
    $iniciar_sesion = "http://localhost/proyecto/content%20php/iniciar_sesion.php";
                $website="Ahorria.com";
                $headers ="From: $website";
                $subject = "Restablecimiento de contraseña";
                $content = "Se le ha enviado este mail porque ha solicitado un restablecimiento de su contraseña.\n\n" . 
                            "Su contraseña temporal es: " . $password_reset . " \n\n" . 
                            "Por favor, reemplácela por una contraseña creada por usted. \n" . 
                            "Para iniciar sesion, ingresela en: " . $iniciar_sesion . " \n" . 
                            "Atentamente, \n El equipo de Ahorria";

                if(mail($email, $subject, $content, $headers))
                    return "Enviado";
                else
                    return "Error";
}



?>