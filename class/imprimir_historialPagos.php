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

$sql = 'SELECT * FROM empleado AS e
INNER JOIN pagos_historial ph ON ph.id_empleado = e.trial_id_empleado_1
INNER JOIN cliente AS c ON ph.id_cliente = c.id_cliente
WHERE e.nombre = "' . $_GET['empleado'] . '"
AND ph.fecha >= "' . $_GET['inicio'] . '" 
AND ph.fecha <= "' . $_GET['fin'] . '"
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
    

<center><h4>Historial de pagos</h4>
<table class= "table" border="1">
        <thead>

        <tr>
            <th>Asesor</th>
            <th>Cliente</th>
            <th>Fecha De Pago</th>
            <th>Monto</th>
            <th>Mora</th>
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>

        <tr>

        <td data-label="Asesor"><?php echo $row['nombre'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
        <td data-label="Fecha"><?php echo $row['fecha'] ?></td>
        
        <td data-label="Monto"><?php echo $row['monto'] ?></td>
        <td data-label="Mora"><?php echo $row['mora'] ?></td>
        </br>
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
        $dompdf->stream("HistorialPagos.pdf", array("attachment" => true));

        ?>