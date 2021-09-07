<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() == 4) {
	header('Location: cliente.php');
}if ($Sesion->getIdTipoUsuario() == 3) {
	header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Reporte</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
    </head>
    <body>
		<?php include "principaltop.php" ?>
        <article id="content"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row-fluid">
                            <div class="span12">
                                <ul class="breadcrumb">
                                    <li><a href="principal.php">Inicio</a><span class="divider"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-offset-2">
                        <div class="lock-screen-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h2>Reporte...</h2>
                                </div>
                                <div class="panel-body">
                                    <form id="Form" class="" name="Form">
                                        <input class="form-control" id="_modo" name="modo" type="hidden" />
                                        <fieldset class="form-group nomargins">
                                            <legend>Ingrese Los Datos</legend>
                                            <div class="container-fluid">
                                                <label class="control-label col-xs-5"> </label>
                                                <div class="controls col-xs-4">
                                                    <input id="_t" type="radio" name="r" value="t"> Producción <br>
                                                    <input id="_u" type="radio" name="r" value="u"> Reporte Usuarios<br>
                                                    <input id="_f" type="radio" name="r" value="f"> Producción Por Fecha<br>
                                                    <input id="_a" type="radio" name="r" value="a"> Producción Por Autor<br>

                                                </div>
                                            </div>
                                            <br>
                                            <div id="reporte2">
                                                <h3> Reportes por Tipos de Usuarios  </h3>
                                                <br>  <br>  <br>
                                                <fieldset class="form-group nomargins" >

                                                    <label class="control-label col-xs-3" >Reporte de tipos de usuarios All: </label>
                                                    <div class="controls col-xs-9">
														<a href="reportetipousuariototal.php"  > 
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte 
															</button>

														</a> 
                                                    </div>
                                                </fieldset> 
                                                <fieldset class="form-group nomargins" >

                                                    <label class="control-label col-xs-3" >Reporte por tipo de usuario: </label>
                                                    <div class="controls col-xs-9">
														<a href="reporteusuariotipo.php"  > 
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte
															</button>
														</a> 

                                                    </div>
                                                </fieldset>    

                                            </div>

                                            <div id="reporte3">
                                                <h3> Reportes de producciones por fecha  </h3>
                                                <br>  <br>  <br>

                                                <fieldset class="form-group nomargins" id="produccionfecha">
                                                    <label class="control-label col-xs-3" > Produccion Por Fecha </label>
                                                    <div class="controls col-xs-9">
														<a href="reporteproduccionfecha.php">
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte  
															</button>
														</a>
                                                    </div>
                                                </fieldset>                                            
                                            </div>
                                            <div id="reporte4">
                                                <h3> Reportes de Producciones por Autor </h3>
                                                <br>  <br>  <br>

                                                <fieldset class="form-group nomargins" >
                                                    <label class="control-label col-xs-3" > Produccion Por Autor </label>
                                                    <div class="controls col-xs-9">
														<a href="reporteproduccionautor.php">
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte  
															</button>
														</a>
                                                    </div>
                                                </fieldset>                                            
                                            </div>
                                            <div id="reporte5">
                                                <h3> Reportes de Producciones por Tipo </h3>
                                                <br>  <br>  <br>
                                                <fieldset class="form-group nomargins" >
                                                    <label class="control-label col-xs-3" >Reporte Producción All : </label>
                                                    <div class="controls col-xs-9">
														<a href="reportetipoproducciontotal.php" >
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte 
															</button>
														</a> 

                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group nomargins" >
                                                    <label class="control-label col-xs-3" >Reporte por tipo de producción : </label>
                                                    <div class="controls col-xs-9">
														<a href="reporteproducciontipo.php"  >
															<button id="buscar" type="button" class="btn btn-success">
																Dirigirse a generar reporte 
															</button>

														</a> 
                                                    </div>
                                                </fieldset>                                             
                                            </div>
                                        </fieldset>

                                        <div class="panel-body">
                                            <div class="panel" id="respuesta">
                                            </div>
                                        </div>

                                        <div class="panel panel-footer">
											<a href="principal.php"> 
												<button type="button" class="btn btn-danger" id="cancelar" >
													<span class="glyphicon glyphicon-circle-arrow-left"></span>  Cancelar  
												</button>
											</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
		<?php include "./principalfooter.php" ?>
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../static/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../static/js/jquery-ui.min.js" type="text/javascript"></script>


        <script>
			$(document).ready(function () {
				$('#reporte2').hide();
				$('#reporte3').hide();
				$('#reporte4').hide();
				$('#reporte5').hide();
				$('#_modo').val('null');
			});
			$(function () {

				$('#_u').click(function () {
					$('#_modo').val('u');
					$('#reporte2').show();
					$('#reporte3').hide();
					$('#reporte4').hide();
					$('#reporte5').hide();
				});
				$('#_f').click(function () {
					$('#_modo').val('f');
					$('#reporte2').hide();
					$('#reporte3').show();
					$('#reporte4').hide();
					$('#reporte5').hide();
				});
				$('#_a').click(function () {
					$('#_modo').val('a');
					$('#reporte2').hide();
					$('#reporte3').hide();
					$('#reporte4').show();
					$('#reporte5').hide();
				});
				$('#_t').click(function () {
					$('#_modo').val('t');
					$('#reporte2').hide();
					$('#reporte3').hide();
					$('#reporte4').hide();
					$('#reporte5').show();
				});
				$('#buscar').click(function () {
					$('#respuesta').html();

				});
			});
        </script>

    </body>
</html>
