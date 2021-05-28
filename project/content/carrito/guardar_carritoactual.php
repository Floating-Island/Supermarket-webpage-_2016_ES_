<?php

include_once __DIR__.'/../sesion/validacion.php';
include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset( $_SESSION['id'] ) )
{
    if( isset( $_SESSION['carrito'] ) && ! empty($_SESSION['carrito']) )
    {
        $cliente = test_input( $_SESSION['id'] );
        $carrito = test_input( $_REQUEST["q"] );
        $productos = $_SESSION['carrito'];

        if( crear_guardar_carritoactual($cliente, $carrito, $productos) )
            echo "carrito guardado con exito!";
        else
            echo "ya existe ese carrito.";                   
    }
    else
        echo 'No hay nada en el carrito'; 
}
else
    echo 'Inicie sesión para guardar el carrito';



function crear_guardar_carritoactual($cliente,$carrito,$productos)
{
    if(crearCarrito($cliente, $carrito))
        return guardarProductos($cliente, $carrito, $productos);
    return FALSE;
}

function crearCarrito($cliente,$nombre_carrito)
{

    if( get_id_carrito($cliente,$nombre_carrito) )
        {
            echo "Ese nombre ya se usa para otro carrito.";
            return FALSE;
        }

    $sql = "INSERT INTO carritos 
    (carrito,  
    cliente)
     VALUES 
    (:nombre_carrito,
    :cliente)";

    $array_bind = [];
    $array_bind[':nombre_carrito'] =$nombre_carrito;
    $array_bind[':cliente'] =$cliente;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_INSERTER, DB_USUARIO_INSERTER_PASS, DataBase, $sql, $array_bind);

    return ($result->rowCount() > 0)? TRUE:FALSE;
}

function guardarProductos($cliente, $carrito, $productos)
{
    $id_carrito = get_id_carrito($cliente, $carrito);

    if ( $id_carrito !== FALSE )
        {
            $array_bind = [];
            $array_bind[':carrito'] = $id_carrito;   

            $conn = db_conectar(Nombre_Servidor, DB_USUARIO_INSERTER, DB_USUARIO_INSERTER_PASS, DataBase);
            
            foreach( $productos as $id_producto)
                {
                    $sql = "INSERT INTO carritos_productos 
                            (id_carrito,  
                            producto)
                            VALUES 
                            (:carrito,
                            :producto)";

                    
                    $array_bind[':producto'] =$id_producto;

                    $preparado = $conn->prepare($sql);

                    bind_asociativo($preparado,$array_bind);

                    db_query($preparado);
                    
                    if($preparado === FALSE)
                        {
                            db_cerrar($conn);
                            return FALSE;
                        }
                } 
            db_cerrar($conn);   
            return TRUE;
        }
    else
        return FALSE;
}

function get_id_carrito($cliente,$nombre_carrito)
{

    $sql = "SELECT id FROM carritos WHERE carrito=:nombre_carrito AND cliente=:cliente";

    $array_bind = [];
    $array_bind[':nombre_carrito'] =$nombre_carrito;
    $array_bind[':cliente'] =$cliente;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    if($result->rowCount() > 0)
        return $result->fetch(PDO::FETCH_ASSOC)['id'];
    return FALSE;
}

?>