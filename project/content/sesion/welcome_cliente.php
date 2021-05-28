<?php

function welcome_cliente()
{
    if( isset( $_SESSION['cliente'] ) )
        echo      '<label class="welcome_sesion" id="welcome_user" > Hola, ' . $_SESSION['cliente'] . '. </label>
                    <a class="boton_sesion" href="logout.php">
                        Cerrar Sesión
                    </a>';
    else
        echo      '<a class="boton_sesion" href="iniciar_sesion.php">
                        Iniciar Sesión
                    </a>';
}

?>