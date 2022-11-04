<?php
    include_once './conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : ''; 
    
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idProveedor = (isset($_POST['idProveedor'])) ? $_POST['idProveedor'] : '';


    switch($opcion){
        case 1:
            $consulta = "INSERT INTO proveedor (nombre, telefono, direccion, estado) VALUES('$nombre', '$telefono', '$direccion', '$estado' ) ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     
            break;    
        case 2:        
            $consulta = "UPDATE proveedor SET nombre='$nombre', telefono='$telefono', direccion='$direccion', estado='$estado' WHERE idProveedor='$idProveedor' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            break;
        case 3:        
            $consulta = "DELETE FROM proveedor WHERE idProveedor='$idProveedor' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;
        case 4:    
            $consulta = "SELECT * FROM proveedor";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
            $conexion=null;
?>