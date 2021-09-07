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
        <title>Revistas</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <link href="../../static/css/chosen.css" rel="stylesheet"/>
        <?php require '../../app/controller/ctrRevista.php'; ?>
        <?php require '../../app/controller/ctrIndexacion.php'; ?>
        <?php require '../../app/controller/ctrTipoRevista.php'; ?>
    </head>
    <body>
        <header>
            <?php include "principaltop.php" ?>
        </header>
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

                        <div class="panel panel-default panel-table panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-1">
                                        <img src="../../static/img/menu/revista.png" height="65">
                                    </div>
                                    <div class="col col-xs-3">
                                        <h3>Listado De Revistas</h3>
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
                                            <th>Procedencia</th>
                                            <th>Indexado</th>
                                            <th>TipoRevista</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr> 
                                    </thead>
                                    <tbody id="tdetalle">
                                        <?php
                                        $revistas = ctrRevista::getRevistas();
                                        foreach ($revistas as $revista) {

                                            $id = $revista->getIdRevista();
                                            ?>
                                            <tr>
                                                <td align="center"><?= $revista->getIdRevista() ?></td>
                                                <td align="center"><?= $revista->getNombre() ?></td>
                                                <td align="center"><?= $revista->getProcedencia() ?></td>
                                                <td align="center"><?= $revista->getIdIndexacion() ?></td>
                                                <td align="center"><?= $revista->getIdTipoRevista() ?></td>
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
                    <div id="dialog" title="Mantenimiento de tipos de Revistas" >
                        <form class="form-horizontal " role="form" id="frmRevista">
                            <input type="hidden" name="idRevista" id="_idRevista" value="0"/>                      
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
                                            <input type="text"  class="form-control" id="_nombre" name="nombre" placeholder="Ingrese solo numeros"  maxlength="200" required="true" onfocusout="this.value=this.value.toUpperCase()" >
                                        </div>
                                        <label class="control-label col-xs-2">Procedencia:</label>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" id="_procedencia" name="procedencia" placeholder="Ingrese solo letras" maxlength="100" required="true" onfocusout="this.value=this.value.toUpperCase()">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Indexacion:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_indexacion" name="idIndexacion" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $indexaciones = ctrIndexacion::getIndexaciones();
                                                foreach ($indexaciones as $indexacion) {
                                                    ?>
                                                    <option value="<?= $indexacion->getIdIndexacion() ?>"><?= $indexacion->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">TipoRevista:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_tipo_revista" name="idTipoRevista" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $tiporevistatas = ctrTipoRevista::getTipoRevistas();
                                                foreach ($tiporevistatas as $tipo) {
                                                    ?>
                                                    <option value="<?= $tipo->getIdTipoRevista() ?>"><?= $tipo->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Estado:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_estado" name="estado" <?php if ($Sesion->getIdTipoUsuario() != 1) { ?> disabled="" <?php } ?> >
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
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
            $('.input-number').on('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

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
                    $('#frmUsuario').each(function () {
                        this.reset();
                    });
                    $('#_id').val(0);
                    $('#_opc').val('I');
                    $("#dialog").dialog("open");
                    $("#tabs").tabs(
                            {active: 0}
                    );
                    $('#_id_indexacion').chosen({width: "100%"});
                    $('#_id_tipo_revista').chosen({width: "100%"});
                });
                $("#btnSalir").click(function () {
                    $("#dialog").dialog("close");
                });
            });

            $(function () {
                $('#frmRevista').on({
                    submit: function () {

                        var form = $('#frmRevista');
                        var disabled = form.find(':input:disabled').removeAttr('disabled');
                        var serialized = form.serialize();
                        disabled.attr('disabled', 'disabled');
                        $.ajax({
                            url: "revistaopc.php",
                            data: serialized,
                            type: 'POST',
                            dataType: 'json',

                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    alert("Guardado");
                                    location.reload();
                                    J
                                    return;
                                }
                                alert(data.error);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert("REGISTRO EXISTENTE");
                            }
                        });
                        return false;
                    }
                });
                $('#tdatos #tdetalle').on('click', 'a[rel="elim"]', function () {
                    var data = $(this).data('id');
                    $.ajax({
                        url: "revistaopc.php",
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
                            alert(errorThrown);
                        }
                    });
                });

                $('#tdatos #tdetalle').on('click', 'a[rel="edit"]', function () {
                    var data = $(this).data('id');
                    $('#_idRevista').val(data.id);
                    $.ajax({
                        url: "revistaopc.php",
                        data: data,
                        type: 'POST',
                        dataType: 'json',
                        success: function (json, textStatus, jqXHR) {
                            $('#_opc').val('M');
                            $('#_idRevista').val(json.id_revista);
                            $('#_nombre').val(json.nombre);
                            $('#_procedencia').val(json.procedencia);
                            $('#_id_indexacion').val(json.id_indexado);
                            $('#_id_tipo_revista').val(json.id_tipo_revista);
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