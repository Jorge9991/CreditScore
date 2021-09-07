<?php
require '../../static/lib/vendor/autoload.php';
require_once '../dao/daoProduccionReporte.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$impr = new daoProduccionReporte();
$datos = $impr->listarTodo();
$fila = 5; //Establecemos en que fila inciara a imprimir los datos

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getProperties()->setCreator("Krigare")->setDescription("Reportes de producciones");

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->setTitle("producciones");

$spreadsheet->getActiveSheet()->setCellValue('B2', 'REPORTE DE PRODUCCIONES EN EXCEL');
$spreadsheet->getActiveSheet()->mergeCells('B2:D2');

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->setCellValue('A4', 'CODIGO');
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$spreadsheet->getActiveSheet()->setCellValue('B4', 'TITULO');
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
$spreadsheet->getActiveSheet()->setCellValue('C4', 'AUTOR 1');
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$spreadsheet->getActiveSheet()->setCellValue('D4', 'AUTOR 2');
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$spreadsheet->getActiveSheet()->setCellValue('E4', 'AUTOR 3');
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
$spreadsheet->getActiveSheet()->setCellValue('F4', 'AUTOR 4');
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(40);
$spreadsheet->getActiveSheet()->setCellValue('G4', 'AUTOR 5');
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$spreadsheet->getActiveSheet()->setCellValue('H4', 'ISSN');
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$spreadsheet->getActiveSheet()->setCellValue('I4', 'FECHA PUBLICACION');
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('J4', 'REVISTA');
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('K4', 'TIPO PRODUCCION');
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('L4', 'AREA');
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('M4', 'OBSERVACION');


for ($x = 0; $x < count($datos); $x++) {
    $x;
    $l = $x + 1;

    $spreadsheet->getActiveSheet()->setCellValue('A' . $fila, $datos[$x]['codigo']);
    $spreadsheet->getActiveSheet()->setCellValue('B' . $fila, $datos[$x]['titulo']);
    $spreadsheet->getActiveSheet()->setCellValue('C' . $fila, $datos[$x]['id_autor1']);
    $spreadsheet->getActiveSheet()->setCellValue('D' . $fila, $datos[$x]['id_autor2']);
    $spreadsheet->getActiveSheet()->setCellValue('E' . $fila, $datos[$x]['id_autor3']);
    $spreadsheet->getActiveSheet()->setCellValue('F' . $fila, $datos[$x]['id_autor4']);
    $spreadsheet->getActiveSheet()->setCellValue('G' . $fila, $datos[$x]['id_autor5']);
    $spreadsheet->getActiveSheet()->setCellValue('H' . $fila, $datos[$x]['issn']);
    $spreadsheet->getActiveSheet()->setCellValue('I' . $fila, $datos[$x]['fecha_publicacion']);
    $spreadsheet->getActiveSheet()->setCellValue('J' . $fila, $datos[$x]['id_revista']);
    $spreadsheet->getActiveSheet()->setCellValue('K' . $fila, $datos[$x]['id_tipo_produccion']);
    $spreadsheet->getActiveSheet()->setCellValue('L' . $fila, $datos[$x]['id_area']);
    $spreadsheet->getActiveSheet()->setCellValue('M' . $fila, $datos[$x]['observacion']);
    $fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;


$filename = 'Producciones' . '.xlsx';
// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

