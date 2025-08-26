<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";
if ( isset($_POST['user_id']) || isset($_POST['fecha']) ) {
    require_once "../controller/certificados.controlador.php";

    // crear 1 certificado
    if (isset($_POST['user_id'])) {

        $unCertitficado = new CertificadoControlador();
        echo $unCertitficado->CtrUnCertificado();
    }
    //crear certificados por fechas
    if (isset($_POST['fecha'])) {
        $allCertificados = new CertificadoControlador();
        echo $allCertificados->CtrVariosCertificados();
    }

    // crear 1 ponencia
    if (isset($_POST['temDel'])) {
        $deltema = new CertificadoControlador();
        echo $deltema->CtrPonencia();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}