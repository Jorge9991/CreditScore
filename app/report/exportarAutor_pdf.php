<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoProduccionReporte.php';
require_once('../../static/lib/tcpdf/tcpdf.php');

$impr = new daoProduccionReporte();
$x = 0;
if (strlen($_POST['autor']) > 0) {
    $autor = $_POST['autor'];
} else {
    
}

$user = $_POST['usuario'];
$date = new DateTime();
$ecua = new DateTimeZone("America/Guayaquil");
$date = new DateTime();
$date->setTimezone($ecua);
$hora = $date->format("H:i:s");
$fecha = $date->format("d/m/Y");



$datos = $impr->buscarAllAutor($autor);
$dato = $impr->nameAutor($autor);

for ($x = 0; $x < count(1); $x++) {
    $l = $x + 1;
    $apellido = $dato[$x]['nombreautor'];
}


$content = '';
$content .= '
    

        <div class="row">	
        <div class="col-md-12">
        <h5 align="right">' . $fecha . ' ' . $hora . '</h5>
        <h5 align="right">' . $user . '</h5>
        <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="200" height="60"><img src="../../static/img/dep-invest.jpeg" width="150" height="60"> 
	<h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1>  
        <h4 style="text-align:center;"> Reporte Producción de  </h4> 
        <h3 style="text-align:center;">  ' . $apellido . '  </h3> 

                   <div>Departamento de investigación, Desarrollo tecnológico e innovación (DIDTI).</div>
                   <div>Teléfono: (04) 390-1270</div>
                   <div>investigación@itsjba.edu.ec</div>
	<br>
            	

      <table>
        <thead>
          <tr bgcolor="#c9dff0">
                                 <th  align="center"><h4>Código</h4></th>           
                                 <th  align="center"><h4>Titulo</h4></th>     
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
   
    $issn = $datos[$x]['issn'];
    $fecha = $datos[$x]['fecha_publicacion'];
    $revis = $datos[$x]['id_revista'];
    $tprod = $datos[$x]['id_tipo_produccion'];
    $area = $datos[$x]['id_area'];
    $obs = $datos[$x]['observacion'];

    $content .= '
		<tr nobr="true" bgcolor="#f5f5f5">
               
                <td align="center">' . $cod . '</td>
                <td align="center">' . $tit . '</td>
               
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
        $autor = $_POST['autor'];
        // llamo al dao donde tengo las consulta
        $impr = new daoProduccionReporte();
        $x = 0;
        // consulta de total
        $totales = $impr->total($autor);
        $total = $totales[$x]['total'];
        // consulta de ponencia
        $ponencias = $impr->ponencia($autor);
        $ponen = $ponencias[$x]['ponencia'];
        // consulta de libro
        $libros = $impr->libro($autor);
        $lib = $libros[$x]['libro'];
        // consulta de capitulo
        $capitulos = $impr->capitulo($autor);
        $cap = $capitulos[$x]['capitulo'];
        // consulta de articulo
        $articulos = $impr->articulo($autor);
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
$pdf->setPrintFooter(true);
$pdf->SetMargins(15, 10, 15, 15);
$pdf->SetAutoPageBreak(true, 30);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('../temp/reporteAutor.pdf', 'F');
?>
