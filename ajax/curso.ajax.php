<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if (isset($_POST['nuevo'])|| isset($_POST['nombre']) && isset($_POST['codigo']) && isset($_POST['horas']) && isset($_POST['tipo']) && isset($_POST['curso_id']) || isset($_POST['del_id'])) {
    require_once "../controller/curso.controlador.php";

    // Insertar 
    if (isset($_POST['nuevo']) && isset($_POST['codigo']) && isset($_POST['horas']) && isset($_POST['tipo'])  ) {

        $InCurso = new CursoControlador();
        echo $InCurso->CtrInsertarCurso();
    }
    //Actualizar
    if (isset($_POST['nombre']) && isset($_POST['codigo']) && isset($_POST['horas']) && isset($_POST['tipo']) && isset($_POST['curso_id'])) {
        $UpCurso = new CursoControlador();
        echo $UpCurso->CtrActualizarCurso();
    }

    // Eliminar
    if (isset($_POST['del_id'])) {
        $DelCurso = new CursoControlador();
        echo $DelCurso->CtrEliminarCurso();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}