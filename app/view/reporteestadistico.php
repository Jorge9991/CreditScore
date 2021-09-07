<!DOCTYPE html>
<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() == 4) {
    header('Location: cliente.php');
}if ($Sesion->getIdTipoUsuario() == 3) {
    header('Location: principal.php');
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte estadistico</title>
        <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../static/css/estilo.css">
        <link rel="shortcut icon" href="../../static/img/icono_1.png" type="image/png"/>
    </head>
    <body>
        <div style="height:50px"></div>
        <?php include "principaltop.php" ?>
        <h2 class="text-center text-light">Reporte Estadistico por Año de Producciones</h2>  

        <h4 class="text-center text-light"><label>Ingrese Año:</label></h4>
        <form action="graficoestadistico.php" method="POST" class="text-center text-light">
            <input type="number" name="year" id="year" value="" class="control-label ">
            <input type="submit" value="Generar" id="btnLineas" class="btn btn-secondary buttons-excel buttons-html5 btn-success">
        </form>    

        <?php include "./principalfooter.php" ?>
        <script src="../../static/js/jquery-3.3.1.min.js"></script>
        <script src="../../static/js/bootstrap.min.js"></script>     

        <script type="text/javascript">
            $("#btnLineas").click(function () {
                lineas();
            });
        </script>
    </body>
</html>
<!-- kgw -->