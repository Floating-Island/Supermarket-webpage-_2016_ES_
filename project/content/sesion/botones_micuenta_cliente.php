<?php

function botones_micuenta_cliente()
{
    if( isset($_SESSION['id']) )
    {
        echo    '<div class="box_boton_menu">
                    <a class="boton_menu" onclick="datos_mostrar();">
                        Datos
                    </a>
                    <div class="dropdown">
                        <a class="dropdown_inicio">Carritos guardados</a>
                        <div class="dropdown_contenido">';

        mostrar_carritos();

        echo '          </div>
                    </div>
                </div>';

    }
    else
        echo "Inicie sesión para acceder a sus datos.";
}

?>