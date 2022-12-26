var calzados = [];
var calzadoDetalles = [];
$(document).ready(function() {
    listarDatosPropios();
    $.ajax({
        type: 'POST',
        url: './modelo/calzado.php',
        data: {opcion: 6},
        success:(data)=>{
            console.log('data', data);
            calzados = JSON.parse(data);
            console.log(calzados);
            textHTML = ""; 
            calzados.forEach(c => {
                textHTML +=
                "<div class='col border card'>" +
                    "<img src='" + c.imagen + "' class='card-img-top' height='200px'>" +
                    "<div class='card-body'>" +
                        "<h6>" + c.nombre + "</h6>" +
                        //"<p>Descripción: " + c.descripcion + "</p>" +
                        "<a onclick='comprar(" + c.idCalzado + ")' class='btn btn-primary'>Comprar</a>" +
                    "</div>" +
                "</div>"
            });
            document.getElementById("lista-productos").innerHTML = textHTML; 
        }
    })
    listarCarrito();
    listarHistorial();
});

function comprar(id){
    $.ajax({
        type: 'POST',
        url: './modelo/calzado.php',
        data: {opcion: 5, idCalzado: id},
        success:(dataCalzado)=>{
            $.ajax({
                type: 'POST',
                url: './modelo/detalleCalzado.php',
                data: {opcion: 6, idCalzado: id},
                success:(dataDetalles)=>{
                    let calzado = JSON.parse(dataCalzado)[0];
                    calzadoDetalles = JSON.parse(dataDetalles);
                    calzadoDetalles.map(c=>{
                        c.nombre = calzado.nombre;
                        c.imagen = calzado.imagen;
                        return c;
                    })
                    console.log(calzadoDetalles);
                    console.log("Comprar " + id);
                    document.getElementById("calzado-nombre").innerHTML = calzado.nombre;
                    document.getElementById("calzado-imagen").src = calzado.imagen;
                    document.getElementById("calzado-precio").innerHTML = "S/. " + calzadoDetalles[0].precio;
                    document.getElementById("calzado-descripcion").innerHTML = calzado.descripcion;
                    listarTallas();
                    $('#modalComprar').modal('show');
                }
            });
        }
    })
}

function listarTallas(){
    let listaTallas = [];
    calzadoDetalles.forEach(c => {
        let encontrado = false;
        listaTallas.forEach(t => {
            if(t.idTalla == c.idTalla) encontrado = true;
        });
        if(!encontrado) listaTallas.push({idTalla:c.idTalla, tamaño:c.tamaño});
    });

    let select = document.getElementById('calzado-talla');
    select.innerHTML = "";
    listaTallas.forEach((talla) => {
        console.log(talla);
        let opt = document.createElement('option');
        opt.value = talla.idTalla;
        opt.innerHTML = talla.tamaño;
        select.appendChild(opt);
    }); 
    listarColores(listaTallas[0].idTalla);

    select.addEventListener('change', (event) => {
        listarColores(event.target.value);
    });
}

function listarColores(idTalla){
    let listaColores = [];
    console.log(calzadoDetalles);
    let select = document.getElementById('calzado-color');
    select.innerHTML = "";
    calzadoDetalles.forEach(c => {
        if(c.idTalla == idTalla) listaColores.push({color: c.color});
    });

    listaColores.forEach((color) => {
        console.log(color);
        let opt = document.createElement('option');
        opt.value = color.color;
        opt.innerHTML = color.color;
        select.appendChild(opt);
    }); 
}

function agregar(){
    calzadoDetalles.forEach(c => {
        let idTalla = document.getElementById("calzado-talla").value;
        let color = document.getElementById("calzado-color").value;
        if(c.idTalla == idTalla && c.color == color) {
            //console.log(c);
            agregarCarrito(c);
        }
    });
    $('#modalComprar').modal('hide');
}

function agregarCarrito(calzado){
    let carrito = localStorage.getItem("carrito");
    if(carrito){
        let dataCarrito = JSON.parse(carrito);
        let encontrado = false;
        dataCarrito.map(c => {
            if(c.idDetallaCalzado == calzado.idDetallaCalzado){
                encontrado = true;
                c.cantidad++;
            }
            return dataCarrito;
        });
        if(!encontrado){
            calzado.cantidad = 1;
            dataCarrito.push(calzado);
        }
        localStorage.setItem("carrito", JSON.stringify(dataCarrito));
    } else{
        calzado.cantidad = 1;
        localStorage.setItem("carrito", JSON.stringify([calzado]));
    }
    alert("Agregado al carrito");
    listarCarrito();
}

