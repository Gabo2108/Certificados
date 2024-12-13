<?php
if ($peticionAjax) {
    require_once "../model/curso.modelo.php";
} else {
    require_once "./model/curso.modelo.php";
}
class CursoControlador extends CursoModelo
{
    public function CtrInsertarCurso(){
        
        $nombre = mainModel::limpiar_cadena($_POST['nuevo']);
        $codigo = mainModel::limpiar_cadena($_POST['codigo']);
        $horas= mainModel::limpiar_cadena($_POST['horas']); 
        $tipo= mainModel::limpiar_cadena($_POST['tipo']);
        $datos=['nombre'=>$nombre,'codigo'=>$codigo,'horas'=>$horas,'tipo'=>$tipo];
        $insertar = CursoModelo::MdlInsertarCurso($datos);
        return ($insertar->rowCount() >= 1) ? true : false;
    }
    public function CtrActualizarCurso(){ 
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $codigo = mainModel::limpiar_cadena($_POST['codigo']);
        $horas= mainModel::limpiar_cadena($_POST['horas']); 
        $tipo= mainModel::limpiar_cadena($_POST['tipo']);
        $curso_id = $_POST['curso_id'] ;
        $datos=['nombre'=>$nombre,'codigo'=>$codigo,'horas'=>$horas,'tipo'=>$tipo,'id'=>$curso_id];
        $respuesta = CursoModelo::MdlActualizarCurso($datos);
        return ($respuesta->rowCount() >= 1) ? true : false;
    }
      public function CtrEliminarCurso()
     {
        $curso_id = $_POST['del_id'] ;
        $respuesta= mainModel::ejecutar_consulta_simple("DELETE FROM tbl_curso WHERE id_curso='$curso_id'");
        return ($respuesta->rowCount() >= 1) ? true : false;
     }
   
}