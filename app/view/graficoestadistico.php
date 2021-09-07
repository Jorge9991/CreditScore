<?php
require_once '../conexion/DataBase.php';
require_once '../dao/daoEstadistico.php';
$impr = new daoEstadistico();
$x = 0;
// aqui deberiamos cambiar el 2018 por el numero que ingresemos..
$anio = $_POST['year'];
 // asignamos un titulo
$titulo = "PRODUCCIONES CIENTIFICAS";
$subtitulo = 'En el año : ' . $anio;
// ejecutamos las consultas 
//consulta de los 4 tipos de producciones por el mes de enero
$pm1 = $impr->pM1($anio);
$lm1 = $impr->lM1($anio);
$cm1 = $impr->cM1($anio);
$am1 = $impr->aM1($anio);
//consulta de los 4 tipos de producciones por el mes de febrero
$pm2 = $impr->pM2($anio);
$lm2 = $impr->lM2($anio);
$cm2 = $impr->cM2($anio);
$am2 = $impr->aM2($anio);
//consulta de los 4 tipos de producciones por el mes de marzo
$pm3 = $impr->pM3($anio);
$lm3 = $impr->lM3($anio);
$cm3 = $impr->cM3($anio);
$am3 = $impr->aM3($anio);
//consulta de los 4 tipos de producciones por el mes de abril
$pm4 = $impr->pM4($anio);
$lm4 = $impr->lM4($anio);
$cm4 = $impr->cM4($anio);
$am4 = $impr->aM4($anio);
//consulta de los 4 tipos de producciones por el mes de mayo
$pm5 = $impr->pM5($anio);
$lm5 = $impr->lM5($anio);
$cm5 = $impr->cM5($anio);
$am5 = $impr->aM5($anio);
//consulta de los 4 tipos de producciones por el mes de junio
$pm6 = $impr->pM6($anio);
$lm6 = $impr->lM6($anio);
$cm6 = $impr->cM6($anio);
$am6 = $impr->aM6($anio);
//consulta de los 4 tipos de producciones por el mes de julio
$pm7 = $impr->pM7($anio);
$lm7 = $impr->lM7($anio);
$cm7 = $impr->cM7($anio);
$am7 = $impr->aM7($anio);
//consulta de los 4 tipos de producciones por el mes de agosto
$pm8 = $impr->pM8($anio);
$lm8 = $impr->lM8($anio);
$cm8 = $impr->cM8($anio);
$am8 = $impr->aM8($anio);
//consulta de los 4 tipos de producciones por el mes de septiembre
$pm9 = $impr->pM9($anio);
$lm9 = $impr->lM9($anio);
$cm9 = $impr->cM9($anio);
$am9 = $impr->aM9($anio);
//consulta de los 4 tipos de producciones por el mes de octubre
$pm10 = $impr->pM10($anio);
$lm10 = $impr->lM10($anio);
$cm10 = $impr->cM10($anio);
$am10 = $impr->aM10($anio);
//consulta de los 4 tipos de producciones por el mes de noviembre
$pm11 = $impr->pM11($anio);
$lm11 = $impr->lM11($anio);
$cm11 = $impr->cM11($anio);
$am11 = $impr->aM11($anio);
//consulta de los 4 tipos de producciones por el mes de diciembre
$pm12 = $impr->pM12($anio);
$lm12 = $impr->lM12($anio);
$cm12 = $impr->cM12($anio);
$am12 = $impr->aM12($anio);
// traigo el valor de la consulta y la pongo en la variable dat   
// ? por que blue? por que estoy programando en la madrugada y parte de mi cerebro no piensa :v
//enero
$pm1d = $pm1[$x]['blue'];
$lm1d = $lm1[$x]['blue'];
$cm1d = $cm1[$x]['blue'];
$am1d = $am1[$x]['blue'];
//febrero
$pm2d = $pm2[$x]['blue'];
$lm2d = $lm2[$x]['blue'];
$cm2d = $cm2[$x]['blue'];
$am2d = $am2[$x]['blue'];
//marzo
$pm3d = $pm3[$x]['blue'];
$lm3d = $lm3[$x]['blue'];
$cm3d = $cm3[$x]['blue'];
$am3d = $am3[$x]['blue'];
//abril
$pm4d = $pm4[$x]['blue'];
$lm4d = $lm4[$x]['blue'];
$cm4d = $cm4[$x]['blue'];
$am4d = $am4[$x]['blue'];
//mayo
$pm5d = $pm5[$x]['blue'];
$lm5d = $lm5[$x]['blue'];
$cm5d = $cm5[$x]['blue'];
$am5d = $am5[$x]['blue'];
//junio
$pm6d = $pm6[$x]['blue'];
$lm6d = $lm6[$x]['blue'];
$cm6d = $cm6[$x]['blue'];
$am6d = $am6[$x]['blue'];
//julio
$pm7d = $pm7[$x]['blue'];
$lm7d = $lm7[$x]['blue'];
$cm7d = $cm7[$x]['blue'];
$am7d = $am7[$x]['blue'];
//agosto
$pm8d = $pm8[$x]['blue'];
$lm8d = $lm8[$x]['blue'];
$cm8d = $cm8[$x]['blue'];
$am8d = $am8[$x]['blue'];
//septiembre
$pm9d = $pm9[$x]['blue'];
$lm9d = $lm9[$x]['blue'];
$cm9d = $cm9[$x]['blue'];
$am9d = $am9[$x]['blue'];
//octubre
$pm10d = $pm10[$x]['blue'];
$lm10d = $lm10[$x]['blue'];
$cm10d = $cm10[$x]['blue'];
$am10d = $am10[$x]['blue'];
//noviembre sin ti
$pm11d = $pm11[$x]['blue'];
$lm11d = $lm11[$x]['blue'];
$cm11d = $cm11[$x]['blue'];
$am11d = $am11[$x]['blue'];
//decembre
$pm12d = $pm12[$x]['blue'];
$lm12d = $lm12[$x]['blue'];
$cm12d = $cm12[$x]['blue'];
$am12d = $am12[$x]['blue'];

