<?php

include_once __DIR__.'/../sesion/conexion_db.php';


function get_supermercados()//Obtiene los supermercados. Se podría modificar para seleccionar determinados supermercados.
{
    $sql = "SELECT id, nombre 
            FROM supermercados";

    $result = db_query_normal(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql);//no es una consulta parametrizada.

    $supermercados = [];

    if ($result->rowCount() > 0 )
        while($row = $result->fetch(PDO::FETCH_ASSOC))
            $supermercados[$row["id"]]=$row["nombre"];

    return $supermercados;
}

function get_productos_carrito($id_carrito)//obtiene un array asociativo con el id y nombre de los productos en el carrito guardado, pasado como parametro.
{
    $sql = "SELECT productos.id, productos.nombre 
            FROM productos
            INNER JOIN carritos_productos 
            ON productos.id = carritos_productos.producto 
            WHERE carritos_productos.id_carrito=:id_carrito";

    $array_bind = [];
    $array_bind[':id_carrito'] =$id_carrito;

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    $productos = [];

    if($result->rowCount() > 0)
        while( $row = $result->fetch(PDO::FETCH_ASSOC) )
                $productos[$row['id']] = $row['nombre'];
    return $productos;
}

function get_productos_actual($carrito)//obtiene un array asociativo con el id y nombre de los productos en el carrito actual, pasado como parametro.
{
    $formato_productos = to_formato_bind($carrito, 'producto');

    $sql = "SELECT id, nombre 
            FROM productos
            WHERE id IN ({$formato_productos})";

    $array_bind = [];
    $array_bind = to_array_bind($carrito, "producto");

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    $productos = [];

    if($result->rowCount() > 0)
        while( $row = $result->fetch(PDO::FETCH_ASSOC) )
                $productos[$row['id']] = $row['nombre'];
    
    return $productos;
}

function get_precios($productos, $supermercados) //Genera un array asociativo dentro de otro con los supermercados y los productos de la lista que tiene cada supermercado.
{

    $formato_productos = to_formato_bind(array_keys($productos), 'producto');
    $formato_supermercados = to_formato_bind(array_keys($supermercados), 'supermercado');


    $sql = "SELECT DISTINCT idproducto, idsupermercado, precio 
            FROM catalogo 
            WHERE
            idproducto IN ({$formato_productos}) 
            AND 
            idsupermercado IN ({$formato_supermercados})
            ORDER BY idproducto ASC, idsupermercado ASC";

    $array_bind = [];
    $array_bind +=to_array_bind(array_keys($productos), "producto");
    $array_bind +=to_array_bind(array_keys($supermercados), "supermercado");

    $result = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

    $precios_supermercados= llenar_precios($productos, $supermercados);

    if( $result->rowCount() > 0)
        while($row = $result->fetch(PDO::FETCH_ASSOC) )
            $precios_supermercados[ $row['idsupermercado'] ][ $row['idproducto'] ]= $row['precio'];

    return $precios_supermercados;
}

function to_formato_bind($elementos, $etiqueta)//transforma un array de productos en el formato necesario dentro la cláusula IN en una consulta SQL parametrizada.
{
    $resultado = "";
    foreach($elementos as $item)
        $resultado.=":" . $etiqueta . $item . ", ";
    
    return rtrim($resultado,", ");
}

function to_array_bind($elementos, $etiqueta)//transforma un array en uno asociativo para unirlo a la consulta SQL parametrizada.
{
    $resultado = [];

    foreach($elementos as $item)
        $resultado[":" . $etiqueta . $item] = $item;

    return $resultado;
}



function fill_precios($productos,$supermercados,$precios)//crea la tabla con los precios por cada supermercado y sus totales.
{
    $tabla= "";

    $tabla.=header_tabla($supermercados);

    $tabla.=filas_tabla($productos,$supermercados,$precios);

    $total = total_precios($precios);

    $tabla.=footer_tabla($supermercados,$total);

    return $tabla;
}

function llenar_precios($productos, $supermercados)//crea un array asociativo con los precios de cada producto en null.
{
    $precios_supermercados= [];

    foreach($productos as $prod_key => $prod_value)
        foreach($supermercados as $super_key => $super_value)
            $precios_supermercados[$super_key][$prod_key] = null;

    return $precios_supermercados;
}

