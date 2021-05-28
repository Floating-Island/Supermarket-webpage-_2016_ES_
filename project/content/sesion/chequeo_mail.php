<?php
//iba a ser usado para chequear que el mail no lo esté usando otro usuario.
require "validacion.php"; 
require "email_en_db.php";
require __DIR__.'/../sesion/php_session_expire.php';


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = test_input( $_POST['mail'] );
    $id = $_SESSION['id'];

    if(validar_email($email))
    {
        $JSONob = new \stdClass();
        $JSONob->en_db = email_endb($email,$id);
        echo json_encode($JSONob);
    }      
}

?>