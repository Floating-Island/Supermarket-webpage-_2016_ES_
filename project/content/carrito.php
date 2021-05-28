<?php
        include __DIR__.'/sesion/php_session_expire.php';
        include_once __DIR__.'/carrito/get_carritoactual.php';
        include_once __DIR__.'/carrito/carrito_sesion.php';
?>

<!DOCTYPE html>

<?php
    include __DIR__.'/recursos/head.php';
?>
        <html>
                <head>
                        <title>Ahorria - Carrito</title>
                </head>
                <body>              
<?php  
    include __DIR__.'/recursos/header.php';
    include __DIR__.'/recursos/botones_header.php';
?>
                        <div class="content_box">
                                <label class="titulo">Carrito</label>
                                <div class="grid-content">
                                        <div class="left"> 
                                                <div class="left_content" id="contenido_izquierdo">
                                                        <div class="box_boton_menu" id="guardar_carrito_actual">
<?php 
        carrito_sesion();
?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="center_content" id="contenido_central" >                                  
<?php
        get_carritoactual();
?>                             
                                        </div>
                                        
                                </div>
                        </div>
                </body>
        </html>
<?php
    include __DIR__.'/recursos/footer.php';
?> 
