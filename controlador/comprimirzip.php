<?php
date_default_timezone_set("America/Guayaquil");
$zip = new ZipArchive();
$path = "D:\\Server\\root\\Entregable\\certificados\\MoocMasivo\\";
$rar = preg_grep('~\.(pdf|pdf)$~', scandir($path));
$num = 0;
$hora = strftime('%H-%m-%s');
$time = time();
$nombre = date("d-m-Y-H-i-s", $time);
$archivo = "../certificados/Archivosrar/" . $nombre . ".rar";
$opcion = (isset($_POST['crear'])) ? $_POST['crear'] : '';
switch ($opcion) {
    case 1:
        
            if ($zip->open($archivo, ZipArchive::CREATE) == true) {
                for ($i = 2; $i < count($rar) + 2; $i++) {
                    $num++;
                    $zip->addFile('../certificados/MoocMasivo/' . $rar[$i], './Certificados/' . $rar[$i]);
                    if (file_exists('../certificados/MoocMasivo/' .$rar[$i])) {
                        echo 'Creado';
                    }
                }
                $zip->close();
                for ($i = 2; $i < count($rar) + 2; $i++) {
                    $num++;
                unlink('../certificados/MoocMasivo/' .$rar[$i]);
                }
            } else {
                echo 'No Creado';
            }
        
        break;
}
