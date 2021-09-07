<!DOCTYPE html>
<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() == 4) {
	header('Location: cliente.php');
}if ($Sesion->getIdTipoUsuario() == 3) {
	header('Location: principal.php');
}
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Producción All</title>       
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <link rel="stylesheet" href="../../static/css/maintp.css">
		<?php require '../../app/controller/ctrTipoProduccion.php'; ?>

    </head>

    <body>
        <div style="height:50px"></div>
		<?php include "principaltop.php" ?>
        <div class="container">
            <div class="row"> 
                <h2 class="text-center">Exportar Datos a PDF por Tipo de Producción Total</h2>
                <div class="col-sm-12">
                    <div id="datatable_length">

                        <br>
                        <a href="../report/exportarexcel.php"><button  class="btn btn-secondary buttons-print btn-success">Exportar Excel</button></a>  

                        <!-- BOTON PARA EXPORTAR EL RANGO DE FECHAS -->
                        <a href="../report/exportarTipoProduccionTotal_pdf.php" target="_blank"><button  class="btn btn-secondary buttons-pdf buttons-html5 btn-danger">Exportar PDF</button></a>
						<button  class="btn btn-secondary buttons-print btn-info" onclick="location.href = 'menureporte.php'">Regresar al menú</button>  



                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">

                            <thead>
                                <tr>
                                    <th  align='center'><h4>Código</h4></th>           
                                    <th  align='center'><h4>Titulo</h4></th>                                 
                                    <th align='center'><h4>Autores</h4></th>
                                    <th align='center'><h4>ISSN/ISBN</h4></th>
                                    <th align='center'><h4>Fecha Publicacion</h4></th>
                                    <th align='center'><h4>Revista</h4></th> 
                                    <th align='center'><h4>Tipo Produccion</h4></th>
                                    <th align='center'><h4>Area</h4></th> 
                                    <th align='center'><h4>Observacion</h4></th>

                                </tr>
                            </thead>
                            <tbody id="actualizar">
								<?php include('../report/imprimir_reporteTipoProduccionTotal.php'); ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../static/css/jquery/dist/jquery.min.js"></script>
        <script src="../../static/css/pdf_object/pdfobject.js"></script>

        <script src="../../static/js/jquery-3.3.1.min.js"></script>
        <script src="../../static/js/bootstrap.min.js"></script> 
        <script src="../../static/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../static/js/jquery-ui.min.js" type="text/javascript"></script>
		<?php include "./principalfooter.php" ?>
    </body>
</html>