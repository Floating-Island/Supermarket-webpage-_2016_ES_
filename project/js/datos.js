function datos_registar(id)
{
    var alias = document.getElementById('inputalias').value;
    var nombre = document.getElementById('inputnombre').value;
    var apellido = document.getElementById('inputapellido').value;
    var dni = document.getElementById('inputdni').value;
    var mail = document.getElementById('inputmail').value;
    var direccion = document.getElementById('inputdireccion').value;
    var contrasena = document.getElementById('inputcontrasena').value;
    var contrasenaconfirmar = document.getElementById('inputcontrasenaconfirmar').value;

    var post="alias="+alias+"&nombre="+nombre+"&apellido="+apellido+"&dni="+dni+
            "&mail="+mail+"&direccion="+direccion+"&contrasena="+contrasena+
            "&contrasenaconfirmar="+contrasenaconfirmar;

    var boton = document.getElementById(id);

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 1) 
            {
                var elemento = document.getElementById("resultado_registro");
                elemento.innerHTML = "";
                boton.innerHTML = "Registrando";
                boton.disabled = true;  
            }
            if (this.readyState == 4 && this.status == 200) 
            {
                var obj = JSON.parse(String(this.responseText));
                if(obj.registro == "registrado")
                {
                    boton.innerHTML = "Registrado";
                    setTimeout(function(){ 
                        window.location.assign("success.php");
                    }, 500);   
                }
                else
                {
                    var  elemento = document.getElementById("resultado_registro");
                    var html_respuesta='<span class="info" id="registro_respuesta"><br>' + obj.registro;

                    elemento.innerHTML = html_respuesta;
                    boton.innerHTML = "Registrar";
                    boton.disabled = false; 
                }
            }
        };
        
    xmlhttp.open("POST", "../content/datos/registro.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send(post);
}

function datos_mostrar()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                var elemento =document.getElementById( "contenido_central" );
                var respuesta = this.responseText;
                elemento.innerHTML=respuesta;
            }
        };
        
    xmlhttp.open("GET", "../content/datos/get_datos.php?q=", true);
    xmlhttp.send();
}

function datos_guardar(id)//se podría modificar para poder cambiar el mail, si es que otro usuario no lo está usando.
{
    var alias = document.getElementById('inputalias').value;
    var nombre = document.getElementById('inputnombre').value;
    var apellido = document.getElementById('inputapellido').value;
    var dni = document.getElementById('inputdni').value;
    var direccion = document.getElementById('inputdireccion').value;
    // var email = document.getElementById('inputmail').value;

    // if( !email_endb(email) )
    // {
        var post="alias="+alias+"&nombre="+nombre+"&apellido="+apellido+"&dni="+dni+"&direccion="+direccion/*+"&mail="+email*/;

        var boton = document.getElementById(id);

        var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 1) 
                {
                    boton.innerHTML = "Actualizando";
                    boton.disabled = true; 
                }
                if (this.readyState == 4 && this.status == 200) 
                {
                    var elemento =document.getElementById( "contenido_central" );
                    var respuesta = this.responseText;   

                    boton.innerHTML = "Actualizado";

                    setTimeout(function(){ elemento.innerHTML=respuesta; }, 500);
                }
            };
        
        xmlhttp.open("POST", "../content/datos/guardar_datos.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        xmlhttp.send(post);
    // }
}

// function email_endb(email) //iba a servir para, al cambiar el mail, chequear que no lo tenga otro usuario.
// {
//     var post="mail="+email;

//     var xmlhttp = new XMLHttpRequest();

//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) 
//         {
//             var obj = JSON.parse(String(this.responseText));

//             if(obj.en_db)
//             {
//                 error_validar(id+"_en_db", "Otro usuario posee ese e-mail.");
//                 return true;
//             }
//             else
//             {
//                 correcto_validar(id); 
//                 return false;
//             }
//         }
//     };

//     xmlhttp.open("POST", "../content/datos/chequeo_mail.php", true);
//     xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
//     xmlhttp.send(post);
//     return true;
// }



function contrasena_actualizar(id)
{
    var actual = document.getElementById('inputcontrasena').value;
    var nueva = document.getElementById('inputnuevacontrasena').value;
    var confirmada = document.getElementById('inputnuevacontrasenaconfirmar').value;

    var post="contrasena="+actual+"&nueva="+nueva+"&confirmar="+confirmada;

    var boton = document.getElementById(id);

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 1) 
            {
                boton.innerHTML = "Modificando";
                boton.disabled = true; 
            }
            if (this.readyState == 4 && this.status == 200) 
            {
                respuesta = this.responseText;
                boton.innerHTML = respuesta;
                setTimeout(function(){ boton.innerHTML = "Modificar"; }, 2000);
                boton.disabled = false;
            }
        };
        
        xmlhttp.open("POST", "../content/datos/contrasena_actualizar.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        xmlhttp.send(post);
}

function contrasena_reset(id)
{
    var mail = document.getElementById('inputmail').value;

    var post="mail="+mail;

    var boton = document.getElementById(id);

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 1) 
            {
                boton.innerHTML = "Enviando";
                boton.disabled = true;
            }
            if (this.readyState == 4 && this.status == 200) 
            {
                respuesta = this.responseText;
                boton.innerHTML = respuesta;
                
                setTimeout(function(){ boton.innerHTML = "Enviar"; }, 2000);
                boton.disabled = false;
            }
        };

        xmlhttp.open("POST", "../content/datos/contrasena_olvidada.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        xmlhttp.send(post);
}