<?php

include_once __DIR__.'/../sesion/php_session_expire.php';


if ($_SERVER["REQUEST_METHOD"] == "GET")
    $_SESSION['carrito']=[];

?>