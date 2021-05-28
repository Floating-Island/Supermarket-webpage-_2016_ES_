<?php

require_once __DIR__.'/../sesion/validacion.php';
require_once __DIR__.'/../sesion/php_session_expire.php';
// require __DIR__.'/../sesion/email_en_db.php';

require 'datos.php';

//podría adaptarse para poder cambiar el mail de un 
//usario, chequeando que el introducido no corresponda a uno en uso; y tambien tendría que tenerse en cuenta que 
//si se mantiene, se puedan guardar los demás datos.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) )
{

    $alias = test_input( $_POST['alias'] );
    $nombre = test_input( $_POST['nombre'] );
    $apellido = test_input( $_POST['apellido'] );
    $dni = test_input( $_POST['dni'] );
    $direccion = test_input( $_POST['direccion'] );
    // $email = test_input( $_POST['mail'] );

    if( validar_alias($alias) && 
        validar_nombre($nombre) && 
        validar_apellido($apellido) && 
        validar_dni($dni) &&
        /*validar_dni($email) && */
        validar_direccion($direccion) )
    {
        $id = $_SESSION['id']; 
        // if(!email_endb($email,$id))
        // {
            guardar_datos($id/*,$email*/,$nombre,$apellido,$dni,$direccion,$alias);
            $_SESSION['cliente'] = $alias;
        // }
        

        echo getDatos($id);
    }
}



?>