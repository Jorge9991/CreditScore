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
        <title>Lineas</title>
        <link href="../../static/css/chosen.css" rel="stylesheet"/>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
       <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <?php require '../../app/controller/ctrLinea.php'; ?>
        <?php require '../../app/controller/ctrArea.php'; ?>
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
                                        <img src="../../static/img/menu/docu_inv.png" height="65">
                                    </div>
                                    <div class="col col-xs-3">
                                        <h3>Listado De Lineas de Investigacion</h3>
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
                                            <th>Descripcion</th>
                                            <th>Area</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr> 
                                    </thead>
                                    <tbody id="tdetalle">
                                        <?php
                                        $lineas = ctrLinea::getLineas();
                                        foreach ($lineas as $linea) {

                                            $id = $linea->getIdLinea();
                                            ?>
                                            <tr>
                                                <td align="center"><?= $linea->getIdLinea() ?></td>
                                                <td align="center"><?= $linea->getDescripcion() ?></td>
                                                <td align="center"><?= $linea->getIdArea() ?></td>
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
                    <div id="dialog" title="Mantenimiento de tipos de lineas" >
                        <form class="form-horizontal " role="form" id="frmLinea">
                            <input type="hidden" name="idLinea" id="_idLinea" value="0"/>                      
                            <input type="hidden" name="opc" id="_opc" value="I"/>
                            <input type="hidden" name="action" id="_action" value="add">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Ingrese la Informacion...</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Descripcion:</label>
                                        <div class="col-xs-4">
                                            <input type="text"  class="form-control" id="_descripcion" name="descripcion" maxlength="200" placeholder="Ingrese solo letras"  required="true"  >
                                        </div>
                                        <label class="control-label col-xs-2">Area</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_area" name="idArea" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $areas = ctrArea::getAreas();
                                                foreach ($areas as $area) {
                                                    ?>
                                                    <option  value="<?= $area->getIdArea() ?>" 
                                                    <?php if ($Sesion->getIdTipoUsuario() == 2) { ?>
                                                                 selected="" <?php } ?>><?= $area->getDescripcion() ?></option>
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
                    $('#frmAutor').each(function () {
                        this.reset();
                    });
                    $('#_id').val(0);
                    $('#_opc').val('I');
                    $("#dialog").dialog("open");
                    $("#tabs").tabs(
                            {active: 0}
                    );
                    $('#_id_area').chosen({width: "100%"});
                });
                $("#btnSalir").click(function () {
                    $("#dialog").dialog("close");
                });
            });

            $(function () {
                $('#frmLinea').on({
                    submit: function () {

                        var form = $('#frmLinea');
                        var disabled = form.find(':input:disabled').removeAttr('disabled');
                        var serialized = form.serialize();
                        disabled.attr('disabled', 'disabled');

                        $.ajax({
                            url: "lineaopc.php",
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
                                alert("REGISTRO EXISTENTE");
                            }


                        });

                        return false;


                    }
                });
                $('#tdatos #tdetalle').on('click', 'a[rel="elim"]', function () {
                    var data = $(this).data('id');
                    $.ajax({
                        url: "lineaopc.php",
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
                    $('#_idLinea').val(data.id);
                    $.ajax({
                        url: "lineaopc.php",
                        data: data,
                        type: 'POST',
                        dataType: 'json',
                        success: function (json, textStatus, jqXHR) {
                            $('#_opc').val('M');
                            $('#_idLinea').val(json.id_linea);
                            $('#_descripcion').val(json.descripcion);
                            $('#_id_area').val(json.id_area);
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