
function error_validar(id, info)
{
    var error = "error_" + id;
    var  errores = document.getElementById(error);
    if (errores === null)
    {
        var error = '<span class="info" id="error_' + id + '">' + 
                info +
                '</span>';
    
        var  elemento = document.getElementById("errores");
        elemento.insertAdjacentHTML('beforeend', error);
    }
}

function correcto_validar(id)
{
    var error = "error_" + id;
    var  elemento = document.getElementById(error);
    if (elemento != null)   
        elemento.parentNode.removeChild(elemento);
}

// onkeydown ="validar_nombre(this.id);"
// onkeydown ="validar_apellido(this.id);"
// onkeydown ="validar_dni(this.id);"
// onkeydown ="validar_email(this.id);"
// onkeydown ="validar_direccion(this.id);"
// onkeydown ="validar_alias(this.id);"
// onkeydown ="validar_igualdad("inputcontrasena",this.id);"
// onkeydown ="validar_contrasena(this.id);"

var MAXNOMBRELENGTH=30;
var MAXAPELLIDOLENGTH=30;
var MAXDNILENGTH=11;
var MAXCORREOLENGTH=254;
var MAXDIRECCIONLENGTH=100;
var MAXALIASLENGTH=11;
var MAXPASSLENGTH=255;
var MINPASSLENGTH=8;


function validar_nombre(id)
{
    var input = document.getElementById(id);

    var pat=/^([a-z]+$)/i;

    input.addEventListener("keyup", function()
    {
        if( !( pat.test(input.value) && input.value.length < MAXNOMBRELENGTH ) ) //limita el tamaño y valida
            error_validar(id, "el nombre no puede exceder los 30 caracteres. Solo letras.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_apellido(id)
{
    var input = document.getElementById(id);

    var pat=/^([a-z]+$)/i;
    input.addEventListener("keyup", function()
    {
        if( !( pat.test(input.value) && input.value.length < MAXAPELLIDOLENGTH ) ) //limita el tamaño y valida
            error_validar(id, "el apellido no puede exceder los 30 caracteres. Solo letras.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_dni(id)
{
    var input = document.getElementById(id);

    var pat=/^(\d+$)/;

    input.addEventListener("keyup", function()
    {
        if( !( pat.test(input.value) && input.value.length < MAXDNILENGTH ) )
        error_validar(id, "el DNI solo acepta numeros.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_email(id)
 {
    var input = document.getElementById(id);

    var pat=/\S+@\S+/;

    input.addEventListener("keyup", function()
    {
        if( !( pat.test(input.value) && input.value.length < MAXCORREOLENGTH ) ) //limita el tamaño y valida
            error_validar(id, "el e-mail no tiene un formato correcto.");
        else
            correcto_validar(id);
    }); 
    return;
}


function validar_direccion(id)
 {
    var input = document.getElementById(id);

    input.addEventListener("keyup", function()
    {
        if( !( input.value.length < MAXDIRECCIONLENGTH ) ) //limita el tamaño y valida
            error_validar(id, "El tamaño máximo de direccion es 100 caracteres.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_alias(id)
{
    var input = document.getElementById(id);

    var pat=/^([a-z]+$)/i;

    input.addEventListener("keyup", function()
    {
        if( !( pat.test(input.value) && input.value.length < MAXALIASLENGTH ) ) //limita el tamaño y valida
            error_validar(id, "el alias no puede exceder los 10 caracteres. Solo letras.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_contrasena(id)
 {
    var input = document.getElementById(id);

    input.addEventListener("keyup", function()
    {
        if( !( input.value.length >= MINPASSLENGTH ) ) //limita el tamaño y valida
            error_validar(id, "El tamaño de la contraseña es insuficiente.");
        else
            correcto_validar(id);
    }); 
    return;
}

function validar_igualdad(id_1,id_2)
{
    var input1 = document.getElementById(id_1);
    var input2 = document.getElementById(id_2);

    input2.addEventListener("keyup", function()
    {
        if( !( input1.value === input2.value ) ) //valida igualdad.
            error_validar(id_2, "Las contraseñas no coinciden.");
        else
            correcto_validar(id_2);
    }); 
    return;
}


