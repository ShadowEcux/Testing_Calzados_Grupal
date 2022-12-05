<?php
    ini_set('display_errors', 'On');
    include_once './conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
    $imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
    $idTipoCalzado = (isset($_POST['idTipoCalzado'])) ? $_POST['idTipoCalzado'] : '';
    $idProveedor = (isset($_POST['idProveedor'])) ? $_POST['idProveedor'] : '';
    //$imagen = (isset($_FILES['imagen'])) ? $_FILES['imagen'] : '';
    
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idCalzado = (isset($_POST['idCalzado'])) ? $_POST['idCalzado'] : '';

    $idUsuario = (isset($_SESSION['idUsuario'])) ? $_SESSION['idUsuario'] : '';

    switch($opcion){
        case 1:
            $consulta = "INSERT INTO calzado (nombre, descripcion, imagen, idTipoCalzado, idProveedor) 
                         VALUES('$nombre', '$descripcion', '$idTipoCalzado' , '$idProveedor') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     

            break;    
        case 2:        
            $consulta = "UPDATE calzado 
                         SET nombre='$nombre', descripcion='$descripcion', imagen= '$imagen', idTipoCalzado=$idTipoCalzado, idProveedor=$idProveedor
                         WHERE idCalzado=$idCalzado ";		
                         echo $consulta;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            break;
        case 3:        
            $consulta = "DELETE FROM calzado WHERE idCalzado='$idCalzado' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;
        case 4:    
            $consulta = "SELECT c.idCalzado, c.nombre, c.descripcion, c.imagen, c.idTipoCalzado, tc.nombre as nombreT, c.idProveedor, p.nombre as nombreP 
                         FROM calzado c INNER JOIN tipocalzado tc  ON c.idTipoCalzado = tc.idTipoCalzado
                         INNER JOIN proveedor p ON c.idProveedor = p.idProveedor" ;
                         
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 5:
            $consulta = "SELECT * FROM calzado WHERE idCalzado = '$idCalzado'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        case 6:
            $consulta = "CALL SP_get_calzados()";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
    $conexion=null;
?>