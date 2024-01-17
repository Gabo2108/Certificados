<?php
if ($peticionAjax) {
    require_once "../model/estudiante.modelo.php";
} else {
    require_once "./model/estudiante.modelo.php";
}
class EstudianteControlador extends EstudianteModelo
{
    public function CtrInsertarEstudiante(){
        
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $apellido = mainModel::limpiar_cadena($_POST['apellido']);
        $Dni = mainModel::limpiar_cadena($_POST['DNI']);
        $correo =  mainModel::limpiar_cadena($_POST['correo']) ;
        $curso =  mainModel::limpiar_cadena($_POST['curso']) ;
        $infocurso= mainModel::ejecutar_consulta_simple("SELECT id_curso,cur_codigo,cur_nombre FROM tbl_curso WHERE cur_nombre = $curso");
        $inicio= date("Y-m-d", strtotime($_POST['fecha_inicio']), PDO::PARAM_STR); //Lo comvierte a formato de fecha en MySQL
        $fin= date("Y-m-d", strtotime($_POST['fecha_fin']), PDO::PARAM_STR);//Lo comvierte a formato de fecha en MySQL
        $datos=['nombre'=>$nombre,'apellido'=>$apellido,'dni'=>$Dni,'correo'=>$correo,'curso'=> $curso,'inicio'=>$inicio,'fin'=>$fin,];
        $insertar = EstudianteModelo::MdlInsertarEstudiante($datos);

    }
    public function CtrActualizarEstudiante(){ 
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $apellido = mainModel::limpiar_cadena($_POST['apellido']);
        $inicio= $_POST['fecha_inicio']; //Lo comvierte a formato de fecha en MySQL
        $fin= $_POST['fecha_fin'];//Lo comvierte a formato de fecha en MySQL
        $user_id = $_POST['user_id'] ;
        $datos=['nombre'=>$nombre,'apellido'=>$apellido,'inicio'=>$inicio,'fin'=>$fin,'id'=>$user_id];
        $respuesta = EstudianteModelo::MdlActualizarEstudiante($datos);
        return ($respuesta->rowCount() >= 1) ? true : false;
    }
      public function CtrEliminarEstudiante()
     {
        $user_id = $_POST['del_id'] ;
        $respuesta= mainModel::ejecutar_consulta_simple("DELETE FROM tbl_estudiante WHERE id_estudiante=$user_id");
        return ($respuesta->rowCount() >= 1) ? true : false;
     }
   
}