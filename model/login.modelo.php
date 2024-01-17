<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class LoginModelo extends mainModel
{
    protected function MdlIniciarSession($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  tbl_docente as d, tbl_rol as r
        WHERE doc_cedula = :usuario  AND r.id_rol=d.id_rol AND doc_contrasenia = :password");
        $sql->bindParam(":usuario", $datos['usuario']);
        $sql->bindParam(":password", $datos['password']);
        $sql->execute();
        return $sql;

        $sql->close();
        $sql = null;
    }


}
