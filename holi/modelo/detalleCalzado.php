<?php
    include_once './conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
    $color = (isset($_POST['color'])) ? $_POST['color'] : '';
    $idTalla = (isset($_POST['idTalla'])) ? $_POST['idTalla'] : '';
    $stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';
    
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idCalzado = (isset($_POST['idCalzado'])) ? $_POST['idCalzado'] : '';
    $idDetallaCalzado = (isset($_POST['idDetallaCalzado'])) ? $_POST['idDetallaCalzado'] : '';


    switch($opcion){
        case 1:
            $consulta = "INSERT INTO detalleCalzado (idCalzado, idTalla, color, stock, precio)
                         VALUE ($idCalzado, $idTalla , '$color', $stock, $precio);";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     
            break;    
        case 2:        
            $consulta = "UPDATE calzado 
                         SET descripcion='$descripcion', precioVenta='$precioVenta', color='$color',
                          talla='$talla', stock='$stock', idTipoCalzado='$idTipoCalzado', idProveedor='$idProveedor'
                         WHERE idCalzado='$idCalzado' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            break;
        case 3:        
            $consulta = "DELETE FROM detalleCalzado WHERE idDetallaCalzado='$idDetallaCalzado' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;
        case 4:    
            $consulta = "SELECT c.idDetallaCalzado, c.idCalzado, c.color, c.stock, c.precio, t.idTalla, t.tamaño FROM detallecalzado c 
            INNER JOIN talla t ON c.idTalla = t.idTalla WHERE c.idCalzado = '$idCalzado';" ;
                         
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
            $consulta = "call SP_get_detalles_calzado('$idCalzado')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
    $conexion=null;
?>