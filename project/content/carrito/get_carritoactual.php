<?php

include_once __DIR__.'/../sesion/conexion_db.php';
include_once __DIR__.'/../sesion/php_session_expire.php';


function get_carritoactual()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if( !isset( $_SESSION['carrito'] ) || empty( $_SESSION['carrito'] ) )
            echo "El carrito está vacío...";
        else
        {
            $conn = db_conectar(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase);
            $lista="";
            foreach( $_SESSION['carrito'] as $id_producto)
            {
                $sql = "SELECT id, nombre, informacion, imagen 
                        FROM productos 
                        WHERE id=:id_producto LIMIT 1";
                        
                $array_bind = [];
                $array_bind[':id_producto'] =$id_producto;

                $preparado = $conn->prepare($sql);

                bind_asociativo($preparado, $array_bind);

                db_query($preparado);

                if ($preparado->rowCount() > 0)
                {
                    $row = $preparado->fetch(PDO::FETCH_ASSOC);
                    $lista.=producto_carritoactual($row["imagen"],$row["id"],$row["nombre"],$row["informacion"]);                 
                }
            }
            db_cerrar($conn);

            echo  lista_carritoactual($lista);   
        }       
    }
}

function producto_carritoactual($imagen,$id,$nombre,$informacion)
{
    $producto=      '<li class="producto" id=producto_' . $id . '>
                        <div class="producto_box">
                            <div class="componentes_producto">
                                <div class="boximagen_producto">
                                <img src=' . $imagen . ' alt="imagen" class="imagen_producto">
                                </div>
                                <div class="boxdatos_producto">
                                    <div class="boxnombre_producto">
                                        <p>" ' . $nombre . ' "</label>
                                    </div>
                                    <div class="boxinformacion_producto">
                                        <p class="informacion_producto"> ' . $informacion . ' </p>
                                    </div>              
                                </div>
                            </div>
                            <div class="boxagregar_producto">
                                <button id=borrar_' . $id . ' class="boton_agregar-borrar"
                                onclick="carrito_eliminar(' . $id . ');">
                                Borrar del carrito
                                </button>
                            </div>            
                        </div>
                    </li>'    ;

    return $producto;
}

function lista_carritoactual($lista)
{
    return '<div class="lista_box">
                <ul class="lista_productos" id="carritoActual">                                     
                ' . $lista . '
                </ul>
            </div>';
}

?>