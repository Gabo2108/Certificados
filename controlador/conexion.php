<?php 
class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'dbcertificados');
        define('usuario', 'root');
        define('password', 'usbw');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
    private $host = "localhost";
    private $user = "root";
    private $password = "usbw";
    private $database = "dbcertificados";

    public function conexion()
    {
       $conexion = new mysqli($this->host,$this->user,$this->password,$this->database);
       $conexion->query("SET NAMES 'utf8'");
       if ($conexion->error) {
           die("Error de conexion ".$conexion->error);
           
       } else{
           return $conexion;

       }
    }
}