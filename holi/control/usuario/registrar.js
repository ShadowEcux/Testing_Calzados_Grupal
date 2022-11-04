function registrar(){

    let nombre = document.getElementById("nombre").value;
    let apellidoP = document.getElementById("apellidoP").value;
    let apellidoM = document.getElementById("apellidoM").value;
    let DNI = document.getElementById("DNI").value;
    let direccion = document.getElementById("direccion").value;
    let celular = document.getElementById("celular").value;
    let usuario = document.getElementById("usuario").value;
    let password = document.getElementById("pasword").value;
    
    let mensaje = "";
    if(!nombre) mensaje+="- Nombre\n";
    if(!apellidoP) mensaje+="- Apellido Paterno\n";
    if(!apellidoM) mensaje+="- Apellido Materno\n";
    if(!DNI) mensaje+="- DNI\n";
    if(!direccion) mensaje+="- Dirección\n";
    if(!celular) mensaje+="- Celular\n";
    if(!usuario) mensaje+="- Nombre de Usuario\n";
    if(!password) mensaje+="- Contraseña\n";

    if(mensaje){
        alert("Los siguiente campos son incompletos o no son válidos: \n" + mensaje);
    } else{

        let datos = {
            nombre: nombre,
            apellidoP: apellidoP,
            apellidoM: apellidoM,
            DNI: DNI,
            direccion: direccion,
            celular: celular,
            usuario: usuario,
            password: password,
            opcion: 'registrar-cliente'
        }
    
        $.ajax({
            url: "modelo/usuario/usuario.php",
            type: "POST", 
            data: datos,  
            success: function(data) {
                alert("Usuario Registrado Satisfactoriamente");
                window.location.href="login.php";
                return false;
            }
        });

    }
    
}