function listarCarrito(){
    let carrito = localStorage.getItem("carrito");
    let dataCarrito = [];
    if(carrito) dataCarrito = JSON.parse(carrito);
    console.log('--', dataCarrito);
    textHTML = ""; 
    dataCarrito.forEach(c => {
        textHTML +=
        "<tr>" +
            "<td colspan='2'>" +
                "<img class='mr-2' src='" + c.imagen + "' width='50' height='50'>" +
                c.nombre +
            "</td>" +
            "<td>" + c.tamaño + "</td>" +
            "<td>" + c.color + "</td>" +
            "<td>" + c.precio + "</td>" +
            "<td>" + c.cantidad + "</td>" +
            "<td>" + (c.precio * c.cantidad) + "</td>" +
            "<td onclick='eliminar(" + c.idDetallaCalzado + ")'><i class='fas fa-trash-alt pointer'></i></td>" +
        "</tr>"
    });
    console.log('⚡ ~ listarCarrito ~ textHTML', textHTML);
    document.getElementById("carrito").innerHTML = textHTML; 
}

function listarHistorial(){

    $.ajax({
        type: 'POST',
        url: './modelo/usuario/usuario.php',
        data: {opcion: 'listar-historial'},
        success:(dataCalzado) => {
            data = JSON.parse(dataCalzado);
            console.log('⚡ ~ listarHistorial ~ data', data);

            var textHTML = "";
            data.forEach(c => {
                textHTML +=
                "<tr>" +
                    "<td>" + c.fecha + "</td>" +
                    "<td>" + c.nombre + "</td>" +
                    "<td>" + c.cantidad + "</td>" +
                    "<td>" + c.color + "</td>" +
                    "<td>" + c.Total + "</td>" +
                    "<td colspan='2'>" +
                        "<img class='mr-2' src='" + c.imagen + "' width='50' height='50'>"
                    "</td>" +
                "</tr>"
            });
            document.getElementById("historial-table-detalle").innerHTML = textHTML; 

        }
    })
}

function vaciarCarrito(){
    localStorage.removeItem("carrito");
    listarCarrito();
    alert("Se vació el carrito");
}

function eliminar(id){
    let carrito = localStorage.getItem("carrito");
    let dataCarrito = [];
    if(carrito) dataCarrito = JSON.parse(carrito);
    dataCarrito = dataCarrito.filter(
        c=> c.idDetallaCalzado != id
    )
    console.log(dataCarrito);
    console.log(id);
    localStorage.setItem("carrito", JSON.stringify(dataCarrito));
    listarCarrito();
}

function guardarCambios(){
    let usuario = {
        nombre: $("#f-nombre")[0].value,
        apellidoP: $("#f-apellidoP")[0].value,
        apellidoM: $("#f-apellidoM")[0].value,
        DNI: $("#f-dni")[0].value,
        direccion: $("#f-direccion")[0].value,
        celular: $("#f-celular")[0].value,
        photo: $("#f-photo")[0].value,
        opcion: 'actualizar-datos-propios'
    }
    console.log(usuario);
    $.ajax({
        type: 'POST',
        url: './modelo/usuario/usuario.php',
        data: usuario,
        success:(data)=>{
            alert("Se actualizaron los datos satisfactoriamente");
            listarDatosPropios();
        }
    })
}

function listarDatosPropios(){
    $.ajax({
        type: 'POST',
        url: './modelo/usuario/usuario.php',
        data: {opcion: 'listar-datos-propios'},
        success:(usuarioData)=>{
            usuarioData = JSON.parse(usuarioData)[0];
            if (usuarioData) {
                $("#f-nombre")[0].value = usuarioData.nombre;
                $("#f-apellidoP")[0].value = usuarioData.apellidoP;
                $("#f-apellidoM")[0].value = usuarioData.apellidoM;
                $("#f-dni")[0].value = usuarioData.DNI;
                $("#f-direccion")[0].value = usuarioData.direccion;
                $("#f-celular")[0].value = usuarioData.celular;
                $("#f-photo")[0].value = usuarioData.photo;
    
                $("#r-nombre")[0].innerHTML = usuarioData.nombre,
                $("#r-apellidos")[0].innerHTML = usuarioData.apellidoP + " " + usuarioData.apellidoM,
                $("#r-dni")[0].innerHTML = usuarioData.DNI,
                $("#r-direccion")[0].innerHTML = usuarioData.direccion,
                $("#r-celular")[0].innerHTML = usuarioData.celular
                $("#r-photo").attr('src', `${usuarioData.photo}`);
            }
        }
    })
}

function cambiarPassword(){
    let current_password = $("#current-password")[0].value;
    let new_password = $("#new-password")[0].value;
    let confirm_password = $("#confirm-password")[0].value;

    if(!current_password || !new_password || !confirm_password){
        alert("Complete los campos");
    } else{
        if(new_password == confirm_password){
            let dataPassword = {
                current_password: current_password,
                new_password: new_password,
                opcion: 'actualizar-password'
            }
            $.ajax({
                type: 'POST',
                url: './modelo/usuario/usuario.php',
                data: dataPassword,
                success:(s)=>{
                    if(JSON.parse(s)[0].existe == 1){
                        alert("Contraseña Actualizada Satisfactoriamente");
                    } else{
                        alert("La Contraseña es Incorrecta");
                    }
                    $("#current-password")[0].value = "";
                    $("#new-password")[0].value = "";
                    $("#confirm-password")[0].value = "";
                }
            })
        } else{
            alert("Las contraseñas no coinciden");
        }
    }
}