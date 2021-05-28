<?php

require_once __DIR__.'/../sesion/conexion_db.php';


//para poder cambiar el mail, habría que agregar una funcion , por js, que valide que no se encuetre en la base de datos y la use otro usuario.

function guardar_datos($id/*,$email*/,$nombre,$apellido,$dni,$direccion,$alias)
{
    $sql = "UPDATE clientes 
            SET
            nombre=:nombre, 
            apellido=:apellido,
            dni=:dni, 
            direccion=:direccion,
            -- correo=:email, 
            alias=:alias
            WHERE 
            id=:id";

    $array_bind = [];
    $array_bind[':nombre'] = $nombre;
    $array_bind[':apellido'] = $apellido;
    $array_bind[':dni'] = $dni;
    $array_bind[':direccion'] = $direccion;
    // $array_bind[':email'] = $email;
    $array_bind[':alias'] = $alias;

    $array_bind[':id'] = $id;
        
    return db_query_preparada(Nombre_Servidor, DB_USUARIO_UPDATER, DB_USUARIO_UPDATER_PASS, DataBase, $sql, $array_bind);
}

function getDatos($id)
{
    if(isset($id))
    {       
        $sql = "SELECT  nombre, apellido, dni , correo, direccion, alias 
                FROM clientes
                WHERE id=:id LIMIT 1";
        
        $array_bind = [];
        $array_bind[':id'] = $id;
        $respuesta = db_query_preparada(Nombre_Servidor, DB_USUARIO_SELECTER, DB_USUARIO_SELECTER_PASS, DataBase, $sql, $array_bind);

        $datos="";

        $datos = $respuesta->fetch(PDO::FETCH_ASSOC);

        return to_formulario($datos['alias'],$datos['nombre'],$datos['apellido'],
                            $datos['dni'],$datos['correo'],$datos['direccion']);
    }
}

function to_formulario($alias,$nombre,$apellido,$dni,$mail,$direccion)//guarda los valores en los values.
{
    return <<<HTML
<div class="formulario_box">
    <div id="datos_clientes" name="datos_clientes" class="formulario_form">
        <legend class="legend_usuario">Datos</legend>
        <fieldset class="fieldset_datos">
            <span class="textoInformativo">Todos los campos son obligatorios.</span>
            <div class="marcoinput" id="alias">
                <label class="label_form"> Alias: </label>
                <input class="validar input_form" id="inputalias" value= "$alias" 
                onkeydown ="validar_alias(this.id);"
                type="text"  autocomplete="off" required> 
            </div>
            <div class="marcoinput" id="nombre">
                <label class="label_form"> Nombre: </label>
                <input class="validar input_form" id="inputnombre" value= "$nombre" 
                onkeydown ="validar_nombre(this.id);" 
                type="text" autocomplete="off" required>
            </div>
            <div class="marcoinput" id="apellido">
                <label class="label_form"> Apellido: </label>
                <input class="validar input_form" id="inputapellido" value= "$apellido" 
                onkeydown ="validar_apellido(this.id);" 
                type="text" autocomplete="off" required>
            </div>
            <div class="marcoinput" id="dni">
                <label class="label_form"> DNI: </label>
                <input class="validar obligatorio input_form" id="inputdni" value= "$dni" 
                onkeydown ="validar_dni(this.id);"
                type="text" autocomplete="on" required>
            </div>
            <div class="marcoinput" id="mail">
                <label class="label_form"> Mail: </label>
                <input class="validar input_form" id="inputmail" onkeydown ="validar_email(this.id);"
                 value= "$mail" type="email" placeholder="alguien@correo.com" autocomplete="off">
            </div>
            <div class="marcoinput" id="direccion">
                <label class="label_form"> Direccion: </label>
                <input class="validar input_form" id="inputdireccion" value= "$direccion" 
                onkeydown ="validar_direccion(this.id);"
                type="text" autocomplete="off" required>
            </div>
        </fieldset>
            <div class="marcosubmit_registro" id="guardar_datos">
                <button class="opciones_sesion" id="guardar_datos_boton" onclick="datos_guardar(this.id);" >Actualizar</button>
            </div>
    </div>
</div> 
<div class="formulario_box">
    <div id="contrasena_clientes" name="contrasena_clientes" class="formulario_form">
        <legend class="legend_usuario">Cambio de contraseña</legend>
        <fieldset class="fieldset_contrasena_cambiar">
            <span class="textoInformativo">Mínimo de 8 caracteres.</span>
            <div class="marcoinput" id="Contrasena">
                <label class="label_form"> Contraseña: </label>
                <input class="validar input_form" id="inputcontrasena" onkeydown ="validar_contrasena(this.id);"
                 type="password" autocomplete="off" required>
            </div>
            <div class="marcoinput" id="Contrasenanueva">
                <label class="label_form"> Nueva contraseña: </label>  
                <input class="validar input_form" id="inputnuevacontrasena" onkeydown ="validar_contrasena(this.id);" 
                type="password" autocomplete="off" required>
            </div>
            <div class="marcoinput" id="Contrasenanuevaconfirmar">
                <label class="label_form"> Confirmar contraseña: </label>
                <input class="validar input_form" id="inputnuevacontrasenaconfirmar" type="password" 
                onkeydown ="validar_igualdad('inputnuevacontrasena',this.id);" 
                autocomplete="off" required>
            </div>
        </fieldset>
            <div class="marcosubmit_registro" id="guardar_contrasena">
                <button class="opciones_sesion" id="guardar_contrasena_boton" onclick="contrasena_actualizar(this.id);">Modificar</button>
            </div>
    </div>
    <div id="errores">

    </div>
</div>
HTML;
}

?>