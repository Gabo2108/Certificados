<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if ( isset($_POST['folderPath']) || isset($_POST['Rar']) ) {
    require_once "../controller/archivos.controlador.php";
    // trer la lista de archivos
    if (isset($_POST['folderPath'])) {
        
        $Archivos = new ArchivosControlador();
        echo $Archivos->Ctr_Explorar_Archivos($_POST['folderPath']);
    }
    if (isset($_POST['Rar'])) {
        
        $Archivos = new ArchivosControlador();
        echo $Archivos->Ctr_Zip($_POST['Rar']);
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}