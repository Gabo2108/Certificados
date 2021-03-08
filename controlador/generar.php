<?php
include('../Classes/TCPDF-main/tcpdf.php');
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : '';
$fecha_fi = (isset($_POST['fecha_fin'])) ? $_POST['fecha_fin'] : '';
$inicio = strtotime($fecha_inicio); //Convierte el string a formato de fecha en php
$fin = strtotime($fecha_fi); //Convierte el string a formato de fecha en php
$inicio = date('Y-m-d', $inicio); //Lo comvierte a formato de fecha en MySQL
$fin = date('Y-m-d', $fin); //Lo comvierte a formato de fecha en MySQL
$curso = (isset($_POST['curso'])) ? $_POST['curso'] : '';
$tipo = (isset($_POST['curso'])) ? $_POST['curso'] : '';
$datos = array('nom' => $nombre, 'ape' => $apellido, 'ini' => $inicio, 'fin' => $fin, 'cur' => $curso);

class MYPDF extends TCPDF
{
    //Encabezado de pagina
    public function Header()
    {
        // obtener el margen de salto de página actual
        $bMargin = $this->getBreakMargin();
        // obtener el modo actual de salto de página automático
        $auto_page_break = $this->AutoPageBreak;
        // deshabilitar el salto de página automático
        $this->SetAutoPageBreak(false, 0);
        // establecer la imagen del background
        $img_file = K_PATH_IMAGES . '../img/certificadoA4.jpg';
        $this->Image('../img/certificadoA4.jpg', 0, 0, 300, 0, '', '', '', false, 300, '', false, false, 0);
        // restaurar el estado de salto de página automático
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // establecer el punto de partida para el contenido de la página
        $this->setPageMark();
    }
}

// Crear nuevo documento PDF
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(210, 297), true, 'UTF-8', false);


//establecer fuente monoespaciada predeterminada
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// establecer margenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// eliminar pie de página predeterminado
$pdf->setPrintFooter(false);

// establecer saltos de página automáticos
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// establecer el factor de la escala de la imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//establecer algunas cadenas dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Configurar fuente
$pdf->SetFont('GothamMediumR', '', 24);

$Cadena = strtoupper($nombre . ' ' . $apellido);
$fechas = 'Realizado desde ' . $inicio . ' al ' . $fin . ', con una duración de ' .
    ' horas.';
setlocale(LC_TIME, "es_ES");
$fechaActual = strftime("QUITO, %d DE %B DE %Y ");
$fechaMay = strtoupper($fechaActual);
$descarga = str_replace('', '', $Cadena);
$longitud = strlen($Cadena);
// anadir pagina 
 
$pdf->AddPage();
if ($longitud <= 30) {
    $pdf->writeHTMLCell(170, 0, 67, 100, $Cadena, 0, 1, 0, true, 'C', false);
} else {
    $pdf->writeHTMLCell(0, 0, 20, 100, $Cadena, 0, 1, 0, true, 'C', false);
}
$pdf->SetFont('GothamMediumR', '', 16);
$pdf->SetTextColor(62, 62, 65); 
$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(0, 0, 20, 125, $curso, "", 1, 0, true, 'C', true);
$pdf->writeHTMLCell(0, 0, 20, "", $fechas, "", 1, 0, true, 'C', true);

$pdf->writeHTMLCell(0, 0, 0, "", "", "", 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, 0, "", "", "", 1, 0, true, 'R', true);
$pdf->SetFont('GothamMediumR', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->writeHTMLCell(0, 0, 0, "", $fechaMay, "", 1, 0, true, 'R', true);
$url= certificados;
$ruta =  'D:\\Server\\root\\Entregable\\certificados\\Moocs1\\' . $descarga . '_' . $curso . '.pdf';

// ---------------------------------------------------------
ob_end_clean();
echo "ok";
//Cerrar y generar el documento PDF
$pdf->Output($ruta, 'F');

