<?php
require 'conexion_BD.php';
class filtro{
    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = "SELECT DISTINCT(est_fecha_inicio) from tbl_estudiante";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        $rowfecha = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $rowfecha;
        mysqli_close($conexion->conectar());

    }
    public static function mostrartipo()
    {
        $conexion = new conexion();
        $consulta = "SELECT * from tbl_tipo";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        $rowrol = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $rowrol;
        mysqli_close($conexion->conectar());
    }
    public static function mostrarcurso()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM tbl_curso where id_tipo=2";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        $rowrol = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $rowrol;
        mysqli_close($conexion->conectar());
    }
    public static function mostrarcursos()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM tbl_curso";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        $rowrol = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $rowrol;
        mysqli_close($conexion->conectar());
    }
    public static function mostrarol()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM tbl_rol ";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        $rowrol = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $rowrol;
        mysqli_close($conexion->conectar());
    }
    public static function eliminarregistros($valor){
        $conexion = new conexion();
        $consulta = "DELETE FROM tbl_estudiante
        WHERE est_fecha_inicio = '$valor'";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        return $resultado;
        mysqli_close($conexion->conectar());
    }
   
}