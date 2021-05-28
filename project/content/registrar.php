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
    include __DIR__.'/recursos/header.php';
?>
<html>
    <body>      
        <div class="content_box">
            <div class="center_content">
                <label id="registro">Registro</label> 
                <div class="formulario_box">
                    <div id="registro_clientes" name="registro_clientes" class="formulario_form" 
                    method="POST" action="/datos/registro.php">
                        <legend class="legend_usuario">Datos</legend>    
                        <fieldset class="fieldset_datos">
                            <div class="marcoinput" id="alias">
                                <label class="label_form"> Alias: </label>
                                <input class="validar input_form" id="inputalias" 
                                onkeydown ="validar_alias(this.id);" name="inputalias" type="text" required>
                            </div>
                            <div class="marcoinput" id="nombre">
                                <label class="label_form"> Nombre: </label>
                                <input class="validar input_form" id="inputnombre" 
                                onkeydown ="validar_nombre(this.id);" name="inputnombre" type="text" required>
                            </div>
                            <div class="marcoinput" id="apellido">
                                <label class="label_form"> Apellido: </label>
                                <input class="validar input_form" id="inputapellido" 
                                onkeydown ="validar_apellido(this.id);" name="inputapellido" type="text" required>
                            </div>
                            <div class="marcoinput" id="dni">
                                <label class="label_form"> DNI: </label>
                                <input class="validar obligatorio input_form" id="inputdni" 
                                onkeydown ="validar_dni(this.id);" name="inputdni" type="text" required>
                            </div> 
                            <div class="marcoinput" id="mail">
                                <label class="label_form"> Mail: </label>
                                <input class="validar input_form" id="inputmail" 
                                onkeydown ="validar_email(this.id);" name="inputmail" type="email" required>
                            </div> 
                            <div class="marcoinput" id="direccion">
                                <label class="label_form"> Direccion: </label>
                                <input class="validar input_form" id="inputdireccion" 
                                onkeydown ="validar_direccion(this.id);" name="inputdireccion" type="text" required>
                            </div>
                        </fieldset>
                        <legend class="legend_usuario">Contraseña</legend>
                        <fieldset class="fieldset_contrasena">
                            <span class="textoInformativo">Mínimo de 8 caracteres.</span>
                            <div class="marcoinput" id="Contrasena">
                                <label class="label_form"> Contraseña: </label>
                                <input class="validar input_form" id="inputcontrasena" 
                                onkeydown ="validar_contrasena(this.id);" name="inputcontrasena" type="password"
                                 autocomplete='off' required>
                            </div>
                            <div class="marcoinput" id="Contrasenaconfirmar">
                                <label class="label_form"> Confirmar contraseña: </label>
                                <input class="validar input_form" id="inputcontrasenaconfirmar" 
                                onkeydown ="validar_igualdad('inputcontrasena',this.id);" name="inputcontrasenaconfirmar" 
                                type="password" autocomplete='off' required>
                            </div>        
                        </fieldset>
                            <div class="marcosubmit_registro" id="guardar">
                                <button class="opciones_sesion" id="guardar_boton"
                                 onclick="datos_registar(this.id);" >Registrar</button>
                            </div>
                    </div>
                    <div id="errores">

                    </div>
                    <div id="resultado_registro">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include __DIR__.'/recursos/footer.php';
?>