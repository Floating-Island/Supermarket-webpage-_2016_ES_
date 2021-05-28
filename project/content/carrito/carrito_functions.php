<?php

include_once __DIR__.'/../sesion/conexion_db.php';


function get_carrito($carrito)
{
    $sql = "SELECT productos.id, productos.nombre, productos.informacion, productos.imagen 
            FROM productos
            INNER JOIN carritos_productos 
            ON productos.id = carritos_productos.producto 
            WHERE carritos_productos.id_carrito=:carrito";

    $array_bind = [];
    $array_bind[':carrito'] =$carrito;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    $lista="";

    if ($result->rowCount() > 0)
        while($row = $result->fetch(PDO::FETCH_ASSOC))
            $lista.=producto_carritoguardado($row["imagen"],$row["id"],$row["nombre"],$row["informacion"],$carrito);

    return menu_carritoguardado($carrito,$lista);
}

function producto_carritoguardado($imagen,$id,$nombre,$informacion,$carrito)
{
    $producto=      '<li class="producto" id=producto_' . $id . '>
                        <div class="producto_box">
                            <div class="componentes_producto">
                                <div class="boximagen_producto">
                                <img src=' . $imagen . ' alt="imagen" class="imagen_producto">
                                </div>
                                <div class="boxdatos_producto">
                                    <div class="boxnombre_producto">
                                        <p>" ' . $nombre . ' "</p>
                                    </div>
                                    <div class="boxinformacion_producto">
                                        <p class="informacion_producto"> ' . $informacion . ' </p>
                                    </div>              
                                </div>
                            </div>
                            <div class="boxagregar_producto">
                                <button id=borrar_' . $id . ' class="boton_agregar-borrar"
                                onclick="carrito_guardado_eliminar(' . $carrito . ',' . $id . ');">
                                Borrar del carrito
                                </button>
                            </div>            
                        </div>
                    </li>'    ;

    return $producto;
}

function menu_carritoguardado($carrito,$lista)
{
    return '<div class="opciones_carrito">
                <a class="boton_opciones_carrito" id="boton_comparar_carrito" onclick="carrito_comparar(' . $carrito . ');">
                Comparar Carrito
                </a>
                <a class="boton_opciones_carrito" onclick="a_carritoactual(' . $carrito . ');">
                    Mover al Carrito
                </a>
                <a class="boton_opciones_carrito" onclick="eliminar_carrito_guardado(' . $carrito . ');">
                    Eliminar
                </a>
            </div>
            <div class="lista_box" id="productos_carrito_' . $carrito . '">
                <ul class="lista_productos" id="carrito_' . $carrito . '">                                     
                        ' . $lista . '
                </ul>
            </div>';
}

?>