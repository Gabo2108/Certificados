<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$configpag = [
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'L', 
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5
];
$mpdf = new \Mpdf\Mpdf($configpag);
setlocale(LC_TIME, 'es_VE.UTF-8','esp');
$fechactual = strtoupper(strftime(" %d de %B del %Y"));
$NOMBRE=strtoupper('Azpilikuetagaraykosaroya renberekolarrea PEREZ');
$leyenda=str_replace('%fecha1%','2021-01-12','Por aprobar el curso MOOC SOLIDWORKS realizado desde %fecha1% hasta %fecha2%.');
$leyenda=str_replace('%fecha2%','2021-03-12',$leyenda);
$style='<style>
.wrapper {
    width:100%;
    height:100%;
    text-align: center;
  }
  .nombre
  {
    font-family: "Webdings";
    color:gray;
    font-size:44px;
    padding-top:28%;
    text-align:center;
  }
  .leyenda
  {
    font-size:24px;
    padding-top:1%;
    text-align:center;
  }
  .fecha
  {
    font-size:14px;
    padding-top:1%;
    padding-right:-50%;
  }
  .codigo
  {
    font-size:14px;
    padding-top:-2%;
    padding-right:60%;
  }
</style>';
$html = '<html>
'.$style.'
<body>
 <div class="wrapper">
   <div class="nombre"> '.$NOMBRE.'</div>
   <div class="leyenda" >'.$leyenda.'</div>
   <div class="fecha">QUITO, '.$fechactual.'</div>
   <div class="codigo">ISTS-CFISE-SW-1121-2021II</div>
 </div>
</body>
</html>';
$mpdf->SetDefaultBodyCSS('background', "url('./cert.png')");
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
