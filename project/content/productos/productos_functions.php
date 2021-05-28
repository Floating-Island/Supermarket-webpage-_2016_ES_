<?php

function llenarproducto($imagen,$id,$nombre,$informacion,$encarrito)
{
    $producto=      '<li class="producto" id=producto_' . $id . '>
                        <div class="producto_box">
                            <div class="componentes_producto">
                                <div class="boximagen_producto">
                                    <img src=' . $imagen . ' alt="imagen" class="imagen_producto">
                                </div>
                                <div class="boxdatos_producto">
                                    <div class="boxnombre_producto">
                                        <label class="nombre_producto">" ' . $nombre . ' "</label>
                                    </div>
                                    <div class="boxinformacion_producto">
                                        <p class="informacion_producto"> ' . $informacion . ' </p>
                                    </div>
                                </div>';

    $encarrito ? $producto.=sacarDeCarrito($id) : $producto.=meterEnCarrito($id);
                           
    $producto.=             '</div>            
                        </div>
                    </li>'    ;

    return $producto;
}

function sacarDeCarrito($id)
{
    $borrar=    '<button id=borrar_' . $id . ' class="boton_agregar-borrar" onclick="carrito_borrar(' . $id . ');">
                    Borrar del carrito
                </button>';
    return $borrar;
}

function meterEnCarrito($id)
{
    $agregar=   '<button id=agregar_' . $id . ' class="boton_agregar-borrar" onclick="carrito_agregar(' . $id . ');">
                    Agregar al carrito
                </button>';
    return $agregar;
}

function crear_lista($result)
{
    $lista="";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $carrito = encarrito($row["id"]);
            $lista.=llenarproducto($row["imagen"],$row["id"],$row["nombre"],$row["informacion"],$carrito);
        }
        if(empty($lista))  
            return "No se pudo encontrar productos con ese criterio...";
        else
            return '<div class="lista_box">
                <ul class="lista_productos" id="productosLista">
                    ' . $lista . ' 
                </ul>
                </div>'; 
}

function encarrito($id)
{
    $enelcarrito = FALSE;

    if( isset( $_SESSION['carrito'] ) )     
        foreach( $_SESSION['carrito'] as $elemento )
        {
            if( $elemento == $id )
                {
                    $enelcarrito = TRUE;
                    break;
                }
        }     
    return $enelcarrito;
}

?>