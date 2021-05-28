

function productos_carrito(id)
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
    
    
    xmlhttp.open("GET", "../content/carrito/get_carrito.php?q=" + id.toString(), true);
    xmlhttp.send();
}

function carrito_agregar(producto)
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento =document.getElementById( "agregar_" + producto.toString() );
            var respuesta = this.responseText;
            elemento.parentNode.insertAdjacentHTML('beforeend', respuesta);
            elemento.parentNode.removeChild(elemento);
            
        }
    };
    
    xmlhttp.open("GET", "../content/carrito/addto_carrito.php?q=" + producto.toString(), true);
    xmlhttp.send();
}

function carrito_guardar()
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento = document.getElementById("contenido_central");
            var respuesta = this.responseText;
            elemento.innerHTML = respuesta;       
        }
    };

    var nombre_carrito=document.getElementById("nombre_carrito").value;
    xmlhttp.open("GET", "../content/carrito/guardar_carritoactual.php?q=" + nombre_carrito.toString(), true);
    xmlhttp.send();
}

function a_carritoactual(id)
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento = document.getElementById("contenido_central");
            elemento.innerHTML = this.responseText;
            
            
        }
    };
    
    
    xmlhttp.open("GET", "../content/carrito/to_carritoactual.php?q=" + id.toString(), true);
    xmlhttp.send();
}

function carrito_borrar(producto)
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento =document.getElementById( "borrar_" + producto.toString() );
            var respuesta = this.responseText;
            elemento.parentNode.insertAdjacentHTML('beforeend', respuesta);
            elemento.parentNode.removeChild(elemento);
            
        }
    };
    
    xmlhttp.open("GET", "../content/carrito/sacarde_carritoactual.php?q=" + producto.toString(), true);
    xmlhttp.send();
}

function carrito_eliminar(producto)
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento =document.getElementById( "producto_" + producto.toString() );
            var respuesta = this.responseText;
            elemento.parentNode.parentNode.innerHTML = respuesta;
        }
    };
    
    xmlhttp.open("GET", "../content/carrito/borrarde_actual.php?q=" + producto.toString(), true);
    xmlhttp.send();
}

function carrito_guardado_eliminar(carrito, producto)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento = document.getElementById("contenido_central");
            var respuesta = this.responseText;
            elemento.innerHTML = respuesta;
        }
    };

    var post="carrito="+carrito+"&producto="+producto;
    
    xmlhttp.open("POST", "../content/carrito/eliminarde_carrito.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send(post);
}

function borrar_carritoactual()
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento = document.getElementById("contenido_central");
            elemento.innerHTML="El carrito está vacío...";
            var opciones = document.getElementById("guardar_carrito_actual");
            opciones.innerHTML="Agregue productos para poder guardar el carrito.";   
        }
    };
    
    
    xmlhttp.open("GET", "../content/carrito/borrar_carritoactual.php", true);
    xmlhttp.send();
}

function eliminar_carrito_guardado(carrito)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            var elemento =document.getElementById( "contenido_central" );
            var respuesta = this.responseText;
            elemento.innerHTML = respuesta;

            elemento =document.getElementById( "boton_carrito_" + carrito.toString() );
            elemento.parentNode.removeChild(elemento);

        }
    };

    var post="carrito="+carrito;
    
    xmlhttp.open("POST", "../content/carrito/eliminar_carrito.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send(post);
}

function carrito_comparar(id)
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

    var post="carrito="+id;
    
    xmlhttp.open("POST", "../content/carrito/comparar_carrito.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send(post);
}

function carrito_actual_comparar()
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
    
    xmlhttp.open("POST", "../content/carrito/comparar_actual.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send();
}

