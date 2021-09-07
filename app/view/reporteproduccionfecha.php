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
        <title>Reporte Fecha</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <link rel="stylesheet" href="../../static/css/mainfecha.css">  
    </head>

    <body>
        <div style="height:50px"></div>
		<?php include "principaltop.php" ?>
        <div class="container">
            <div class="row">
                <h2 class="text-center">Exportar Datos a PDF por Rango de Fecha</h2>
                <br>

                <div class="col-lg-12">  


                    <div id="datatable_length">
						<form action="../report/exportar_pdf.php" method="POST" target="_blank" >

							<!-- RANGO DE FECHAS A BUSCAR Y EXPORTAR -->
							<label style="font-weight: normal;">Desde: <input class="form-control" type="date" id="bd-desde" name="bd-desde"/></label>
							<label style="font-weight: normal;">Hasta: <input class="form-control" type="date" id="bd-hasta" name="bd-hasta"/></label>
							<button id="rango_fecha" class="btn btn-secondary buttons-excel buttons-html5 btn-success">Buscar</button>
							<input type="submit" value="Exportar PDF" class="btn btn-secondary buttons-pdf buttons-html5 btn-danger">

							<button  class="btn btn-secondary buttons-print btn-info" onclick="location.href = 'menureporte.php'">Regresar al menú</button>  

						</form>
					</div>



                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">

                            <thead>
                                <tr>
                                    <th  align='center'><h4>Código</h4></th>           
                                    <th  align='center'><h4>Titulo</h4></th>                                 
                                    <th align='center'><h4>Autores</h4></th>
                                    <th align='center'><h4>ISSN/ISBN</h4></th>
                                    <th align='center'><h4>fecha publicación</h4></th> 
                                    <th align='center'><h4>Revista</h4></th>
                                    <th align='center'><h4>Tipo producción</h4></th> 
                                    <th align='center'><h4>Area</h4></th> 

                                </tr>
                            </thead>
                            <!-- CONTENEDOR DONDE SE IMPRIMEN LA CONSULTA POR FECHAS -->
                            <tbody id="actualizar">
								<?php include('../report/imprimir_reporte.php'); ?>
                            </tbody>


                        </table>
                    </div>
                </div>

            </div>
        </div>

        <script src="../../static/css/jquery/dist/jquery.min.js"></script>
        <script src="../../static/css/pdf_object/pdfobject.js"></script>
        <script type="text/javascript">
															(function () {
																$('#rango_fecha').on('click', function () {
																	var desde = $('#bd-desde').val();
																	var hasta = $('#bd-hasta').val();
																	var url = '../controller/ctrProduccionfecha.php';
																	$.ajax({
																		type: 'POST',
																		url: url,
																		data: 'desde=' + desde + '&hasta=' + hasta,
																		success: function (datos) {
																			$('#actualizar').html(datos);
																		}
																	});
																	return false;
																});
															})();

        </script>
        <script src="../../static/js/jquery-3.3.1.min.js"></script>
        <script src="../../static/js/bootstrap.min.js"></script> 
        <script src="../../static/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../static/js/jquery-ui.min.js" type="text/javascript"></script>
		<?php include "./principalfooter.php" ?>
    </body>
</html>