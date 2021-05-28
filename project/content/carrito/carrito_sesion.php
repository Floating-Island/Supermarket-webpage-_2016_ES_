<?php

function carrito_sesion()
{
        if( isset( $_SESSION['id'] ) )
        {
                if(isset( $_SESSION['carrito'] ) && empty( $_SESSION['carrito'] ) || !isset( $_SESSION['carrito'] ))
                        echo "Agregue productos para poder guardar el carrito.";
                else
                        echo    '<div class="busqueda_box">
                                        <div class="div_boton_busqueda">
                                                <form action="" class="form_busqueda">
                                                        <input type="text" class="input_busqueda" name="nombre_carrito" id="nombre_carrito" autocomplete="off">
                                                        <a class="boton buscar_busqueda" onclick="carrito_guardar();">Guardar</a>               
                                                </form>
                                        </div>
                                </div>';
        }
        else
                echo "inicie sesión para poder guardar el carrito.";

        if(isset( $_SESSION['carrito'] ) && !empty( $_SESSION['carrito'] ) )                                        
        {
                echo    '<a class="boton_menu boton_importante" onclick="borrar_carritoactual();" >
                                Borrar el carrito
                        </a>
                        <a class="boton_menu boton_importante" id="boton_comparar_actual" onclick="carrito_actual_comparar();" >
                                Comparar carrito
                        </a>';
        }      
}

?>