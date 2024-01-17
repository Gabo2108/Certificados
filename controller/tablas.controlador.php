<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class TablasControlador extends mainModel
{
    public function CtrTablaNominaestudiante(){
        $sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_estudiante as e, tbl_curso as c,tbl_tipo as t where e.id_curso=c.id_curso and c.id_tipo=t.id_tipo");
        $respuesta = $sql->fetchAll();
        return json_encode($respuesta,JSON_UNESCAPED_UNICODE);

    }
    public function CtrTablaNominausuario()
    {
        $sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_docente as d,tbl_rol as r, tbl_curso as c where d.id_rol=r.id_rol and c.id_curso=d.id_curso");
        $respuesta = $sql->fetchAll();
        return json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }
    public function CtrTablaCursos()
    {
        $sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_curso as c,tbl_tipo as t where c.id_tipo=t.id_tipo");
        $respuesta = $sql->fetchAll();
        return json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }
}