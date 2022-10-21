<?php 

ini_set('display_errors', 1);
error_reporting(-1);

// CONEXION A LA BASE DE DATOS
$conexion = null;
try {
    $conexion = new PDO('mysql:host=localhost;dbname=mc', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}





$sql = 'SELECT d.*, c.primer_nombre, c.trial_primer_apellido_4, c.dpi, i.cantidad, e.nombre as nombre_empleado, e.apellido as apellido_empleado, dp.id_solicitud, dp.monto_solicitado FROM desembolso AS d
        INNER JOIN cliente AS c ON c.id_cliente = d.id_cliente
        INNER JOIN detalle_prestamo AS dp ON dp.id_detalle_prestamo = d.trial_id_detalle_desembolso_3
        INNER JOIN detalle_solicitud AS ds ON ds.id_detalle_solicitud = dp.id_solicitud
        INNER JOIN empleado AS e ON e.trial_id_empleado_1  = ds.id_empleado
        INNER JOIN interes AS i ON i.trial_id_detalle_prestamo_2 = dp.id_detalle_prestamo
        WHERE primer_nombre LIKE "%' . $_GET['cliente'] . '%"';
$resultado = $conexion->query($sql);
$user = $resultado->fetchAll();

ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
</head>
<body>
    

<center><h4>Historial de Prestamos</h4>
<table border="1" style="margin: 0 auto;">
<thead>
<th>Codigo</th>
            <th>Cliente</th>
            <th>Gestor</th>
            <th>Desembolso</th>
            <th>Interés</th>
            <th>Fecha Desembolso</th>
            <th>Fecha Vencimiento</th>
            <th>Estado</th>
            <th>Operador</th>
            
    
</thead>
<tbody>
<?php foreach ($user as $row) { ?>

    <tr>
        <td data-label="codigo"><?php echo $row['id_solicitud'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
        <td data-label="Gestor"><?php echo $row['fecha'] ?></td>
        <td data-label="Desembolso"><?php echo $row['monto_solicitado'] ?></td>
        
        <td data-label="Interes"><?php echo $row['cantidad'] ?></td>
        <td data-label="Fecha Desembolso"><?php echo $row['fecha'] ?></td>
        <td data-label="Fecha Vencimiento"><?php echo $row['fecha_fin'] ?></td>
        <td data-label="Estado"><?php echo $row['estado'] ?></td>
        <td data-label="Operador"><?php echo $row['nombre_empleado'] . " " . $row['apellido_empleado'] ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>

        </body>
        </html>

        <?php 

        $html = ob_get_clean();

        require_once '../libreria/dompdf/autoload.inc.php';
        use Dompdf\Dompdf;
        $dompdf = new Dompdf();

        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('letter', "landscape");

        $dompdf->render();
        $dompdf->stream("HistorialPrestamos.pdf", array("attachment" => true));

        ?>