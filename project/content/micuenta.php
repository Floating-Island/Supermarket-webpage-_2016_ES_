<?php
    include __DIR__.'/sesion/php_session_expire.php';
?>


<!DOCTYPE html>
<?php
    include __DIR__.'/recursos/head.php';
?>
<html>
    <head>
        <title>Ahorria - cuenta</title>
    </head>
</html>
<?php
    include __DIR__.'/recursos/header.php';
    include __DIR__.'/recursos/botones_header.php';
?>
<html>
    <body>     
        <div class="content_box"> 
            <label class="titulo">Mi cuenta</label>
            <div class="grid-content">
                <div class="left">  
                        <div class="left_content">
<?php
    include __DIR__.'/recursos/botones_micuenta.php';
?>
                        </div>
                </div>
                <div class="center_content" id="contenido_central">
                            
                </div>
            </div>
            
        </div>
    </body>
</html>
<?php
    include __DIR__.'/recursos/footer.php';
?>