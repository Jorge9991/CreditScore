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
        <title>Producción Científica</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/chosen.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
        <?php require '../../app/controller/ctrProduccion.php'; ?>
        <?php require '../../app/controller/ctrRevista.php'; ?>
        <?php require '../../app/controller/ctrSublinea.php'; ?>
        <?php require '../../app/controller/ctrTipoProduccion.php'; ?>
        <?php require '../../app/controller/ctrAutor.php'; ?>
        <?php require '../../app/controller/ctrArea.php'; ?>
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
                                        <h3>Registro de Producción científica</h3>
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
                                            <th>Codigo Produccion</th>
                                            <th>Titulo</th>
                                            <th>Autores</th>
                                            <th>ISSN/ISBN</th>
                                            <th>Fecha Publicada</th>
                                            <th>Revista</th>
                                            <th>Tipo Produccion</th>
                                            <th>Sublinea</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr> 
                                    </thead>
                                    <tbody id="tdetalle">
                                        <?php
                                        $producciones = ctrProduccion::getProducciones();
                                        foreach ($producciones as $produccion) {

                                            $id = $produccion->getIdProduccion();
                                            ?>
                                            <tr>
                                                <td align="center"><?= $produccion->getIdProduccion() ?></td>
                                                <td align="center"><?= $produccion->getCodigo() ?></td>
                                                <td align="center"><?= $produccion->getTitulo() ?></td>
                                                <td align="center"><?=
                                                    $produccion->getIdAutor1() . ' ' . $produccion->getIdAutor2()
                                                    . ' ' . $produccion->getIdAutor3() . ' ' . $produccion->getIdAutor4() . ' ' . $produccion->getIdAutor5()
                                                    ?></td>
                                                <td align="center"><?= $produccion->getIssn() ?></td>
                                                <td align="center"><?= $produccion->getFechaPublicacion() ?></td>
                                                <td align="center"><?= $produccion->getIdRevista() ?></td>
                                                <td align="center"><?= $produccion->getIdTipoProduccion() ?></td>
                                                <td align="center"><?= $produccion->getIdSublinea() ?></td>
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
                <div class="container modal" id="mymodal" class="">
                    <div id="dialog" title="Mantenimiento de Produccion Científica" >
                        <form class="form-horizontal " role="form" id="frmProduccion">
                            <input type="hidden" name="idProduccion" id="_idProduccion" value="0"/>                      
                            <input type="hidden" name="opc" id="_opc" value="I"/>
                            <input type="hidden" name="action" id="_action" value="add">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Ingrese la Informacion...</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Codigo:</label>
                                        <div class="col-xs-4">
                                            <input type="text"  class="form-control" id="_codigo" name="codigo" placeholder="Ingrese solo letras" maxlength="" required="true" onfocusout="this.value=this.value.toUpperCase()" >
                                        </div>
                                        <label class="control-label col-xs-2">Titulo:</label>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" id="_titulo" name="titulo" placeholder="Ingrese solo letras" maxlength="" required="true" onfocusout="this.value=this.value.toUpperCase()">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Autor1:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_autor1" name="idAutor1" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $autores = ctrAutor::getAutores();
                                                foreach ($autores as $autor) {
                                                    ?>
                                                    <option value="<?= $autor->getIdAutor() ?>"> <?= $autor->getApellido() ?> <?= $autor->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                         
                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Autor2:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_autor2" name="idAutor2" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $autores = ctrAutor::getAutores();
                                                foreach ($autores as $autor) {
                                                    ?>
                                                    <option value="<?= $autor->getIdAutor() ?>"> <?= $autor->getApellido() ?> <?= $autor->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> 
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Autor3:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_autor3" name="idAutor3" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $autores = ctrAutor::getAutores();
                                                foreach ($autores as $autor) {
                                                    ?>
                                                    <option value="<?= $autor->getIdAutor() ?>"> <?= $autor->getApellido() ?> <?= $autor->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Autor4:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_autor4" name="idAutor4" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $autores = ctrAutor::getAutores();
                                                foreach ($autores as $autor) {
                                                    ?>
                                                    <option value="<?= $autor->getIdAutor() ?>"> <?= $autor->getApellido() ?> <?= $autor->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> 
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Autor5:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_autor5" name="idAutor5" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $autores = ctrAutor::getAutores();
                                                foreach ($autores as $autor) {
                                                    ?>
                                                    <option value="<?= $autor->getIdAutor() ?>"> <?= $autor->getApellido() ?> <?= $autor->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">ISSN/ISBN:</label>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" id="_issn" name="issn" placeholder="Ingrese solo letras" maxlength="" required="true" onfocusout="this.value=this.value.toUpperCase()">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Publicación:</label>
                                        <div class="col-xs-4">
                                            <input type="date"  class="form-control" id="_fecha_publicacion" name="fechaPublicacion" placeholder="Ingrese solo numeros"  required="true" onfocusout="this.value=this.value.toUpperCase()" >
                                        </div>
                                        <label class="control-label col-xs-2">Revista:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_revista" name="idRevista" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $revistas = ctrRevista::getRevistas();
                                                foreach ($revistas as $revista) {
                                                    ?>
                                                    <option value="<?= $revista->getIdRevista() ?>"><?= $revista->getNombre() ?></option>
                                                    <?php
                                                }
                                                ?>
                                               
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Tipo Produccion:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_tipo_produccion" name="idTipoProduccion" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $tipoproducciones = ctrTipoProduccion::getTipoProducciones();
                                                foreach ($tipoproducciones as $tipoproduccion) {
                                                    ?>
                                                    <option value="<?= $tipoproduccion->getIdTipoProduccion() ?>"><?= $tipoproduccion->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Url:</label>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" id="_url" name="url" placeholder="Ingrese solo letras" maxlength="" required="true" onfocusout="this.value=this.value.toUpperCase()">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Digital:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_digital" name="digital" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <option value="<?= 1 ?>"><?= 'SI' ?></option>
                                                <option value="<?= 0 ?>"><?= 'NO' ?></option>
                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Fisico:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_fisico" name="fisico" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <option value="<?= 1 ?>"><?= 'SI' ?></option>
                                                <option value="<?= 0 ?>"><?= 'NO' ?></option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Area:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_area" name="idArea" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $areas = ctrArea::getAreas();
                                                foreach ($areas as $area) {
                                                    ?>
                                                    <option value="<?= $area->getIdArea() ?>"><?= $area->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div> 
                                        <label class="control-label col-xs-2">Sublinea:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="_id_sublinea" name="idSublinea" <?php if ($Sesion->getIdTipoUsuario() == 3) { ?> disabled="" <?php } ?>>
                                                <?php
                                                $sublineas = ctrSublinea::getSublineas();
                                                foreach ($sublineas as $sublinea) {
                                                    ?>
                                                    <option value="<?= $sublinea->getIdSublinea() ?>"><?= $sublinea->getDescripcion() ?></option>
                                                    <?php
                                                }
                                                ?>
                                             
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-xs-2">Observacion:</label>
                                        <div class="col-xs-4">
                                            <input type="text"  class="form-control" id="_observacion" name="observacion" placeholder="Ingrese solo letras" maxlength="" required="true" onfocusout="this.value=this.value.toUpperCase()" >
                                        </div>

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
                                                            $('#frmProduccion').each(function () {
                                                                this.reset();
                                                            });
                                                            $('#_id').val(0);
                                                            $('#_opc').val('I');
                                                            $("#dialog").dialog("open");
                                                            $("#tabs").tabs(
                                                                    {active: 0}
                                                            );
                                                            $("#_id_autor1").val('1');
                                                            $("#_id_autor2").val('1');
                                                            $("#_id_autor3").val('1');
                                                            $("#_id_autor4").val('1');
                                                            $("#_id_autor5").val('1');
                                                            $('#_id_autor1').chosen({width: "100%"});
                                                            $('#_id_autor2').chosen({width: "100%"});
                                                            $('#_id_autor3').chosen({width: "100%"});
                                                            $('#_id_autor4').chosen({width: "100%"});
                                                            $('#_id_autor5').chosen({width: "100%"});
                                                            $('#_id_revista').chosen({width: "100%"});
                                                            $('#_id_area').chosen({width: "100%"});
                                                            $('#_id_sublinea').chosen({width: "100%"});
                                                        });
                                                        $("#btnSalir").click(function () {
                                                            window.location.reload();
                                                            $("#dialog").dialog("close");
                                                            window.location.reload();
                                                        });
                                                    });

                                                    $(function () {
                                                        $('#frmProduccion').on({
                                                            submit: function () {

                                                                var form = $('#frmProduccion');
                                                                var disabled = form.find(':input:disabled').removeAttr('disabled');
                                                                var serialized = form.serialize();
                                                                disabled.attr('disabled', 'disabled');
                                                                $.ajax({
                                                                    url: "produccionopc.php",
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
                                                                url: "produccionopc.php",
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
                                                            $('#_idProduccion').val(data.id);
                                                            $.ajax({
                                                                url: "produccionopc.php",
                                                                data: data,
                                                                type: 'POST',
                                                                dataType: 'json',
                                                                success: function (json, textStatus, jqXHR) {
                                                                    $('#_opc').val('M');
                                                                    $('#_idProduccion').val(json.id_produccion);
                                                                    $('#_codigo').val(json.codigo);
                                                                    $('#_titulo').val(json.titulo);
                                                                    $('#_id_autor1').val(json.id_autor1);
                                                                    $('#_id_autor2').val(json.id_autor2);
                                                                    $('#_id_autor3').val(json.id_autor3);
                                                                    $('#_id_autor4').val(json.id_autor4);
                                                                    $('#_id_autor5').val(json.id_autor5);
                                                                    $('#_issn').val(json.issn);
                                                                    $('#_fecha_publicacion').val(json.fecha_publicacion);
                                                                    $('#_idRevista').val(json.id_revista);
                                                                    $('#_id_tipo_produccion').val(json.id_tipo_produccion);
                                                                    $('#_url').val(json.url);
                                                                    $('#_fisico').val(json.fisico);
                                                                    $('#_digital').val(json.digital);
                                                                    $('#_id_area').val(json.id_area);
                                                                    $('#_id_sublinea').val(json.id_sublinea);
                                                                    $('#_observacion').val(json.observacion);
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
