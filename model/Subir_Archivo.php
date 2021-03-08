<?php
require '../Classes/PHPExcel/IOFactory.php';
require '../model/ConexionBD.php';


if (isset($_POST['Mostrar'])) {
	$Archivo = "";
	$Archivo = $_FILES["archivo1"]["tmp_name"];
	$objPHPExcel = PHPExcel_IOFactory::load($Archivo); 

	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

	for ($i = 12; $i <= $numRows; $i++) {
		$fecha_in = 7;
		$fecha_f = 8;
		$curso_celda=5;
		$nombres = utf8_decode($objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());
		$apellidos = utf8_decode($objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue());
		$correo = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
		$situacion = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
		$certificado = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
		$curso= utf8_decode($objPHPExcel->getActiveSheet()->getCell('D' . $curso_celda)->getFormattedValue());
		$cedula = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
		$fecha_inicio = $objPHPExcel->getActiveSheet()->getCell('D' . $fecha_in)->getFormattedValue();
		$fecha_fin = $objPHPExcel->getActiveSheet()->getCell('D' . $fecha_f)->getFormattedValue();
		$inicio = strtotime($fecha_inicio); //Convierte el string a formato de fecha en php
		$fin = strtotime($fecha_fin);
		$inicio = date('Y-m-d', $inicio); //Lo comvierte a formato de fecha en MySQL
		$fin = date('Y-m-d', $fin);
		$varcurso='%'.$curso.'%';
		$cursocon= "SELECT id_curso FROM tbl_curso WHERE cur_nombre = '$curso' ";
		$cursores=mysqli_query($conect, $cursocon);
		while($rescr=mysqli_fetch_row($cursores)){
			$cr=$rescr[0];
		 }
		$inserta = "INSERT INTO tbl_estudiante (est_nombre,est_apellido,est_correo,est_DNI,est_fecha_inicio,est_fecha_fin,id_curso)
		VALUES ('$nombres','$apellidos','$correo','$cedula','$inicio','$fin','$cr')";
		$resultadosubida = mysqli_query($conect, $inserta); 
	}
}
$Archivo = "";
?>