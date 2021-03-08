<?php
$archivo = $_POST['eliminar']; 
$filename = 'D:\\Server\\root\\Entregable\\certificados\\Archivosrar\\'. $archivo;

if (file_exists($filename)) {
    $success = unlink($filename);
    
    if (!$success) {
        echo "error";
         throw new Exception("Cannot delete $filename");
         
    } else{
        echo "ok";
    }
}
