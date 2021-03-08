<?php
require_once './filtro_certificados.php';
$fecha = $_POST['fecha'];

$resultado = filtro::eliminarregistros($fecha);
if ($resultado) {
    echo 'ok';
}else{
    echo 'error';
}