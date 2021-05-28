<?php
    include_once __DIR__.'/../sesion/welcome_cliente.php';
?>



<html>
    <body>
        <noscript><div class="sin_javascript">Esta página necesita JavaScript habilitado.</div></noscript>
        <header>
            <div class="box header_box">
                    <div class="header_left">
                        <a  href="index.php" class="titulo_header header_logo" >
                            Ahorria.com
                        </a>
                    </div>
                    <div class="header_right">                   
<?php
    welcome_cliente();
?>
                    </div>
            </div>
        </header>
    </body>
</html>


