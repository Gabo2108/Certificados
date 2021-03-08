<?php
require 'conexion.php';
class login
{
    public static function mostrarUsuario($valor, $valor1)
    {
        $conexion = new conexion;
        $query = "SELECT * from tbl_docente where doc_cedula ='$valor' AND doc_contrasenia='$valor1'";
        $result= mysqli_query($conexion ->conexion(),$query);
        $row = mysqli_fetch_array($result);          
        return $row;
        mysqli_close($conexion);
    }
}