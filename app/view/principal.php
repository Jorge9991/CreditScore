<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() == 4) {
    header('Location: cliente.php');
}
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Principal</title>
        <link href="../../static/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../static/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
    </head>
    <body>
        <?php include "principaltop.php" ?>
        <article id="content">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row-fluid" id="menu">
                                <?php if ($Sesion->getIdTipoUsuario() == 1) { ?>

                                    <a href="usuario.php" class="icon well sbox">
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/usuario.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Usuario</h4>
                                                <span class="icondesc">Administración de Usuarios</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                                <?php if ($Sesion->getIdTipoUsuario() == 1) { ?>
                                    <a href="tipousuario.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/tipo de usuarios.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Tipo De Usuario</h4>
                                                <span class="icondesc">Administración de Tipos de Usuarios</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                                <?php if ($Sesion->getIdTipoUsuario() != 3) { ?>

                                    <a href="autor.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/autor.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Autor</h4>
                                                <span class="icondesc">Administración de Autores</span>
                                            </div>
                                        </div>
                                    </a>


                                    <a href="profesion.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/cliente.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Profesión</h4>
                                                <span class="icondesc">Administración de Profesiones</span>
                                            </div>
                                        </div>
                                    </a>


                                    <a href="indexacion.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/indexacion.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Indexación</h4>
                                                <span class="icondesc">Administración de Indexaciones</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="area.php" class="icon well sbox">
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/servicio .png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Área</h4>
                                                <span class="icondesc">Administración de Áreas</span>
                                            </div>
                                        </div>
                                    </a>


                                    <a href="linea.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/docu_inv.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Linea Investigación</h4>
                                                <span class="icondesc">Administración de Lineas de Investigación</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="sublinea.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/grupo.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Sublineas de Investigación</h4>
                                                <span class="icondesc">Administración de Sublineas de Invest.</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                                <?php if ($Sesion->getIdTipoUsuario() == 1) { ?>
                                    <a href="revista.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/revista.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Revista Cientifica y Editoriales</h4>
                                                <span class="icondesc">Administración de Revistas Cient. y Edit.</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php if ($Sesion->getIdTipoUsuario() != 3) { ?>
                                    <a href="tiporevista.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/tipo_revista.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Tipo Revista</h4>
                                                <span class="icondesc">Administración de Tipos de Rev.</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="tipoproduccion.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/articulo.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Tipo Prod. Cient.</h4>
                                                <span class="icondesc">Administración de Tip. Prod. Cient.</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="produccion.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/tipo_prod.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Producción Científica</h4>
                                                <span class="icondesc">Administración de Prod. Cient.</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!--<a href="proyectointegrador.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/proyecto.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Proyectos</h4>
                                                <span class="icondesc">Administración de Proyectos Int. Sab.</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/jurado_seleccion.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Jurados</h4>
                                                <span class="icondesc">Administración de Jurados Int. Sab.</span>
                                            </div>
                                        </div>
                                    </a>


                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/docu_inv.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Evaluar Doc. Pis.</h4>
                                                <span class="icondesc">Administración de Cal. Doc. Pis</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/orden.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Evaluar Proy. Pis</h4>
                                                <span class="icondesc">Administración de Cal. Proy. Pis</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/evaluar_tutor.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Evaluar Tutor</h4>
                                                <span class="icondesc">Administración de Cal. Tutor.</span>
                                            </div>
                                        </div>
                                    </a>-->
                                <?php } ?>
                                <?php if ($Sesion->getIdTipoUsuario() == 3) { ?>
                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/docu_inv.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Evaluar Doc. Pis.</h4>
                                                <span class="icondesc">Administración de Cal. Doc. Pis</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="tiposervicio.php" class="icon well sbox">
                                        <div class="iconimage" >
                                            <div class="pd">
                                                <img src="../../static/img/menu/orden.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Evaluar Proy. Pis</h4>
                                                <span class="icondesc">Administración de Cal. Proy. Pis</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php if ($Sesion->getIdTipoUsuario() == 1 || $Sesion->getIdTipoUsuario() == 5 || $Sesion->getIdTipoUsuario() == 2) { ?>


                                    <a href="reporteestadistico.php " class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/estadistica.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Indicadores</h4>
                                                <span class="icondesc">Administración de Indicadores</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="menureporte.php" class="icon well sbox" >
                                        <div class="iconimage">
                                            <div class="pd">
                                                <img src="../../static/img/menu/reporte.png" border="0">
                                            </div>
                                        </div>
                                        <div class="iconname">
                                            <div class="pd">
                                                <h4 class="tituloicon">Reportes</h4>
                                                <span class="icondesc">Administración de Reportes</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?> 
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php include "./principalfooter.php" ?>
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
