<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
    require_once "../libs/mpdf/vendor/autoload.php";
} else {
    require_once "./core/mainModel.php";
    require_once "./libs/mpdf/vendor/autoload.php";
}
class CertificadoControlador extends mainModel
{
    public function CtrUnCertificado(){
        
        $id = mainModel::limpiar_cadena($_POST['user_id']);
        $consultarinfo= mainModel::ejecutar_consulta_simple('SELECT * FROM tbl_estudiante as e, tbl_curso as c,tbl_tipo as t where e.id_curso=c.id_curso and c.id_tipo=t.id_tipo and e.id_estudiante= '.$id);
        $info= $consultarinfo->fetch(PDO::FETCH_ASSOC);
        // Create an instance of the class:
        $configpag = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L', 
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5];
        $mpdf = new \Mpdf\Mpdf($configpag);
        setlocale(LC_TIME, 'es_EC.UTF-8','esp');
        $fechactual = date(' d.m.Y');
        $NOMBRE=strtoupper($info['est_nombre'].' '.$info['est_apellido']);
        $leyenda=str_replace('%fecha1%',$info['est_fecha_inicio'],'Por aprobar el curso MOOC SOLIDWORKS realizado desde %fecha1% hasta %fecha2% muchas gracias a todos.');
        $leyenda=str_replace('%fecha2%',$info['est_fecha_fin'],$leyenda);
        $style='<style>
            .wrapper {    
                padding-left:5%;       
                width:90%;
                height:100%;
                text-align: center;}
            .nombre {
                font-family: "Webdings";
                color:gray;
                font-size:44px;
                padding-top:30%; }
            .leyenda {
                font-size:24px;
                padding-top:1%; }
            .fecha {
                font-size:14px;
                padding-top:1%;
                padding-right:-75%; }
            .codigo {
                font-size:14px;
                padding-top:-2%;
                padding-right:80%; } </style>';
        $html = '<!DOCTYPE html>
            <html>
            <head>
            '.$style.'
            </head>
            <body>
            <div class="wrapper">
            <div class="contenedores"> <div class="nombre"> '.$NOMBRE.'</div>
            <div class="leyenda" >'.$leyenda.'</div>
            <div class="fecha">QUITO, '.$fechactual.'</div>
            <div class="codigo">'.$info['cur_codigo'].'</div>
            </div>
            </body>
            </html>';
        $mpdf->SetDefaultBodyCSS('background', "url('../view/assets/images/cert.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $savedir=archivos.'\Certificado\\'.$NOMBRE.'_'.$info['cur_nombre'].'.pdf';
        $mpdf->Output($savedir,'F');
        return (file_exists($savedir)) ? true : 'error';

    }
    public function CtrVariosCertificados(){ 
        
        $id = mainModel::limpiar_cadena($_POST['fecha']);
        $consultarinfo= mainModel::ejecutar_consulta_simple('SELECT * FROM tbl_estudiante as e , tbl_curso as c where e.id_curso=c.id_curso and est_fecha_inicio= "'.$id.'"');
        $info= $consultarinfo->fetchAll(PDO::FETCH_ASSOC);
        // Create an instance of the class:
        $configpag = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L', 
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5];
        setlocale(LC_ALL, 'es_EC.UTF-8','esp');
        $fechactual = date(' d.m.Y');
        $style='<style>
                .wrapper {    
                    padding-left:5%;       
                    width:90%;
                    height:100%;
                    text-align: center;}
                .nombre {
                    font-family: "Webdings";
                    color:gray;
                    font-size:44px;
                    padding-top:30%; }
                .leyenda {
                    font-size:24px;
                    padding-top:1%; }
                .fecha {
                    font-size:14px;
                    padding-top:1%;
                    padding-right:-75%; }
                .codigo {
                    font-size:14px;
                    padding-top:-2%;
                    padding-right:80%; } </style>';
        
        foreach ($info as $key => $row) {
        $mpdf = new \Mpdf\Mpdf($configpag);
        $NOMBRE=mb_strtoupper($row['est_nombre'].' '.$row['est_apellido'],'UTF-8');
        $leyenda=str_replace('%curso%',$row['cur_nombre'],'Por aprobar el curso MOOC %curso% realizado desde %fecha1% hasta %fecha2% muchas gracias a todos.');
        $leyenda=str_replace('%fecha1%',$row['est_fecha_inicio'],$leyenda);
        $leyenda=str_replace('%fecha2%',$row['est_fecha_fin'],$leyenda);
        $html = '<!DOCTYPE html>
            <html>
            <head>
            '.$style.'
            </head>
            <body>
            <div class="wrapper">
            <div class="contenedores"> <div class="nombre"> '.$NOMBRE.'</div>
            <div class="leyenda" >'.$leyenda.'</div>
            <div class="fecha">QUITO, '.$fechactual.'</div>
            <div class="codigo">'.$row['cur_codigo'].'</div>
            </div>
            </body>
            </html>';
        // Write some HTML code:
        $mpdf->SetDefaultBodyCSS('background', "url('../view/assets/images/cert.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $savedir=archivos.'\Rar\temp\\'.$NOMBRE.'_'.$row['cur_nombre'].'.pdf';
        $mpdf->Output($savedir,'F');
        }
        return (file_exists($savedir)) ? true : 'error';
    }
      public function CtrPonencia()
     {
        $curso_id = $_POST['del_id'] ;
        $respuesta= mainModel::ejecutar_consulta_simple("DELETE FROM tbl_curso WHERE id_curso='$curso_id'");
        return ($respuesta->rowCount() >= 1) ? true : false;
     }
   
}