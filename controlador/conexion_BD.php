<?php
class conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "usbw";
    private $database = "dbcertificados";

    public function conectar()
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