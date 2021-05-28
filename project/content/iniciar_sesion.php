<!DOCTYPE html>

<?php
    include __DIR__.'/recursos/head.php';
?>
<html>
    <head>
        <title>Ahorria - registro</title>
    </head>
</html>
<?php
    include __DIR__.'/recursos/header_iniciar_sesion.php';
?>
<html>
    <body>
        <div class="content_box">
            <div class="center_content">
                   <div class="formulario_box">
                        <form id="inicio_sesion" name="inicio_sesion_clientes" class="formulario_form" 
                        method="POST" action="sesion/inicio_sesion.php">
                            <legend class="legend_usuario">Inicio de Sesión</legend>
                            <fieldset class="fieldset_inicio_sesion">
                                <div class="marcoinput">
                                    <label class="label_form"> Mail: </label>
                                    <input class="validar input_form" id="e-mail" onkeydown ="validar_email(this.id);"
                                     name="inputmail" type="email" required>
                                </div> 
                                <div class="marcoinput" id="Contrasena">
                                    <label class="label_form"> Contraseña: </label>
                                    <input class="validar input_form" name="inputcontrasena" id="contrasena" onkeydown ="validar_contrasena(this.id);"
                                     type="password" required>
                                </div>
                                <span class="textoInformativo">Mínimo de 8 caracteres para la contraseña.</span>      
                            </fieldset>
                                <div class="marcosubmit" id="iniciar_sesion">
                                    <a class="opciones_sesion" href="registrar.php">
                                        Crear cuenta
                                    </a>
                                    <a class="opciones_sesion" href="olvido_contrasena.php">
                                        Olvidé mi contraseña.
                                    </a>
                                    <input class="opciones_sesion" type="submit" value="Iniciar sesión">
                                </div>
                            <div id="errores">

                            </div>
                        </form>
                    </div> 
            </div>
        </div>
    </body>
</html>
<?php
    include __DIR__.'/recursos/footer.php';
?>