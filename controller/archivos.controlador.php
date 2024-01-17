<?php
class ArchivosControlador
{
    public static function Ctr_Explorar_carpetas()
    {

        $ra = scandir(archivos, 2);
        return $ra;
    }
    public function Ctr_formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    public function Ctr_Explorar_Archivos($folder)
    {
        $directorPath = archivos . "\\" . $folder;
        $files = scandir($directorPath);

        foreach ($files as $file) {
            $filePath = $directorPath . '/' . $file;

            if (is_file($filePath) && (pathinfo($filePath, PATHINFO_EXTENSION) === 'pdf' || pathinfo($filePath, PATHINFO_EXTENSION) === 'rar')) {
                $detalles = stat($filePath);

                $resultado[] = array(
                    'nombre' => $file,
                    'fecha' => date('Y-m-d', $detalles['mtime']),
                    'tamaño' => $size = ArchivosControlador::Ctr_formatSizeUnits(filesize($filePath)),
                    'tipo' => pathinfo($filePath, PATHINFO_EXTENSION),
                );
            }
        }
        if (empty($resultado)) {
            return false;
        } else {
            header('Content-Type: application/json');
            return json_encode($resultado);
        }
    }
    public function Ctr_Zip($folder)
    {

        date_default_timezone_set("America/Guayaquil");

        $zip = new ZipArchive();
        $carpeta = archivos . "/" . $folder . "/temp";

        $nombre = date("d-m-Y-H-i-s", time());
        // Define la carpeta donde se creará el ZIP
        $directorio = archivos . "/" . $folder;

        // Crea un nuevo objeto ZipArchive
        $zip = new ZipArchive();

        // Abre el archivo ZIP
        if ($zip->open("{$directorio}/" . $nombre . ".rar", ZipArchive::CREATE) == TRUE) {

            // Recorre la carpeta y agrega los archivos PDF al archivo ZIP
            foreach (new DirectoryIterator($carpeta) as $archivo) {
                if ($archivo->isFile() && $archivo->getExtension() == "pdf") {
                    $zip->addFile($archivo->getPathname(), basename($archivo->getPathname()));
                }
            }
            
            // Cierra el archivo ZIP
            $zip->close();
            foreach (new DirectoryIterator($carpeta) as $archivo) {
                if ($archivo->isFile() && $archivo->getExtension() == "pdf") {
                    unlink($archivo->getPathname());
                }
            }
            $respuesta = Self::Ctr_Explorar_Archivos($folder);
            return $respuesta;
        } else {
            echo 'No Creado';
        }
    }
}
