<?php
    ini_set('display_errors', 'On'); 
    include_once '../conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
 
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : ''; 
    $password = (isset($_POST['password'])) ? $_POST['password'] : ''; 

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $apellidoP = (isset($_POST['apellidoP'])) ? $_POST['apellidoP'] : '';
    $apellidoM = (isset($_POST['apellidoM'])) ? $_POST['apellidoM'] : '';
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
    $celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
    $photo = (isset($_POST['photo'])) ? $_POST['photo'] : '';

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $password1 = 'ea221f08a9a16bb630d468f0ce045c05';
    if(isset($password)) $password = md5($password);
    session_cache_expire(36000);
    session_start();
    $idUsuario = (isset($_SESSION['idUsuario'])) ? $_SESSION['idUsuario'] : '';
    
    switch($opcion){
        case 'login':
            $consulta = "SELECT idUsuario, nombre, apellidoP, apellidoM, direccion, DNI, celular, usuario, idRol FROM usuario 
                         WHERE usuario = '$usuario' AND pasword = '$password' AND estado = 1;";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            if(isset($data[0])) {
                $_SESSION['idUsuario'] = $data[0]['idUsuario'];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['idRol'] = $data[0]['idRol'];
            }
        break;
        case 'registrar-cliente':
            $consulta = "INSERT INTO usuario (nombre, apellidoP, apellidoM, DNI, direccion,celular,usuario,pasword, idRol, estado) 
                         VALUES('$nombre', '$apellidoP', '$apellidoM', '$DNI', '$direccion', '$celular', '$usuario', '$password',2, 1)";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            /*$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            if(isset($data[0])) {
                session_cache_expire(36000);
                session_start();
                $_SESSION['idUsuario'] = $data[0]['idUsuario'];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['idRol'] = $data[0]['idRol'];
            }*/
        break;
        case 'listar-datos-propios':
            $consulta = "SELECT nombre, apellidoP, apellidoM, DNI, direccion, celular, photo
                         FROM usuario WHERE idUsuario = $idUsuario";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        case 'actualizar-datos-propios':
            $consulta = "UPDATE usuario SET nombre = '$nombre', apellidoP = '$apellidoP', apellidoM = '$apellidoM',
                         DNI = '$DNI', direccion = '$direccion', celular= '$celular', photo = '$photo'
                         WHERE idUsuario = '$idUsuario'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        break;
        case 'actualizar-password':
            $current_password = (isset($_POST['current_password'])) ? md5($_POST['current_password']) : '';
            $new_password = (isset($_POST['new_password'])) ? md5($_POST['new_password']) : '';

            $consulta = "call SP_actualizar_password('$idUsuario', '$current_password', '$new_password');";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

        case 'listar-historial':
            $consulta = "SELECT v.fecha, v.idCliente, c.nombre, c.imagen,d.cantidad, d.Total, dc.color, dc.stock from venta v
            INNER JOIN detalle_venta d on d.idVenta = v.idVenta
            INNER JOIN detallecalzado dc ON dc.idDetallaCalzado = d.idDetallaCalzado
            INNER JOIN calzado c ON c.idCalzado = dc.idCalzado WHERE v.idCliente = $idUsuario";
            // $consulta = "SELECT nombre, apellidoP, apellidoM, DNI, direccion, celular, photo
            //              FROM usuario WHERE idUsuario = $idUsuario";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    }
 
    echo json_encode($data, JSON_UNESCAPED_UNICODE); 
    $conexion=null;
?>
