<?php 
    class Conexion{	  
        public static function Conectar() {        
            define('servidor', 'localhost');
            define('nombre_bd', 'lp3calzado2');
            define('usuario', 'root');
            define('paswoord', '');					        
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, paswoord, $opciones);			
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }
        }
    }
?>