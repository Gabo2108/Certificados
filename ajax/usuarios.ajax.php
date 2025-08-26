<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if ( isset($_POST['nuevo']) || isset($_POST['DNI']) || isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['pasw']) && isset($_POST['curso']) && isset($_POST['user_id']) && isset($_POST['rol']) || isset($_POST['del_id'])) {
    require_once "../controller/usuario.controlador.php";
    // Insertar 
    if (isset($_POST['nuevo']) && isset($_POST['apellido']) && isset($_POST['DNI']) && isset($_POST['curso']) && isset($_POST['pasw']) && isset($_POST['rol']) ) {
        $InUsuario = new UsuarioControlador();
        echo $InUsuario->CtrInsertarUsuario();
    }
    //Actualizar
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['pasw']) && isset($_POST['curso']) && isset($_POST['user_id'])&& isset($_POST['rol'])) {
        $UpUsuario = new UsuarioControlador();
        echo $UpUsuario->CtrActualizarUsuario();
    }

    // Eliminar
    if (isset($_POST['del_id'])) {
        $DelUsuario = new UsuarioControlador();
        echo $DelUsuario->CtrEliminarUsuario();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}