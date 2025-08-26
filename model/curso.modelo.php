<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class CursoModelo extends mainModel
{
    //Insertar usuario
    protected function MdlInsertarCurso($datos)
    {
        $sql= mainModel::conectar()->prepare("INSERT INTO tbl_curso (cur_nombre, cur_codigo,cur_horas, id_tipo)
        VALUES(:nombre, :codigo, :horas, :tipo)");
        $sql->execute(array(':nombre'=>$datos['nombre'], ':codigo'=>$datos['codigo'], ':horas'=>$datos['horas'], ':tipo'=>$datos['tipo']));
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlActualizarCurso($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_curso SET cur_nombre= :nombre,cur_codigo= :codigo, cur_horas= :horas, id_tipo= :tipo WHERE id_curso= :ide");
        $sql->execute(array(':nombre'=> $datos['nombre'],':codigo'=>$datos['codigo'],':horas'=>$datos['horas'],':tipo'=>$datos['tipo'],':ide'=>$datos['id']));
        return $sql;
        $sql->close();
        $sql = null;
    }   
    protected function MdlEliminarCurso($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_curso WHERE id_curso= :ide");
        $sql->execute(array(':ide'=>$id));
        return $sql;
        $sql->close();
        $sql = null;
    }   
}