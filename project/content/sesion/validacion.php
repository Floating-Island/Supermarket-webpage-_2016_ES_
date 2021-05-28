<?php

include "globales_validacion.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validar_alias($alias)
{
    $pattern = '/^([a-z]+$)/i';
    return (preg_match($pattern, $alias) && strlen($alias) < MAXALIASLENGTH )? TRUE:FALSE ;
}

function validar_nombre($nombre)
{
    $pattern = '/^([a-z]+$)/i';
    return (preg_match($pattern, $nombre) && strlen($nombre) < MAXNOMBRELENGTH )? TRUE:FALSE ;
}

function validar_apellido($apellido)
{
    $pattern = '/^([a-z]+$)/i';
    return (preg_match($pattern, $apellido) && strlen($apellido) < MAXAPELLIDOLENGTH )? TRUE:FALSE ;
}

function validar_dni($dni)
{
    $pattern = '/^(\d+$)/';
    return (preg_match($pattern, $dni) && strlen($dni) < MAXDNILENGTH )? TRUE:FALSE ;
}

function validar_email($email)
{
    return ( filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) < MAXCORREOLENGTH )? TRUE:FALSE;
}

function validar_direccion($direccion)
{
    return ( strlen($direccion) < MAXDIRECCIONLENGTH )? TRUE:FALSE ;
}

?>