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
        <title>Reporte Usuario</title>
        <link href="../../static/css/chosen.css" rel="stylesheet"/>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <link rel="stylesheet" href="../../static/css/main.css">
		<?php require '../../app/controller/ctrTipoUsuario.php'; ?>
    </head>

    <body>
        <div style="height:50px"></div>
		<?php include "principaltop.php" ?>
        <div class="container">
            <div class="row">
                <h2 class="text-center">Exportar Datos a PDF por Tipos de Usuarios</h2>
                <br>

                <div class="col-lg-12">
                    <div id="datatable_length">
						<form action="../report/exportarTipoUsuario_pdf.php" method="POST" target="_blank" >

							<label class="control-label col-xs-2">Tipo Usuario</label>

							<div class="col-xs-4">
								<select class="form-control" id="_id_tipo" name="_id_tipo" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
									<?php
									$tipos = ctrTipoUsuario::getTipoUsuarios();

									foreach ($tipos as $tipo) {
										?>
										<option  value="<?= $tipo->getIdTipoUsuario() ?>" 
										<?php if ($Sesion->getIdTipoUsuario() == 2) { ?>
													 selected="" <?php } ?>><?= $tipo->getDescripcion() ?>

										</option>
										<?php
									}
									?>

								</select>

							</div> 
							<button id="buscar" class="btn btn-secondary buttons-excel buttons-html5 btn-success">Buscar</button>
							<input type="submit" value="Exportar PDF" class="btn btn-secondary buttons-pdf buttons-html5 btn-danger">

							<button  class="btn btn-secondary buttons-print btn-info" onclick="location.href = 'menureporte.php'">Regresar al menú</button>  
						</form>
					</div>



                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">

                            <thead>
                                <tr>

                                    <th align='center'><h4>Código</h4></th>
                                    <th align='center'><h4>Cedula</h4></th>
                                    <th align='center'><h4>Nombre</h4></th>
                                    <th align='center'><h4>apellido</h4></th>
                                    <th align='center'><h4>Direccion</h4></th>
                                    <th align='center'><h4>Telefono</h4></th>
                                    <th align='center'><h4>Correo</h4></th>
                                    <th align='center'><h4>Usuario</h4></th>
                                    <th align='center'><h4>Tipo Usuario</h4></th>



                                </tr>
                            </thead>
                            <!-- CONTENEDOR DONDE SE IMPRIMEN LA CONSULTA POR FECHAS -->
                            <tbody id="actualizar">
								<?php include('../report/imprimir_reporteUsuario.php'); ?>
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
        <script src="../../static/js/Chosen/chosen.jquery.js" type="text/javascript"></script>
        <script type="text/javascript">

								$('#_id_tipo').chosen({width: "100%"});
								(function () {
									$('#buscar').on('click', function () {
										var tipo = $('#_id_tipo').val();

										var url = '../controller/ctrProduccionTipoUsuario.php';
										$.ajax({
											type: 'POST',
											url: url,
											data: 'tipo=' + tipo,
											success: function (datos) {
												$('#actualizar').html(datos);
											}
										});
										return false;
									});
								})();

        </script>

		<?php include "./principalfooter.php" ?>
    </body>
</html>