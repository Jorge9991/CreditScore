<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoProduccionReporte.php';
require_once('../../static/lib/tcpdf/tcpdf.php');
$impr = new daoProduccionReporte();

if (strlen($_POST['desde']) > 0 and strlen($_POST['hasta']) > 0) {
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
} else {
    $desde = '2000-01-01';
    $hasta = '2050-01-01';

    $verDesde = '__/__/____';
    $verHasta = '__/__/____';
}

$date = new DateTime();
$ecua = new DateTimeZone("America/Guayaquil");
$date = new DateTime();
$date->setTimezone($ecua);
$hora = $date->format("H:i:s");
$fecha = $date->format("d/m/Y");
$datos = $impr->buscarAllFecha($desde, $hasta);

$content = '';

$content .= '
		<div class="row">
		
        	<div class="col-md-12">
	        <h5 align="right">' . $fecha . ' ' . $hora . '</h5>
                <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="200" height="60"><img src="../../static/img/dep-invest.jpeg" width="150" height="60"> 
                <h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1>  
		<h1 style="text-align:center;"> Reporte de Producción</h1>
                
                   <div>Departamento de investigación, Desarrollo tecnológico e innovación (DIDTI).</div>
                   <div>Teléfono: (04) 390-1270</div>
                   <div>investigación@itsjba.edu.ec</div>
            	<h3 style="text-align:center;">Desde ' . $verDesde . ' hasta: ' . $verHasta . '</h3>

      <table>
        <thead>
          <tr bgcolor="#E5E5E5">
                                 <th  align="center"><h4>Código</h4></th>           
                                 <th  align="center"><h4>Titulo</h4></th>     
                                 <th align="center"><h4>Autores</h4></th>
                                 <th align="center"><h4>ISSN/ISBN</h4></th>
                                 <th align="center"><h4>fecha publicacion</h4></th> 
                                 <th align="center"><h4>Revista</h4></th>
                                 <th align="center"><h4>Tipo producción</h4></th> 
                                 <th align="center"><h4>Area</h4></th> 
           
          </tr>
        </thead>
	';

for ($x = 0; $x < count($datos); $x++) {
    $x;
    $l = $x + 1;

    $cod = $datos[$x]['codigo'];
    $tit = $datos[$x]['titulo'];
    $aut = $datos[$x]['id_autor1'] . $datos[$x]['id_autor2'] . $datos[$x]['id_autor3'] . $datos[$x]['id_autor4'] . $datos[$x]['id_autor5'];
    $issn = $datos[$x]['issn'];
    $fecha = fechaNormal($datos[$x]['fecha_publicacion']);
    $revis = $datos[$x]['id_revista'];
    $tprod = $datos[$x]['id_tipo_produccion'];
    $area = $datos[$x]['id_area'];
    $obs = $datos[$x]['observacion'];

    $content .= '
		<tr nobr="true" bgcolor="#f5f5f5">
               
                <td align="center">' . $cod . '</td>
                <td align="center">' . $tit . '</td>
                <td align="center">' . $aut . '</td>
                <td align="center">' . $issn . '</td>
                <td align="center">' . $fecha . '</td>
                <td align="center">' . $revis . '</td>
                <td align="center">' . $tprod . '</td>
                <td align="center">' . $area . '</td>
                <td align="center">' . $obs . '</td>
        </tr>
	';
}


$content .= '</table>';

class MYPDF extends TCPDF {

    public function Footer() {
        // llamo el valor de la view
        if (strlen($_POST['desde']) > 0 and strlen($_POST['hasta']) > 0) {
            $desde = $_POST['desde'];
            $hasta = $_POST['hasta'];

           
        } else {
            $desde = '1000-01-01';
            $hasta = '3000-01-01';

        }
        // llamo al dao donde tengo las consulta
        $impr = new daoProduccionReporte();
        $x = 0;
        // consulta de total
        $totales = $impr->totalfecha($desde, $hasta);
        $total = $totales[$x]['total'];
        // consulta de ponencia
        $ponencias = $impr->ponenciafecha($desde, $hasta);
        $ponen = $ponencias[$x]['ponencia'];
        // consulta de libro
        $libros = $impr->librofecha($desde, $hasta);
        $lib = $libros[$x]['libro'];
        // consulta de capitulo
        $capitulos = $impr->capitulofecha($desde, $hasta);
        $cap = $capitulos[$x]['capitulo'];
        // consulta de articulo
        $articulos = $impr->articulofecha($desde, $hasta);
        $art = $articulos[$x]['articulo'];

        $footer = '<h3 align="left"> Total de producciones ' . $total . ' <br> '
                . 'Ponencia = ' . $ponen . ', '
                . '<br> Libro = ' . $lib . ', '
                . '<br> Capitulo de libro = ' . $cap . ','
                . '<br> Articulo indexado = ' . $art . ' </h3>';

        $html = $footer;
        // obtener el margen de salto de página actual
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // obtener el modo de salto automático actual
        // escribir imagen html
        $this->writeHTMLCell($w = 0, $h = 50, $x = 20, $y = 270, $html, $border = 0, $ln = 0, $fill = 0, $reseth = false, $align = 'C', $autopadding = false);
        // restaurar el estado de salto automático de página
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // establecer el punto de partida para el contenido de la página
    }

}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Krigare');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(TRUE);
$pdf->SetMargins(15, 10, 15, 15);
$pdf->SetAutoPageBreak(true, 30);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('../temp/reporte.pdf', 'F');
?>