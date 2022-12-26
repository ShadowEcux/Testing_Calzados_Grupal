<?php
  /* vista administrador  */

  if(!isset($_SESSION['usuario']) || $_SESSION['idRol'] != 1) echo "<script>window.location.href = '../index.php'</script>;";
  else {
?>    
  <div class="list-group" id="list-tab" role="tablist">
    <a href="../index.php" class="list-group-item list-group-item-action active">Inicio</a>
    <a href="./calzado.php" class="list-group-item list-group-item-action">Calzados</a>
    <a href="./proveedor.php" class="list-group-item list-group-item-action">Proveedores</a>
    <a href="./cliente.php" class="list-group-item list-group-item-action">Clientes</a>
    <a href="./tipoCalzado.php" class="list-group-item list-group-item-action">Categoría</a>
    <a href="./admin.php" class="list-group-item list-group-item-action">Administradores</a>
  </div>
<?php
  }
?>