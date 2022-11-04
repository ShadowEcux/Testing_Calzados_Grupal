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

  <body class="body_login">
     <a href="./index.php" class="navbar-brand col-auto">TIENDA STAR</a>
        <div class="container flex-center">
                <img src="recursos/img/otros/login_fondo.jpg" class="login_fondo">
                <!-- tabla de inicio de sesión -->
                <div class="style_table" ><!-- para guia-->
                  <div class="title_LogIn">Iniciar sesión</div>
                  <div><input class="style_table_input" type="text" class="form-control" id="usuario" placeholder="Username"></div>
                  <div><input class="style_table_input" type="password" class="form-control" id="password" placeholder="Password"></div>
                  <div><button class="style_table_btn" onclick="login();">Iniciar</button></div>
                  <div class="style_table_text">¿No estás registrado? <a class="a_link_table" href="./registrar.php">Regístrate</a></div>
                </div>
<!--
                    <div class="form-group">
                        <label class="style_login_label">Usuario</label>
                        <input class="style_login_input" type="text" class="form-control" id="usuario">
                    </div>
                    <div class="form-group">
                        <label class="style_login_label">Contraseña</label>
                        <input class="style_login_input" type="password" class="form-control" id="password">
                    </div>            
-->      
        </div>
   

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="./control/login.js"></script> 
    <script type="text/javascript" src="./control/cliente.js"></script>  
  </body>
</html>