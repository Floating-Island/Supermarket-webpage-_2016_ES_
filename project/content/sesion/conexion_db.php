<?php
include 'globales_conexion.php';



// $a=new PDO("mysql:host=localhost;dbname=database;","root","");
// $b=$a->prepare("UPDATE `users` SET user=:var");
// $b->bindParam(":var",$var);
// $b->execute();

function db_query_normal($servidor, $usuario, $password, $database, $sql_bind)
{
    $conn = db_conectar($servidor, $usuario, $password, $database);

    $preparado = $conn->prepare($sql_bind);

    $query_success = db_query($preparado);

    db_cerrar($conn);
    
        return $preparado;
}
    
function db_query_preparada($servidor, $usuario, $password, $database, $sql_bind, $arraybind)
{
    $conn = db_conectar($servidor, $usuario, $password, $database);

    $preparado = $conn->prepare($sql_bind);

    bind_asociativo($preparado,$arraybind);

    db_query($preparado);

    db_cerrar($conn);
    
    return $preparado;
}

function db_conectar($servername, $username, $password, $database)
{
    try 
    {
        $conn = new PDO("mysql:host={$servername};dbname={$database};",$username,$password);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } 
    catch (PDOException $e) 
    {
        echo 'Connection failed: ' . $e->getMessage();
        return FALSE;
    }
    return $conn;
}

function bind_asociativo($query,$bindassoc)
{
    foreach($bindassoc as $keybind => $value)//$keybind tiene este formato: ":key"
        $query->bindValue($keybind,$value);
}

function db_query($query)
{
    $query->execute();
}

function db_cerrar($connection)
{
    $connection = null;
}

?>

