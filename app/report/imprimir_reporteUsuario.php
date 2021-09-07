<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/daoTipoUsuarioReporte.php';
$impr = new daoTipoUsuarioReporte();
$datos = $impr->listarTodo();
?>

<?php
if (count($datos) > 0) {
    for ($x = 0; $x < count($datos); $x++) {
        ?>
        <tr>
            <td><?php echo $datos[$x]['idUsuario']; ?></td>
            <td><?php echo $datos[$x]['cedula']; ?></td>
            <td><?php echo $datos[$x]['nombre']; ?></td>
            <td><?php echo $datos[$x]['apellido']; ?></td>
            <td><?php echo $datos[$x]['direccion']; ?></td>
            <td><?php echo $datos[$x]['telefono']; ?></td>
            <td><?php echo $datos[$x]['correo']; ?></td>
            <td><?php echo $datos[$x]['usuario']; ?></td>
            <td><?php echo $datos[$x]['idTipoUsuario']; ?></td>
        </tr>

        <?php
    }
} else {
    ?>
    <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
    <?php
}
?>

