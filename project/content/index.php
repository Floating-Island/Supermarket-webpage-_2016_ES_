<?php
    include __DIR__.'/sesion/php_session_expire.php';
?>


<!DOCTYPE html>

<?php
    include __DIR__.'/recursos/head.php';
?>
<html>
        <head>
            <title>Ahorria - inicio</title>
        </head>
</html>
<?php
    include __DIR__.'/recursos/header.php';
    include __DIR__.'/recursos/botones_header.php';
?>
<html>
    <body>
        <div class="content_box">
            <div class="grid-content-index"> 
                <div class="busqueda-wrapper">
<?php
    include __DIR__.'/recursos/buscar.php';
?>
                </div>
                <div class="center_content">
                    <div id="contenido_central" >
                        
                    </div>  
                </div>
            </div>   
        </div>
    </body>
</html>
<?php
    include __DIR__.'/recursos/footer.php';
?>