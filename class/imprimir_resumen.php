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

$palabra = null;
$inicio = null;
$fin = null;
if(!isset($_GET['palabra'])){
    $palabra = "";
    $inicio = "";
    $fin = "";
}else{
    $palabra = $_GET['palabra'];
    $inicio = $_GET['inicio'];
    $fin = $_GET['fin'];
}

$sql = 'SELECT 
            s.trial_id_solicitud_1,
            c.primer_nombre,
            c.trial_segundo_nombre_3,
            c.trial_primer_apellido_4,
            c.segundo_apellido,
            d.fecha,
            d.fecha_fin,
            dp.monto_solicitado,
            dp.cuotas,
            i.porcentaje,
            e.nombre,
            e.apellido,
            s.estado,
            s.sede
        FROM solicitud AS s
        INNER JOIN detalle_solicitud AS ds ON s.trial_id_solicitud_1 = ds.trial_id_solicitud_2
        INNER JOIN detalle_prestamo AS dp ON s.trial_id_solicitud_1 = dp.id_solicitud
        INNER JOIN cliente AS c ON dp.id_cliente = c.id_cliente
        INNER JOIN empleado AS e ON ds.id_empleado = e.trial_id_empleado_1
        INNER JOIN desembolso AS d ON dp.id_detalle_prestamo = d.trial_id_detalle_desembolso_3
        INNER JOIN interes AS i ON dp.id_detalle_prestamo = i.trial_id_detalle_prestamo_2
        WHERE e.nombre = "' . $palabra . '"
        AND d.fecha >= "' . $inicio . '" 
        AND d.fecha <= "' . $fin . '"
        ';
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
    

<center><h4>Resumen</h4>
<table class= "table" border="1">
<thead>

        <tr>
            <th>No.</th>
            <th>Asesor</th>
            <th>Clientes</th>
            <th>Sede</th>
            <th>Total Desembolso</th>
            <th>Total Interés</th>
            <th>Total Deuda</th>
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>
        <td data-label="No."><?php echo $row['trial_id_solicitud_1'] ?></td>
        <td data-label="Asesor"><?php echo $row['nombre'] . " " . $row['apellido'] ?></td>
        <td data-label="Clientes"><?php echo $row['primer_nombre'] . " " . $row['trial_segundo_nombre_3'] . " " . $row['trial_primer_apellido_4'] . " " . $row['segundo_apellido'] ?></td>
        <td data-label="Sede"><?php echo $row['sede'] ?></td>
        <td data-label="Total Desembolso"><?php echo "Q " . $row['monto_solicitado'] ?></td>
        <td data-label="Total Interés"><?php echo "Q " . $row['porcentaje']*($row['monto_solicitado']/100) ?></td>
        <td data-label="Total Deuda"><?php echo "Q " . ($row['porcentaje']*($row['monto_solicitado']/100)) + $row['monto_solicitado'] ?></td>
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
        $dompdf->stream("Resumen.pdf", array("attachment" => true));

        ?>