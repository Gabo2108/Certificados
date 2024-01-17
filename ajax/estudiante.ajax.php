<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if ((isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['DNI']) && isset($_POST['curso']) && isset($_POST['correo']) && isset($_POST['codigo']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) ) || isset($_POST['user_id']) || isset($_POST['del_id'])) {
    require_once "../controller/estudiante.controlador.php";

    // Insertar 
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['DNI']) && isset($_POST['curso']) && isset($_POST['correo']) && isset($_POST['codigo']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) ) {

        $InEstudiante = new EstudianteControlador();
        echo $InEstudiante->CtrInsertarestudiante();
    }
    //Actualizar
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) && isset($_POST['user_id'])) {
        $UpEstudiante = new EstudianteControlador();
        echo $UpEstudiante->CtrActualizarEstudiante();
    }

    // Eliminar
    if (isset($_POST['del_id'])) {
        $DelEstudiante = new EstudianteControlador();
        echo $DelEstudiante->CtrEliminarEstudiante();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}