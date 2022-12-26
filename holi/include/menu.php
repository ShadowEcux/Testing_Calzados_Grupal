<?php
  /* vista administrador  */

  if(!isset($_SESSION['usuario']) || $_SESSION['idRol'] != 1) echo "<script>window.location.href = '../index.php'</script>;";
  else {
?>    
  <div class="list-group" id="list-tab" role="tablist">
    <a href="../index.php" class="list-group-item list-group-item-action active section-inicio">Inicio</a>
    <a href="./calzado.php" class="list-group-item list-group-item-action section-calzados">Calzados</a>
    <a href="./proveedor.php" class="list-group-item list-group-item-action section-proveedores">Proveedores</a>
    <a href="./cliente.php" class="list-group-item list-group-item-action section-clientes">Clientes</a>
    <a href="./tipoCalzado.php" class="list-group-item list-group-item-action section-categoría">Categoría</a>
    <a href="./admin.php" class="list-group-item list-group-item-action section-administradores">Administradores</a>
  </div>
<?php
  }
?>