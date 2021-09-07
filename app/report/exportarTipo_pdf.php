<link href="../../static/css/footer.css" rel="stylesheet">
<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoProduccionReporte.php';
require_once('../../static/lib/tcpdf/tcpdf.php');
$impr = new daoProduccionReporte();

if (strlen($_POST['tipo']) > 0 ) {
    $tipo = $_POST['tipo'];
   
} else {
    
}
$date=new DateTime();
    $ecua= new DateTimeZone("America/Guayaquil");
    $date=new DateTime();
    $date->setTimezone($ecua);
    $hora=$date->format("H:i:s");
    $fecha=$date->format("d/m/Y");

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('The team');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(TRUE);
$pdf->SetMargins(15, 10, 15, 15);
$pdf->SetAutoPageBreak(true, 30);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();

$datos = $impr->tipoProduccion($tipo);

$content = '';

for ($x = 0; $x < count(1); $x++) {  
 $l = $x + 1;
        $tipo = $datos[$x]['id_tipo_produccion'];       
   
}
$content .= '
    

		 <div class="row">
        	 <div class="col-md-12">
                 <h5 align="right">' . $fecha . ' ' . $hora . '</h5>
                 <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="200" height="60"><img src="../../static/img/dep-invest.jpeg" width="150" height="60"> 
		 <h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1>  
                 <h3 style="text-align:center;"> Reporte de producción científica </h3>
                 <h3 style="text-align:center;">  ' .$tipo . '  </h3> 

                   <div>Departamento de investigación, Desarrollo tecnológico e innovación (DIDTI).</div>
                   <div> Teléfono: (04) 390-1270</div>
                   <div> investigación@itsjba.edu.ec</div>
	<br>
            	

      <table>
        <thead>
          <tr bgcolor="#E5E5E5">
                                    <th  align="center"><h4>Código</h4></th>           
                                    <th align="center"><h4>Titulo</h4></th>
                                    <th align="center"><h4>Autores</h4></th> 
                                    <th align="center"><h4>ISSN/ISBN</h4></th>
                                    <th align="center"><h4>Fecha Publicación</h4></th> 
                                    <th align="center"><h4>Revista</h4></th>
                                    <th align="center"><h4>Tipo Producción</h4></th>
                                    <th align="center"><h4>Aréa</h4></th> 
                                    <th align="center"><h4>Observación</h4></th> 
           
          </tr>
        </thead>
	';



for ($x = 0; $x < count($datos); $x++) {
    $x;
    $l = $x + 1;

    $cod = $datos[$x]['codigo'];
    $tit = $datos[$x]['titulo'];
    $aut = $datos[$x]['id_autor1'].$datos[$x]['id_autor2'].$datos[$x]['id_autor3'].$datos[$x]['id_autor4'].$datos[$x]['id_autor5'];
    $isnn = $datos[$x]['issn'];
    $fecha = $datos[$x]['fecha_publicacion'];
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



//CONSULTA

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();

$pdf->output('../temp/reporteTipo.pdf', 'F');
?>


