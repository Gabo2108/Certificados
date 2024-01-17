<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class SelectControlador extends mainModel
{
    public function CtrMostrarfechas(){
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT(est_fecha_inicio) from tbl_estudiante order by est_fecha_inicio DESC");
        $respuesta = $consulta1->fetchAll();
        foreach($respuesta as $user){
            $response[] = array(
               "id" => $user['est_fecha_inicio'],
               "text" => $user['est_fecha_inicio']
            );
        };
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    
    public function CtrMostrarCursos(){
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT id_curso,cur_nombre FROM tbl_curso");
        $respuesta = $consulta1->fetchAll();
        foreach($respuesta as $user){
            $response[] = array(
               "id" => $user['id_curso'],
               "text" => $user['cur_nombre']
            );
        };
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    public function CtrMostrarRol(){
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_rol");
        $respuesta = $consulta->fetchAll();
        foreach($respuesta as $user){
            $response[] = array(
               "id" => $user['id_rol'],
               "text" => $user['rol_nombre']
            );
        };
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    public function CtrMostrarTipos()
    {
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * from tbl_tipo");
        $respuesta = $consulta->fetchAll();
        foreach($respuesta as $user){
            $response[] = array(
               "id" => $user['id_tipo'],
               "text" => $user['tip_nombre']
            );
        };
        return json_encode($response,JSON_UNESCAPED_UNICODE);
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
    public static function eliminarregistros($valor){
        $conexion = new conexion();
        $consulta = "DELETE FROM tbl_estudiante
        WHERE est_fecha_inicio = '$valor'";
        $resultado = mysqli_query($conexion->conectar(), $consulta);
        return $resultado;
        mysqli_close($conexion->conectar());
    }
   
}