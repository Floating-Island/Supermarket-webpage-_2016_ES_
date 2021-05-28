<?php

include 'php_session_ON.php';

define("tiempo_sesion", 1500);


function auto_logout($field)
{
    $t = time();
    $t0 = $_SESSION[$field];
    $diff = $t - $t0;
    if ( $diff > tiempo_sesion )    
        return true;
    else
        $_SESSION[$field] = time();
}



if( auto_logout( "Start_Activity_Time" ) )
{
    $sesion = FALSE;
    if( isset( $_SESSION['id'] ) )
        $sesion = TRUE;

    include 'php_session_OFF.php';
    
    if( $sesion )
    {
        $url = 'http://localhost/proyecto/content/logged_out.php';
        header( "Location: $url" );        
    }    
}       

?>