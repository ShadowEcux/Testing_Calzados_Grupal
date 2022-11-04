<?php
    ini_set('display_errors', 'On');
    include_once '../conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    session_start();
    $idCliente = $_SESSION['idUsuario'];


    switch($opcion){
        case 1:
            $consulta = "call SP_insert_venta($idCliente)";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;    
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
    $conexion=null;
?>