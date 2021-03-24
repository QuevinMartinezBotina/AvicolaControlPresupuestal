<?php

header("Content-Type: application/xls");

header("Content-Disposition: attachment; filename= reporte.xls");
?>
<table>
    <tr>
        <th>Fecha</th>
        <th>Articulo</th>
        <th>Valor Total</th>
        <th>Area</th>
        <th>Proveedor</th>
        <th>Detalles</th>
    </tr>
    <?php

    include("../../helper/conexion-excel.php");
    $sql = "SELECT * FROM mantenimiento";
    $ejecutar = mysqli_query($conexion, $sql);
    while ($fila = mysqli_fetch_array($ejecutar)) {


    ?>
        <tr>
            <td><?php echo $fila[1]; ?></td>
            <td><?php echo $fila[2]; ?></td>
            <td><?php echo $fila[3]; ?></td>
            <td><?php echo $fila[4]; ?></td>
            <td><?php echo $fila[5]; ?></td>
            <td><?php echo $fila[6]; ?></td>
            <td><?php echo utf8_decode($fila[4]); ?></td>

        </tr>

    <?php
    }
    ?>
</table>