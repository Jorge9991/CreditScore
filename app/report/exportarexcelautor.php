<?php
require '../../static/lib/vendor/autoload.php';
require_once '../dao/daoProduccionReporte.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

//$autor = $_POST['autor'];

$autor = 66;

$impr = new daoProduccionReporte();
$datos = $impr->buscarAllAutor($autor);
$dato = $impr->nameAutor($autor);

for ($x = 0; $x < count(1); $x++) {
    $l = $x + 1;
    $apellido = $dato[$x]['nombreautor'];
}
$fila = 6; //Establecemos en que fila inciara a imprimir los datos

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getProperties()->setCreator("Krigare")->setDescription("Reportes de producciones");

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->setTitle("producciones");

header('Content-Disposition: attachment;filename="' . $filename . '"');

$spreadsheet->getActiveSheet()->setCellValue('B2', 'PRODUCCIONES DE '.$apellido );
$spreadsheet->getActiveSheet()->mergeCells('B2:D2');

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->setCellValue('A4', 'CODIGO');
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$spreadsheet->getActiveSheet()->setCellValue('B4', 'TITULO');
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$spreadsheet->getActiveSheet()->setCellValue('C4', 'ISSN');
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$spreadsheet->getActiveSheet()->setCellValue('D4', 'FECHA PUBLICACION');
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('E4', 'REVISTA');
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('F4', 'TIPO PRODUCCION');
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('G4', 'AREA');
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$spreadsheet->getActiveSheet()->setCellValue('H4', 'OBSERVACION');


for ($x = 0; $x < count($datos); $x++) {
    $x;
    $l = $x + 1;
    

    $spreadsheet->getActiveSheet()->setCellValue('A' . $fila, $datos[$x]['codigo']);
    $spreadsheet->getActiveSheet()->setCellValue('B' . $fila, $datos[$x]['titulo']);
    $spreadsheet->getActiveSheet()->setCellValue('C' . $fila, $datos[$x]['issn']);
    $spreadsheet->getActiveSheet()->setCellValue('D' . $fila, $datos[$x]['fecha_publicacion']);
    $spreadsheet->getActiveSheet()->setCellValue('E' . $fila, $datos[$x]['id_revista']);
    $spreadsheet->getActiveSheet()->setCellValue('F' . $fila, $datos[$x]['id_tipo_produccion']);
    $spreadsheet->getActiveSheet()->setCellValue('G' . $fila, $datos[$x]['id_area']);
    $spreadsheet->getActiveSheet()->setCellValue('H' . $fila, $datos[$x]['observacion']);
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

