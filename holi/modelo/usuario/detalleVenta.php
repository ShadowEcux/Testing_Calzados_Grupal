<?php
    ini_set('display_errors', 'On');
    include_once '../conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


    $idVenta = (isset($_POST['idVenta'])) ? $_POST['idVenta'] : '';
    $detalles = (isset($_POST['detalles'])) ? $_POST['detalles'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

    switch($opcion){
        case 1:
            for ($i=0; $i < count($detalles); $i++) { 
                //echo $conductores[$i]["id"];
                $idDetallaCalzado = $detalles[$i]["idDetallaCalzado"];
                $cantidad = $detalles[$i]["cantidad"];
                $total = $detalles[$i]["cantidad"] * $detalles[$i]["precio"];
                
                $consulta = "INSERT INTO detalle_venta (idDetallaCalzado, cantidad, total, idVenta)
                             VALUES ($idDetallaCalzado, $cantidad, $total, $idVenta);
                             UPDATE detalleCalzado SET stock = stock - '$cantidad' WHERE idDetallaCalzado = '$idDetallaCalzado'";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();        
            }
        break;    
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
    $conexion=null;
?>