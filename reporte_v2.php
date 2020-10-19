<?php
require 'assets/Classes/PHPExcel.php';
require 'conexion_pg.php';

//Consulta
$sql = "SELECT * FROM contratos_sin_adenda LEFT JOIN cas_adenda ON contratos_sin_adenda.id_contrato = cas_adenda.id_contrato ORDER BY dni, contratos_sin_adenda.f_inicio ASC";
$resultado = pg_query($con, $sql);
$fila = 7; //Establecemos en que fila inciara a imprimir los datos

$result = pg_query($con, $query);



//Objeto de PHPExcel
$objPHPExcel = new PHPExcel();

//Propiedades de Documento
$objPHPExcel->getProperties()->setCreator("Yudith Jimenez")->setDescription("Reporte de CAS");

//Establecemos la pestaña activa y nombre a la pestaña
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte CAS");



$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE C.A.S.');
$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('A6', 'NOMBRES');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('B6', 'APELLIDO PATERNO');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'APELLIDO MATERNO');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'DNI');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'CONDICIÓN');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'DOMICILIO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CELULAR');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('H6', 'CORREO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'NRO. CONTRATO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('J6', 'FECHA INICIO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('K6', 'FECHA TERMINO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('L6', 'REMUNERACIÓN');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('M6', 'FUENTE');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('N6', 'N° CONVOCATORIA');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'META');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('P6', 'TIPO CONTRATO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'OFICINA');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('R6', 'OFICINA 2');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('S6', 'UBICACION');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('T6', 'UBICACION 2');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('U6', 'PROFESIÓN');


//Recorremos los resultados de la consulta y los imprimimos
while ($rows = pg_fetch_array($result)) {

  $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $rows['nombres']);
  $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $rows['ape_pat']);
  $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $rows['ape_mat']);
  $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, $rows['dni']);


  $fila++; //Sumamos 1 para pasar a la siguiente fila
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="reporte.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('php://output');
