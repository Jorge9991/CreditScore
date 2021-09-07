<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoTipoUsuarioReporte.php';
require_once('../../static/lib/tcpdf/tcpdf.php');
$impr = new daoTipoUsuarioReporte();



$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('The Team');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(TRUE);
$pdf->SetMargins(15, 10, 15, 15);
$pdf->SetAutoPageBreak(true, 30);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();


$datos = $impr->listarTodo();

$content = '';


$date = new DateTime();
$ecua = new DateTimeZone("America/Guayaquil");
$date->setTimezone($ecua);
$hora = $date->format("H:i:s");
$fecha = $date->format("d/m/Y");
 

$content .= '
  
		<div class="row">
        	<div class="col-md-12">				            
                <h5 align="right">' . $fecha . ' ' . $hora . '</h5>
                <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="200" height="60"><img src="../../static/img/dep-invest.jpeg" width="150" height="60"> 
	        <h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1> 
	        <h2 style="text-align:center;"> Reporte de Usuarios</h3>               
              
            	<div>Departamento de investigación, Desarrollo tecnológico e innovación (DIDTI).</div>
                <div>Teléfono: (04) 390-1270</div>
                <div>investigación@itsjba.edu.ec</div>
	        <br>
                  <table>
                     <thead>
                        <tr bgcolor="#E5E5E5">
                                <th  align="center"><h4>Código</h4></th>                                          
                                    <th align="center"><h4>Cédula</h4></th>
                                    <th align="center"><h4>Nombre</h4></th> 
                                    <th align="center"><h4>Apellido</h4></th>
                                    <th align="center"><h4>Dirección</h4></th> 
                                    <th align="center"><h4>Teléfono</h4></th>
                                    <th align="center"><h4>Correo</h4></th>
                                    <th align="center"><h4>Usuario</h4></th> 
                                    <th align="center"><h4>TipoUsuario</h4></th>
           
          </tr>
        </thead>
	';

for ($x = 0; $x < count($datos); $x++) {
    $x;
    $l = $x + 1;

    $cod = $datos[$x]['idUsuario'];
    $ced = $datos[$x]['cedula'];
    $nom = $datos[$x]['nombre'];
    $apel = $datos[$x]['apellido'];
    $dir = $datos[$x]['direccion'];
    $tele = $datos[$x]['telefono'];
    $cor = $datos[$x]['correo'];
    $usu = $datos[$x]['usuario'];
    $tipo = $datos[$x]['idTipoUsuario'];

    $content .= '
		<tr nobr="true" bgcolor="#f5f5f5">
               
                <td align="center">' . $cod . '</td>
                <td align="center">' . $ced . '</td>
                <td align="center">' . $nom . '</td>
                <td align="center">' . $apel . '</td>
                <td align="center">' . $dir . '</td>
                <td align="center">' . $tele . '</td>
                <td align="center">' . $cor . '</td>
                <td align="center">' . $usu . '</td>
                <td align="center">' . $tipo . '</td>    
        </tr>
	';
}


$content .= '</table>';


//CONSULTA

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();

$pdf->output('../temp/reporteTipoUsuarioTotal.pdf', 'F');
?>