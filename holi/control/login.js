function login(){
    let usuario = document.getElementById("usuario").value;
    let password = document.getElementById("password").value;
 
    if(usuario && password){
        let data = {
            usuario: usuario,
            password: password,
            opcion: "login",
            datatype:"json",
        }
 
        console.log(data);
    
        $.ajax({
            url: "./modelo/usuario/usuario.php",
            type: "POST",
            data: data,  
            success: function(data) {
                console.log(data);
                let resultado = JSON.parse(data);
                if(resultado[0]){
                    console.log("Datos ingresados correctamente");
                    localStorage.setItem("usuario", JSON.stringify(resultado[0]));
                    if(resultado[0].idRol == 1) window.location.href = "./vista/calzado.php";
                    else window.location.href = "./index.php";
                } else{
                    password = "";
                    alert("La contraseña ingresada es incorrecta");
                }
            }
        }); 
    } else{
        alert("Por favor, complete todos los campos.")
    }
}
