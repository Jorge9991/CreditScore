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
        <title>Proyecto Integrador</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../img/icono_1.png" type="image/png"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <?php require '../../app/controller/ctrPeriodoLectivo.php'; ?>
        <?php require '../../app/controller/ctrPeriodoAcademico.php'; ?>
        <?php require '../../app/controller/ctrPersonal.php'; ?>
        <?php require '../../app/controller/ctrUsuario.php'; ?>
        <?php require '../../app/controller/ctrJornada.php'; ?>
        <?php require '../../app/controller/ctrParalelo.php'; ?>      
        <?php require '../../app/controller/ctrCarrera.php'; ?>
        <?php require '../../app/controller/ctrProyectoIntegrador.php'; ?>
    </head>
    <body>
        <header>
            <?php include "principaltop.php" ?>
        </header>
        <article id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-80">
                        <div class="row-fluid">
                            <div class="span25">
                                <ul class="breadcrumb">
                                    <li><a href="principal.php">Inicio</a><span class="divider"></span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel panel-default panel-table panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-1">
                                        <img src="../../static/img/menu/produccion.png" height="85">
                                    </div>
                                    <div class="col col-xs-3">
                                        <h3>Registro de Proyecto Integrador</h3>
                                    </div>                                    
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col col-xs-6 text-left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success" id="btnnuevo">
                                                <i class="glyphicon glyphicon-plus-sign"> </i>  
                                                Nuevo Registro
                                            </button>
                                            <a href="javascript:window.location.reload();" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-refresh"> </i>
                                                Actualizar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered table-responsive table-striped" id="tdatos">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Periodo lectivo</th>
                                            <th>Carrera</th>
                                            <th>Periodo Academico</th>
                                            <th>Tutor</th>
                                            <th>Jornada</th>
                                            <th>Paralelo</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr> 
                                    </thead>
                                    <tbody id="tdetalle">
                                        <?php
                                        $proyectos = ctrProyectoIntegrador::getProyectos();
                                        foreach ($proyectos as $proyecto) {

                                            $id = $proyecto->getIdProyectointegrador();
                                            ?>
                                            <tr>
                                                <td align="center"><?= $proyecto->getIdProyectointegrador() ?></td>
                                                <td align="center"><?= $proyecto->getNombre() ?></td>
                                                <td align="center"><?= $proyecto->getIdPeriodoLectivo() ?></td>
                                                <td align="center"><?= $proyecto->getIdCarrera() ?></td>
                                                <td align="center"><?= $proyecto->getIdNivel() ?></td>
                                                <td align="center"><?= $proyecto->getIdTutor() ?></td>
                                                <td align="center"><?= $proyecto->getIdjornada() ?></td>
                                                <td align="center"><?= $proyecto->getIdParalelo() ?></td>

                                                <td align="center"><span class="label label-success" title="Activo">Activo</span></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm">
                                                            <i class="glyphicon glyphicon-log-in"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" rel="edit" data-id="action=edit&id=<?= $id ?>">
                                                                    <i class="glyphicon glyphicon-edit"></i> Editar
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" rel="elim" data-id="action=elim&id=<?= $id ?>">
                                                                    <i class="glyphicon glyphicon-remove"></i> Eliminar
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>   
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inicio del Modal-->
                <div class="container modal" id="mymodal">
                    <div id="dialog" title="Mantenimiento de Proyecto Integrador" >
                        <form class="form-horizontal " role="form" id="frmProyecto">
                            <input type="hidden" name="idProyectointegrador" id="_idProyectointegrador" value="0"/>                      
                            <input type="hidden" name="opc" id="_opc" value="I"/>
                            <input type="hidden" name="action" id="_action" value="add">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Ingrese la Informacion...</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Nombre:</label>
                                        <div class="col-xs-4">
                                            <input type="text"  class="form-control" id="_nombre" name="nombre" placeholder="Ingrese solo letras" maxlength="200" required="true" onfocusout="this.value=this.value.toUpperCase()" >
                                        </div>
                                        <label class="control-label col-xs-2">Periodo:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idPeriodoLectivo" name="idPeriodoLectivo" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $periodoslectivos = ctrPeriodoLectivo::getPeriodosLectivos();
                                                foreach ($periodoslectivos as $periodolectivo) {
                                                    ?>
                                                    <option value="<?= $periodolectivo->getId() ?>"><?= $periodolectivo->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-group">                 

                                        <label class="control-label col-xs-2">Carrera:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idCarrera" name="idCarrera" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $carreras = ctrCarrera::getCarreras();
                                                foreach ($carreras as $carrera) {
                                                    ?>
                                                    <option value="<?= $carrera->getId() ?>"><?= $carrera->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Nivel:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idNivel" name="idNivel" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $periodosacademicos = ctrPeriodoAcademico::getPeriodosAcademicos();
                                                foreach ($periodosacademicos as $periodoacademico) {
                                                    ?>
                                                    <option value="<?= $periodoacademico->getId() ?>"><?= $periodoacademico->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-group">                 
                                        <label class="control-label col-xs-2">Tutor:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idTutor" name="idTutor" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $tutores = ctrPersonal::getPersonales();
                                                foreach ($tutores as $tutor) {
                                                    ?>
                                                    <option value="<?= $tutor->getIdPersonal() ?>"><?= $tutor->getApellidospersonal() ?> <?= $tutor->getNombrespersonal() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Jornada:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idjornada" name="idjornada" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $jornadas = ctrJornada::getJornadas();
                                                foreach ($jornadas as $jornada) {
                                                    ?>
                                                    <option value="<?= $jornada->getIdJornada() ?>"> <?= $jornada->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                    </div>
                                    <div class="form-group">                 
                                        <label class="control-label col-xs-2">Paralelo:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_idParalelo" name="idParalelo" <?php if ($Sesion->getIdTipoUsuario() == 2) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $paralelos = ctrParalelo::getParalelos();
                                                foreach ($paralelos as $paralelo) {
                                                    ?>
                                                    <option value="<?= $paralelo->getId() ?>"> <?= $paralelo->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Estado:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_estado" name="estado" <?php if ($Sesion->getIdTipoUsuario() != 1) { ?> disabled="" <?php } ?> >
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div> 

                                    </div>




                                </div>

                                <div class="form-group center-block">
                                    <button type="submit" class="btn btn-toolbar btn-lg active" name="Grabar" id="btngrabar" style="margin-left:260px;"><span class="glyphicon glyphicon-bell"></span> Grabar</button> 
                                    <button type="button" id="btnSalir" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
                                </div>
                            </div>								 
                    </div>

                    </form>
                </div>
            </div>
            <!-- Fin del Modal-->
        </div>
    </article>
    <?php include "./principalfooter.php" ?>
    <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../static/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../static/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../static/js/Chosen/chosen.jquery.js" type="text/javascript"></script>

    <script>

        function controltag(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla == 8)
                return true;
            else if (tecla == 0 || tecla == 9)
                return true;
            // patron =/[0-9\s]/;// -> solo letras
            patron = /[0-9\s]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
        $(function () {
            $('#tdatos').dataTable();
            $("#datepicker").datepicker();
            $("#dialog").dialog({
                height: 540,
                width: 950,
                autoOpen: false,
                show: {
                    effect: "explode",
                    duration: 1000
                },
                hide: {
                    effect: "fold",
                    duration: 1000
                }
            });
            $('#btnnuevo').click(function () {
                $('#frmProyecto').each(function () {
                    this.reset();
                });
                $('#_id').val(0);
                $('#_opc').val('I');
                $("#dialog").dialog("open");
                $("#tabs").tabs(
                        {active: 0}
                );
                $('#_idPeriodoLectivo').chosen({width: "100%"});
                $('#_idCarrera').chosen({width: "100%"});
                $('#_idNivel').chosen({width: "100%"});
                $('#_idTutor').chosen({width: "100%"});
                $('#_idjornada').chosen({width: "100%"});
                $('#_idParalelo').chosen({width: "100%"});
            });
            $("#btnSalir").click(function () {
                $("#dialog").dialog("close");
            });
        });

        $(function () {
            $('#frmProyecto').on({
                submit: function () {
                    var form = $('#frmProyecto');
                    var disabled = form.find(':input:disabled').removeAttr('disabled');
                    var serialized = form.serialize();
                    disabled.attr('disabled', 'disabled');
                    $.ajax({
                        url: "proyectointegradoropc.php",
                        data: serialized,
                        type: 'POST',
                        dataType: 'json',

                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                alert("Guardado");
                                location.reload();

                                return;
                            }
                            alert(data.error);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("Registro Existente");

                        }

                    });
                    return false;
                }
            });
            $('#tdatos #tdetalle').on('click', 'a[rel="elim"]', function () {
                var data = $(this).data('id');
                $.ajax({
                    url: "proyectointegradoropc.php",
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.ok == true) {
                            alert("se elimino correctamente");
                            location.reload();
                        } else {
                            alert("Ya se encuentra eliminado");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    }
                });
            });

            $('#tdatos #tdetalle').on('click', 'a[rel="edit"]', function () {
                var data = $(this).data('id');
                $('#_idProyectointegrador').val(data.id);
                $.ajax({
                    url: "proyectointegradoropc.php",
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (json, textStatus, jqXHR) {
                        $('#_opc').val('M');
                        $('#_idProyectointegrador').val(json.id_proyecto);
                        $('#_nombre').val(json.nombre);
                        $('#_idPeriodoLectivo').val(json.id_periodo);
                        $('#_idCarrera').val(json.id_carrera);
                        $('#_idNivel').val(json.id_nivel);
                        $('#_idTutor').val(json.id_tutor);
                        $('#_idjornada').val(json.id_jornada);
                        $('#_idParalelo').val(json.id_paralelo);
                        $('#_estado').val(json.estado);
                        $("#dialog").dialog("open");
                        $("#tabs").tabs({active: 0});
                        return;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
            function setSeleccionarItem($elemento, $comparar) {
                for (var indice = 0; indice < document.getElementById($elemento).length; indice++)
                {
                    if (document.getElementById($elemento).options[indice].text == $comparar)
                    {
                        document.getElementById($elemento).selectedIndex = indice;
                        break;
                    }
                }
            }
            function setSeleccionarItemE($elemento, $comparar) {
                if (document.getElementById($elemento).options[0].value == $comparar) {
                    document.getElementById($elemento).selectedIndex = 0;
                } else {
                    document.getElementById($elemento).selectedIndex = 1;
                }

            }
        });
    </script>
</body>
</html>
