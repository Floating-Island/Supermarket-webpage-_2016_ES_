<?php

include_once __DIR__.'/../sesion/php_session_expire.php';

include_once 'datos.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['id']) )
    echo getDatos($_SESSION['id']);

?>