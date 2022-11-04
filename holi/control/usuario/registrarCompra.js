var dataCarrito;
$(document).ready(function() {
    let usuario = localStorage.getItem("usuario");
    if(usuario){
        let user = JSON.parse(usuario);
        document.getElementById("r-nombre").innerHTML = user.nombre;
        document.getElementById("r-apellidos").innerHTML = user.apellidoP + " " + user.apellidoM;
        document.getElementById("r-dni").innerHTML = user.DNI;
        document.getElementById("r-direccion").innerHTML = user.direccion;
        document.getElementById("r-celular").innerHTML = user.celular;

        let carrito = localStorage.getItem("carrito");
        if(carrito){
            dataCarrito = JSON.parse(carrito);
            let subtotal = 0;
            let costoEnvio = 0;
            let total = 0;
            dataCarrito.forEach(calzado => {
                subtotal += calzado.precio * calzado.cantidad;
            });
            total = subtotal + costoEnvio;

            document.getElementById("r-subtotal").innerHTML = "S/. " + subtotal;
            document.getElementById("r-costoEnvio").innerHTML = "Gratis"//"S/. " + costoEnvio;
            document.getElementById("r-total").innerHTML = "S/. " + total;
        } else{
            window.location.href="../../index.php";
        }
    } else{
        window.location.href="./index.php";
    }
});

function finalizar(){
    $.ajax({
        url: "modelo/usuario/venta.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:1},
        success: function(dataVenta) {
            let data = JSON.parse(dataVenta);
            let idVenta = data[0].idVenta;
            $.ajax({
                url: "modelo/usuario/detalleVenta.php",
                type: "POST",
                datatype:"json",
                data:  {idVenta: idVenta, detalles: dataCarrito, opcion:1},
                success: function(dataFinal) {
                    console.log(dataFinal);
                    alert("Gracias por su compra");
                    localStorage.removeItem("carrito");
                    window.location.href="index.php"
                }
            });	
        }
    });	
}