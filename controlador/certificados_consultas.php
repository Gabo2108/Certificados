<?php
include 'conexion.php';
class consulta
{
    public static function consultas($valor)
    {
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $consulta = "SELECT * FROM tbl_estudiante where est_fecha_inicio='$valor' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
