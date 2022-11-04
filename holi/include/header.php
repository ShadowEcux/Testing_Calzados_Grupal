<header>
  <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-success">
    <a href="./index.php" class="navbar-brand col-auto">TIENDA STAR</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ol class="navbar-nav mr-auto"> 
          <li class="nav-item">
          <?php 
          if(isset($_SESSION['usuario'])){
            if($_SESSION['idRol'] == 1){?>
              <li class="nav-item">
                <a class="nav-link pl-4 pr-4" href="./vista/calzado.php"> Calzados </a>
              </li> 
          <?php
            }
          ?>
            <li class="nav-item">
              <a class="nav-link pl-4 pr-4" href="./vista/cerrar-sesion.php">Cerrar Sesión </a>
            </li> 
          <?php 
          } else { ?>
            <a class="nav-link pl-4 pr-4" href="./login.php">Iniciar Sesión</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link pl-4 pr-4" href="./registrar.php">Regístrate</a>
          <?php 
          } ?>
          </li> 
        </ol>
    </div>
  </nav>
</header>

