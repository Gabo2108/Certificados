<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if (isset($_POST['tbestudiante']) || isset($_POST['tbusuarios']) || isset($_POST['tbcursos'])) {
    require_once "../controller/tablas.controlador.php";

    // Mostrar tabla nomina estudiante
    if (isset($_POST['tbestudiante'])) {

        $Tnestudiante = new TablasControlador();
        echo $Tnestudiante->CtrTablaNominaestudiante();
    }
    //mostrar tabla nomina usuarios
    if (isset($_POST['tbusuarios'])) {
        $Tnusuarios = new TablasControlador();
        echo $Tnusuarios ->CtrTablaNominausuario();
    }

    // mostrar tabla cursos
    if (isset($_POST['tbcursos'])) {
        $Tcursos = new TablasControlador();
        echo $Tcursos ->CtrTablaCursos();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}