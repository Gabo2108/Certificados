<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class EstudianteModelo extends mainModel
{
    //Insertar usuario
    protected function MdlInsertarEstudiante($datos)
    {
        $tema = $datos["tema"];
        $tutor = $datos["tutor"];

        $sql    = mainModel::conectar()->prepare("UPDATE tbl_tema SET id_docente = :idoc where id_tema= :idte ");
        $sql->execute(array('idoc' => $tutor, ':idte' => $tema));
        $sql1    = mainModel::conectar()->prepare("UPDATE tbl_docente SET doc_ntemas = doc_ntemas + 1
         where id_docente= :idoce ");
        $sql1->execute(array('idoce' => $tutor));
        return $sql1;
        $sql->close();
        $sql = null;
    }
    protected function MdlActualizarEstudiante($datos)
    {

        $sql    = mainModel::conectar()->prepare("UPDATE tbl_estudiante SET est_nombre= :nombre, est_apellido= :apellido, est_fecha_inicio= :inicio, est_fecha_fin= :fin WHERE id_estudiante= :ide ");
        $sql->execute(array(':nombre'=> $datos['nombre'],':apellido'=>$datos['apellido'],':inicio'=>$datos['inicio'],':fin'=>$datos['fin'],':ide'=>$datos['id']));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
