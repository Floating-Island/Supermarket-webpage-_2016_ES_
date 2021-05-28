<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';


$email = $contrasena = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $nombre = test_input( $_POST["nombre"] );
    $apellido = test_input( $_POST["apellido"] );
    $dni = test_input( $_POST["dni"] );
    $email = test_input( $_POST["mail"] );
    $direccion = test_input( $_POST["direccion"] );
    $alias = test_input( $_POST["alias"] );
    $contrasena = test_input( $_POST["contrasena"] );
    $confirmarContrasena = test_input( $_POST["contrasenaconfirmar"] );  

    if( validar_alias($alias) && 
        validar_nombre($nombre) && 
        validar_apellido($apellido) && 
        validar_dni($dni) && 
        validar_email($email) && 
        validar_direccion($direccion) )
    {

        $sql = "SELECT apellido 
                FROM clientes 
                WHERE correo=:email";
                
        $array_bind = [];
        $array_bind[':email'] =$email;

        $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        if ( !($result->rowCount() > 0) ) 
        {//no hay otro usuario registrado con ese e-mail.
            if ( $contrasena === $confirmarContrasena ) 
            {//La contrasena coincide con la confirmada.
                $hash_contrasena = password_hash( $contrasena, PASSWORD_DEFAULT );

                $sql = "INSERT INTO clientes 
                (nombre, 
                apellido,
                dni, 
                correo, 
                direccion, 
                alias, 
                contrasena)
                VALUES 
                (:nombre,
                :apellido,
                :dni,
                :email,
                :direccion,
                :alias,
                :hash_contrasena)"; 

                $array_bind = [];
                $array_bind[':nombre'] = $nombre;
                $array_bind[':apellido'] = $apellido;
                $array_bind[':dni'] = $dni;
                $array_bind[':email'] = $email;
                $array_bind[':direccion'] = $direccion;
                $array_bind[':alias'] = $alias;
                $array_bind[':hash_contrasena'] = $hash_contrasena;
                
                $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_INSERTER, DB_USUARIO_INSERTER_PASS, DataBase, $sql, $array_bind);

                if( $result !== FALSE)
                    echo welcome_cliente($alias,$email);
                else
                {
                    $JSONob = new \stdClass();
                    $JSONob->registro = "No se pudieron guardar los datos.";
                    echo json_encode($JSONob);
                }
            } 
        } 
        else
        {
            $JSONob = new \stdClass();
            $JSONob->registro = "Ya existe un usuario con ese e-mail.";
            echo json_encode($JSONob);
        }       
    }
}

function welcome_cliente($alias,$email)
{
    $iniciar_sesion = "http://localhost/proyecto/content%20php/iniciar_sesion.php";
    $website="Ahorria.com";
    $headers ="From: $website";
    $subject = "¡Bienvenido a Ahorria!";
    $content = "¡Hola, " . $alias . "! Tus datos fueron registrados con éxito!\n\n" . 
                "Ya sos parte de Ahorria, para iniciar sesion, ingresá en: " 
                . $iniciar_sesion . " \n" . 
                "Atentamente, \n El equipo de Ahorria";

    mail($email, $subject, $content, $headers);

    $JSONob = new \stdClass();
    $JSONob->registro = "registrado";
    return json_encode($JSONob);
}

?>