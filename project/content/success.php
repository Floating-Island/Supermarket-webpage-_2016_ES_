<!DOCTYPE html>


<?php
include __DIR__.'/recursos/head.php';
include __DIR__.'/recursos/header_iniciar_sesion.php';
include __DIR__.'/recursos/registered.php';
include __DIR__.'/recursos/footer.php';

include __DIR__.'/sesion/php_session_OFF.php';

$url = 'http://localhost/proyecto/content/index.php';


header( "refresh:4;url=$url" );


?>