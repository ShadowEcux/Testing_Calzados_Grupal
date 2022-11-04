<?php
    include_once './conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $apellidoP = (isset($_POST['apellidoP'])) ? $_POST['apellidoP'] : '';
    $apellidoM = (isset($_POST['apellidoM'])) ? $_POST['apellidoM'] : '';
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
    $celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $pasword = (isset($_POST['pasword'])) ? $_POST['pasword'] : ''; 
     
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idRol = (isset($_POST['idRol '])) ? $_POST['idRol '] : '';


    switch($opcion){
        case 1:
            $consulta = "INSERT INTO usuario (nombre, apellidoP, apellidoM, DNI, direccion,celular,usuario,pasword) VALUES('$nombre', '$apellidoP', '$apellidoM', '$DNI', '$direccion', '$celular', '$usuario', '$pasword','$idRol') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();     
            break;    
        case 2:        
            $consulta = "UPDATE usuario SET nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', DNI='$DNI', direccion='$direccion' , celular='$celular' , usuario='$usuario' , pasword='$pasword' ,idRol='$idRol'
            WHERE idUsuario='$idUsuario' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            break;
        case 3:        
            $consulta = "DELETE FROM usuario WHERE idUsuario='$idUsuario' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;
        case 4:    
            $consulta = "SELECT *, CASE WHEN idRol = 1 THEN 'admin' ELSE 'colaborador' END as rol FROM usuario";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;

    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
            $conexion=null;
?>