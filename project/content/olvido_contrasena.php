<!DOCTYPE html>

<?php
    include __DIR__.'/recursos/head.php';
?>
<html>
    <head>
        <title>Ahorria - pérdida de contraseña</title>
    </head>
</html>
<?php
    include __DIR__.'/recursos/header.php';
?>
<html>
    <body>
        <div class="content_box">
            <div class="center_content">
                <div class="formulario_box">
                    <div id="contrasena_olvidada" id="contrasena_olvidada" class="formulario_form">
                        <legend class="legend_usuario">Ingrese su e-mail</legend>
                        <fieldset class="fieldset_reset_contrasena">
                            <div class="marcoinput" id="mail">
                                <label class="label_form"> Mail: </label>
                                <input class="validar input_form" id="inputmail" onkeydown ="validar_email(this.id);"
                                 type="email" required>
                            </div> 
                        </fieldset>
                        <span class="textoInformativo">En unos instantes recibirá un mensaje al correo suministrado con indicaciones para ingresar una nueva contraseña.</span>
                        <div class="marcosubmit_registro" id="olvidocontrasena_submit">
                            <button class="opciones_sesion" id="inputenvio" 
                            onclick="contrasena_reset(this.id);" >Enviar</button>
                        </div>
                    </div>
                    <div id="errores">

                    </div>
                </div> 
            </div> 
        </div>
    </body>
</html>
<?php
    include __DIR__.'/recursos/footer.php';
?>



