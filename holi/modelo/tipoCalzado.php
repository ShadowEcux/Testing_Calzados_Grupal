<?php
    include_once './conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : ''; 
    
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idTipoCalzado = (isset($_POST['idTipoCalzado'])) ? $_POST['idTipoCalzado'] : '';


    switch($opcion){
        case 1:
            $consulta = "INSERT INTO tipocalzado (nombre) VALUES('$nombre' ) ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     
            break;    
        case 2:        
            $consulta = "UPDATE tipocalzado SET nombre='$nombre'   WHERE idTipoCalzado='$idTipoCalzado' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            break;
        case 3:        
            $consulta = "DELETE FROM tipocalzado WHERE idTipoCalzado='$idTipoCalzado' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;
        case 4:    
            $consulta = "SELECT * FROM tipocalzado";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
            $conexion=null;
?>