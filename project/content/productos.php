<?php
    include __DIR__.'/sesion/php_session_expire.php';
    include __DIR__.'/productos/cargar_categorias.php';
?>




<!DOCTYPE html>

<?php
    include __DIR__.'/recursos/head.php';
?>
    <html>
        <head>
            <title>Ahorria - productos</title>
        </head>
    </html>
        



<?php
    include __DIR__.'/recursos/header.php';
    include __DIR__.'/recursos/botones_header.php';
?>

    <html>    
        <body>

            <div class="content_box">
                <label class="titulo">Productos</label>
                <div class="grid-content">
                    <div class="left">                       
                        <div class="left_content">
                            <div class="box_boton_menu">
<?php
    include __DIR__.'/recursos/buscar.php';
?>                     
                                <div class="dropdown">
                                    <a class="dropdown_inicio">Categorias</a>
                                    <div class="dropdown_contenido" id="dropdown_categorias">                        
<?php
    echo cargar_categorias();
?>                       
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div> 
                    <div class="center_content" id="contenido_central" >
    
                    </div>
                </div>
                
            </div>       
        </body>
    </html>

<?php
    include __DIR__.'/recursos/footer.php';
?> 