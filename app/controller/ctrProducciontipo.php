      
<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoProduccionReporte.php';

$impr = new daoProduccionReporte();

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
if($_POST['tipo']==false ){
	include('../report/imprimir_reporte.php');
}else{
	$tipo = $_POST['tipo'];
	
	$datos = $impr->tipoProduccion($tipo);
	

?>
    <?php
    if (count($datos) > 0) {
        for ($x = 0; $x < count($datos); $x++) {
            ?>
            <tr>

                <td><?php echo $datos[$x]['codigo']; ?></td>
                <td><?php echo $datos[$x]['titulo']; ?></td>
                <td><?php echo $datos[$x]['id_autor1']; ?> <?php echo $datos[$x]['id_autor2']; ?> <?php echo $datos[$x]['id_autor3']; ?> <?php echo $datos[$x]['id_autor4']; ?> <?php echo $datos[$x]['id_autor5']; ?></td> 
                <td><?php echo $datos[$x]['issn']; ?></td>
                <td><?php echo $datos[$x]['fecha_publicacion']; ?></td>
                <td><?php echo $datos[$x]['id_revista']; ?></td>
                <td><?php echo $datos[$x]['id_tipo_produccion']; ?></td>
                <td><?php echo $datos[$x]['id_area']; ?></td>

            </tr>

            <?php
        }
    } else {
        ?>
        <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
        <?php
    }
}
?>
