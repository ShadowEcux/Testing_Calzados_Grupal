<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./vista/general.css">  
    <link href="assets/bootstrap/css/estilos.css" rel="stylesheet" type="text/css"/>

  </head>
  <body class="body_signUp">
    <a href="./index.php" class="navbar-brand col-auto">TIENDA STAR</a>
        <div class="container flex-center">
        <img src="recursos/img/otros/signup_fondo.jpg" class="login_fondo_su">
            <div class="style_table_su" ><!-- para guia-->
                <div class="title_signUp">Sign up</div>
                <div> <input type="text" class="style_table_input" id="nombre" placeholder="Ingrese nombre"></div>
                <div><input type="text" class="style_table_input" id="apellidoP" placeholder="Ingrese apellido paterno"></div>       
                <div><input type="text" class="style_table_input" id="apellidoM" placeholder="Ingrese apellido materno"></div>
                <div><input type="text" class="style_table_input" id="DNI" placeholder="Ingrese DNI"></div>
                <div><input type="text" class="style_table_input" id="direccion" placeholder="Ingrese dirección"></div>
                <div><input type="text" class="style_table_input" id="celular" minlength="9" maxlength="9" placeholder="Ingrese celular"> </div>
                <div><input type="text" class="style_table_input" id="usuario" placeholder="Ingrese usuario"></div>    
                <div><input type="password" class="style_table_input" id="pasword" placeholder="Ingrese contraseña"></div> 
                <div><button class="style_table_btn_su" onclick="registrar();">Registrarse</button></div>
        </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="./control/usuario/registrar.js"></script>  
  </body>
</html>