function filas_tabla($productos,$supermercados,$precios)//llena las filas de la tabla.
{
    $tabla = "";
    foreach($productos as $prd_key => $prd_value)//llena las filas de la tabla.
    {
        $tabla.='<tr class="fila_tabla fila_item_tabla">
                <td class="item_tabla">' . $prd_value . '</td>';
        foreach($supermercados as $super_key => $super_value) //si no tiene precio se pone '-'.
        {
            if( $precios[$super_key][$prd_key] === null )
                $tabla.= '<td class="item_tabla"> - </td>';
            else
                $tabla.= '<td class="item_tabla">$' . $precios[$super_key][$prd_key]  . '</td>';
        }
        $tabla.='</tr>';
    }
    return $tabla;
}

function header_tabla($supermercados)
{
    $tabla = "";

    $tabla= '<div class="tabla" ><table class="tabla_comparar"> <tbody class="body_tabla">
            <tr class="fila_tabla"> <th class="header_tabla">Productos</th>';//se crea la cabecera de la tabla.
    foreach($supermercados as $supermercado) //$key => $value . Pone los nombres de los supermercados en la tabla.
        $tabla.= '<th class="header_tabla">' . $supermercado . '</th>';  
    $tabla.= '</tr>';

    return $tabla;
}

function footer_tabla($supermercados,$total)
{
    $tabla = "";

    $tabla.='<tr class="fila_tabla">
                <td class="footer_tabla"> Total </td>'; // ultimo renglon de la tabla, donde se ponen los totales.

    foreach($supermercados as $super_key => $super_value)// llena el pie de la tabla con los totales.
        $tabla.='<td class="footer_tabla">$' . $total[$super_key] . '</td>';

    $tabla.='</tr>
            </tbody></table></div>';//cierra la tabla.
    
    return $tabla;
}

function total_precios($precios)//calcula el total de la lista de productos para cada supermercado.
{
    $total = [];
    foreach($precios as $pre_key => $pre_value) 
            $total[ $pre_key ] = array_sum( $pre_value );

    return $total;
}

function vacios($supermercados, $precios)//cuenta la cantidad de productos faltantes por cada supermercado.
{
    $faltantes = [];

    foreach($supermercados as $key => $value)
        $faltantes[$key]= 0;
    
    foreach($precios as $supermercado_key => $productos_precio)
        foreach($productos_precio as $producto_key => $producto_precio)
            if($producto_precio === null)
                $faltantes[$supermercado_key]++;

    return $faltantes;
}

function faltantes($supermercados, $precios)//informa cuáles son los supermercados a los que les falta productos de la lista.
{
    $faltantes = vacios($supermercados, $precios);

    $resultado= "";

    foreach($faltantes as $super_id => $faltan)
            if($faltan >= 1)
                {
                    if($faltan == 1)
                        {
                            $resultado.='<div class="info_faltantes"> Hay ' . $faltan .
                            ' producto que no tiene ' . $supermercados[$super_id] . 
                            '.</div>';
                        }
                    else
                        $resultado.='<div class="info_faltantes"> Hay ' . $faltan .
                        ' productos que no tiene ' . $supermercados[$super_id] . 
                        '.</div>';
                }

    return $resultado;
}

function barato_posible($supermercados,$precios,$productos)//si es posible calcular el más barato, lo muestra. Si no, lo indica devolviendo FALSE.
{
    $faltantes = vacios($supermercados, $precios);

    $precio = INF;

    $totales = total_precios($precios);

    foreach($faltantes as $super_key => $carentes)
        if($carentes == 0)
            if($totales[$super_key] < $precio)
                {
                    $supermercado = $super_key;
                    $precio = $totales[$supermercado];
                }

    if($precio !== INF)
        return array($supermercado => $precio);
    else
        return FALSE;
}

function barato($supermercados,$precios,$productos)//Devuelve cuál es el supermercado más barato para comprar.
{
    $posible=barato_posible($supermercados,$precios,$productos);

    if($posible === FALSE)
        return "<div class='barato' > No se puede comparar, faltan productos en cada supermercado. </div>";
    else
        return '<div class="barato" >Es más barato comprar en ' . $supermercados[array_keys($posible)[0]] .  '!!!</div>';
}

function menu_carritocomparar($tabla,$barato,$info)//genera un cuadro con el resultado de la comparacion.
{
    return      '<div class="comparar">
                    <div class="titulo_comparacion"> Comparacion </div>
                    ' . $tabla . '
                    <div class=info_barato">'
                    . $barato . '
                    </div>
                    <div class="info_comparacion">' 
                    . $info . '
                    </div>
                </div>';
}

?>