?>


<!DOCTYPE html>
<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() == 4) {
    header('Location: cliente.php');
}if ($Sesion->getIdTipoUsuario() == 3) {
    header('Location: principal.php');
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte estadistico</title>
        <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../static/css/estilo.css">
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
    </head>
    <body>
      
<?php include "principaltop.php" ?>
         <div style="height:50px"></div>
        <h2 class="text-center text-light">Reporte Estadistico por Año de Producciones</h2>  
        <!--En este container se muestran los gráficos-->
        <div id="contenedor" style="min-width: 320px; height: 400px; margin: 0 auto"></div>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="../../static/js/jquery-3.3.1.min.js"></script>
        <script src="../../static/js/popper.min.js"></script>
        <script src="../../static/js/bootstrap.min.js"></script>     
        <!-- Highcharts JS -->              
        <script src="../../static/js/highcharts/highcharts.js"></script>
        <script src="../../static/js/highcharts/exporting.js"></script>
        <script src="../../static/js/highcharts/export-data.js"></script>        
        <script src="../../static/js/drilldown.js"></script>

   <?php include "principalfooter.php" ?>
     <script type="text/javascript">
       function lineas() {
             
                Highcharts.chart('contenedor', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php echo $titulo ?>'
                    },
                    subtitle: {
                        text: '<?php echo $subtitulo ?>'
                    },
                    xAxis: {
                        categories: [
                            'Enero',
                            'Febrero',
                            'Marzo',
                            'Abril',
                            'Mayo',
                            'Junio',
                            'Julio',
                            'Agosto',
                            'Septiembre',
                            'Octubre',
                            'Noviembre',
                            'Diciembre'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'cantidad'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.0f} cant</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 1,
                            dataLabels: {
                               // enabled: true,
                                format: '{point.y:.0f}'
                            }
                        }
                    },
                    series: [{
                            name: 'PONENCIA',
                            data: [<?php echo $pm1d ?>, <?php echo $pm2d ?>,<?php echo $pm3d ?>,<?php echo $pm4d ?>
                                ,<?php echo $pm5d ?>,<?php echo $pm6d ?>,<?php echo $pm7d ?>,<?php echo $pm8d ?>
                                , <?php echo $pm9d ?>,<?php echo $pm10d ?>,<?php echo $pm11d ?>,<?php echo $pm12d ?>]

                        }, {
                            name: 'LIBRO',
                            data: [<?php echo $lm1d ?>, <?php echo $lm2d ?>,<?php echo $lm3d ?>,<?php echo $lm4d ?>
                                , <?php echo $lm5d ?>,<?php echo $lm6d ?>,<?php echo $lm7d ?>,<?php echo $lm8d ?>
                                , <?php echo $lm9d ?>,<?php echo $lm10d ?>,<?php echo $lm11d ?>,<?php echo $lm12d ?>]


                        }, {
                            name: 'CAPITULO DE LIBRO',
                            data: [<?php echo $cm1d ?>, <?php echo $cm2d ?>,<?php echo $cm3d ?>, <?php echo $cm4d ?>
                                , <?php echo $cm5d ?>,<?php echo $cm6d ?>,<?php echo $cm7d ?>,<?php echo $cm8d ?>
                                ,<?php echo $cm9d ?>,<?php echo $cm10d ?>,<?php echo $cm11d ?>,<?php echo $cm12d ?>]

                        }, {
                            name: 'ARTICULO INDEXADO',
                            data: [<?php echo $am1d ?>, <?php echo $am2d ?>,<?php echo $am3d ?>,<?php echo $am4d ?>
                                , <?php echo $am5d ?>,<?php echo $am6d ?>,<?php echo $am7d ?>,<?php echo $am8d ?>
                                ,<?php echo $am9d ?>,<?php echo $am10d ?>,<?php echo $am11d ?>,<?php echo $am12d ?>]

                        }]
                });
            }
                lineas();        
        </script>
    </body>
</html>
