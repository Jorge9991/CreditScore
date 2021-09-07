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
        <title>Tipo de Usuario Total</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <link rel="stylesheet" href="../../static/css/maintu.css">
		<?php require '../../app/controller/ctrTipoUsuario.php'; ?>

    </head>

    <body>
        <div style="height:50px"></div>
		<?php include "principaltop.php" ?>
        <div class="container">
            <div class="row">
                <h2 class="text-center">Exportar Datos a PDF de Usuarios</h2>
                <div class="col-sm-12">
                    <div id="datatable_length">

                        <br>
                        <a href="../report/exportarTipoUsuarioTotal_pdf.php" target="_blank"><button  class="btn btn-secondary buttons-pdf buttons-html5 btn-danger">Exportar PDF</button></a>

                        <a href="menureporte.php"><button  class="btn btn-secondary buttons-print btn-info">Regresar al menú</button></a>  
                    </div>


                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">
                            <thead>
                                <tr>
                                    <th  align='center'><h4>Código</h4></th>           
                                    <th  align='center'><h4>Cédula</h4></th>                                 
                                    <th align='center'><h4>Nombre</h4></th>
                                    <th align='center'><h4>Apellido</h4></th>
                                    <th align='center'><h4>Dirección</h4></th>
                                    <th align='center'><h4>Teléfono</h4></th> 
                                    <th align='center'><h4>Correo</h4></th>
                                    <th align='center'><h4>Usuario</h4></th> 
                                    <th align='center'><h4>Tipo Usuario</h4></th>

                                </tr>
                            </thead>

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
		<?php include "./principalfooter.php" ?>
    </body>
</html>