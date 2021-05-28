
//tecnicas AJAX

function productos_categoria(categoria)
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                var lista = document.getElementById("contenido_central");
                lista.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../content/productos/get_productos.php?q=" + categoria.toString(), true);
        xmlhttp.send();
}


function buscar_producto(input)
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
    var nombre =document.getElementById( input ).value;
    var post="producto="+nombre;
    nombre.value="";
    xmlhttp.open("POST", "../content/productos/buscar_producto.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send(post);
}

function enter_producto(texto)
{
    var input = document.getElementById(texto);
    input.addEventListener("keyup", function(event)
    {
    if (event.keyCode === 13) 
    {       
        buscar_producto(texto);
    }
    }); 
}



// Get the input field
