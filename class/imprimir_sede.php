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

$sql = 'SELECT sede.trial_id_sede_1, dc.id_detalle_sede_capital, c.trial_id_capital_1, sede.nombre, sede.direccion, c.monto_inicial FROM sede 
        INNER JOIN detalle_sede_capital AS dc ON sede.trial_id_sede_1 = dc.id_sede
        INNER JOIN capital AS c ON dc.id_capital = c.trial_id_capital_1
        WHERE nombre LIKE "%' . $_GET['palabra'] . '%"';
$resultado = $conexion->query($sql);
$sedes = $resultado->fetchAll();

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
    

<center><h4>Sedes</h4>
<table border="1" style="margin: 0 auto;">
        <thead>

        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Capital Disponible</th>
            <th>Observaciones</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($sedes as $row) { ?>
        <tr>

        <td data-label="Nombre"><?php echo $row['nombre'] ?></td>
        <td data-label="Departamento"><?php echo $row['direccion'] ?></td>
        <td data-label="Capital Disponible"><?php echo $row['monto_inicial'] ?></td>
        
        <td data-label="Observaciones"></td>
        
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
        $dompdf->stream("reportedeSedes.pdf", array("attachment" => true));

        ?>