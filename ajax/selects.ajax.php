<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if (isset($_POST['cursos']) || isset($_POST['Rol']) || isset($_POST['tipo']) || isset($_POST['fecha']) ){
    require_once "../controller/select.controlador.php";

    // listar fechas
    if (isset($_POST['fecha'])) {
        $Lfechas = new SelectControlador();
        echo $Lfechas->CtrMostrarfechas();
    }
    // listar cursos 
    if (isset($_POST['cursos'])) {
        $Lcursos = new SelectControlador();
        echo $Lcursos->CtrMostrarCursos();
    }
    //listar Roles
    if (isset($_POST['Rol'])) {
        $Lrol = new SelectControlador();
        echo $Lrol->CtrMostrarRol();
    }

    // listar tipo de cursos
    if (isset($_POST['tipo'])) {
        $Ltipo = new SelectControlador();
        echo $Ltipo->CtrMostrarTipos();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}