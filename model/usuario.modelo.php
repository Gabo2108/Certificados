<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class UsuarioModelo extends mainModel
{
    //Insertar usuario
    protected function MdlInsertarUsuario($datos)
    {
        $sql    = mainModel::conectar()->prepare("INSERT INTO tbl_docente (doc_nombre, doc_apellido,doc_cedula,doc_contrasenia, id_curso,id_rol) VALUES( :nombre, :apellido, :Dni, :passw, :curso, :rol)");
        $sql->execute(array(':nombre'=>$datos['nombre'], ':apellido'=>$datos['apellido'], ':Dni'=>$datos['dni'], ':passw'=>$datos['passw'], ':curso'=>$datos['curso'], ':rol'=>$datos['rol']));
        return $sql;
        $sql->close();
        $sql = null;
    }
    //Actualizar Usuario
    protected function MdlActualizarUsuario($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tbl_docente SET doc_nombre= :nombre, doc_apellido= :apellido, id_curso= :curso, id_rol= :rol, doc_contrasenia= :pasw WHERE id_docente= :ide ");
        $sql->execute(array(':nombre'=> $datos['nombre'],':apellido'=>$datos['apellido'],':curso'=>$datos['curso'],':rol'=>$datos['rol'],':pasw'=>$datos['pasw'],':ide'=>$datos['id']));
        return $sql;
        $sql->close();
        $sql = null;
    }

}
