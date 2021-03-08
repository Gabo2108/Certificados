<?php
include('../Classes/TCPDF-main/tcpdf.php');


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
        $img_file = K_PATH_IMAGES . '../img/PonenciaA4.jpg';
        $this->Image('../img/PonenciaA4.jpg', 0, 0, 300, 0, '', '', '', false, 300, '', false, false, 0);
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
// obetnemos los datos
$fecha= $_POST['fecha'];
$nombre=  $_POST['nombre'];
$apellido=$_POST['apellido'];
$Cadena= strtoupper($nombre.' '.$apellido);
$curso=$_POST['curso'];

$anio = substr($fecha,0,4); //se extrae el anio de la fecha


$fechas='En el evento SUCRE Webinars '.$anio;
setlocale(LC_TIME,"es_ES");
$fechaActual=strftime("QUITO, %d DE %B DE %Y ");
$fechaMay=strtoupper($fechaActual);
$descarga= str_replace('','',$Cadena);
$longitud = strlen($Cadena);
// anadir pagina 

$pdf->AddPage();
if ($longitud <= 30) {
    $pdf->writeHTMLCell(170, 0, 67, 100, $Cadena, 0, 1, 0, true, 'C', false);
} else{
    $pdf->writeHTMLCell(0, 0, 20, 100, $Cadena, 0, 1, 0, true, 'C', false);
}
$pdf->SetFont('GothamMediumR', '', 16);
$pdf->SetTextColor(62,62,65);
$pdf->SetFillColor(255, 255, 0);
$pdf->writeHTMLCell(0, 0, 20, 125, htmlspecialchars($curso) , "", 1, 0, true, 'C', true);
$pdf->writeHTMLCell(0, 0, 20, "", $fechas, "", 1, 0, true, 'C', true);

$pdf->writeHTMLCell(0, 0, 0, "", "", "", 1, 0, true, 'R', true);
$pdf->SetFont('GothamMediumR','',12);
$pdf->SetTextColor(0,0,0);
$pdf->writeHTMLCell(0, 0, 0, "", $fechaMay, "", 1, 0, true, 'R', true);

$ruta = 'D:\\Server\\root\\Entregable\\certificados\\dponencia\\'.$descarga.'_'.$curso.'.pdf';

// ---------------------------------------------------------
ob_end_clean();
//Cerrar y generar el documento PDF
$pdf->Output( $ruta, 'F'); 
echo 'ok';