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




$sql = 'SELECT c.*, n.nombre, n.direccion, n.trial_telefono_4, n.trial_tiempo_laborando_5 FROM cliente AS c
        INNER JOIN negocio AS n ON c.id_cliente = n.id_cliente
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
    

<center><h4>Reporte de Clientes</h4>
<table border="1" style="margin: 0 auto;">
        <thead>

        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dpi</th>
            <th>Estado Civil</th>
            <th>Género</th>
            <th>Profesión u oficio</th>
            <th>Fecha de nacimiento</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Nombre del negocio</th>
            <th>Dirección del negocio</th>
            <th>Teléfono del negocio</th>
            <th>Tiempo de laborar</th>

        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>

        <td data-label="Nombres"><?php echo $row['primer_nombre'] . " " . $row['trial_segundo_nombre_3'] ?></td>
        <td data-label="Apellidos"><?php echo $row['trial_primer_apellido_4'] . " " . $row['segundo_apellido'] ?></td>
        <td data-label="Dpi"><?php echo $row['dpi'] ?></td>
        <td data-label="Estado Civil"><?php echo $row['estado_civil'] ?></td>
        
        <td data-label="Género"><?php echo $row['genero'] ?></td>
        <td data-label="Profesión u oficio"><?php echo $row['profesion_oficio'] ?></td>
        <td data-label="Fecha Nacimiento"><?php echo $row['trial_fecha_nacimiento_10'] ?></td>
        <td data-label="Teléfono"><?php echo $row['trial_telefono_11'] ?></td>
        <td data-label="Dirección"><?php echo $row['trial_domicilio_14'] ?></td>
        <td data-label="NombreNeg"><?php echo $row['nombre'] ?></td>
        <td data-label="DirecciónNeg"><?php echo $row['direccion'] ?></td>
        <td data-label="TeléfonoNeg"><?php echo $row['trial_telefono_4'] ?></td>
        
        <td data-label="TiempoLaboral"><?php echo $row['trial_tiempo_laborando_5'] ?></td>

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
        $dompdf->stream("reporteclientes.pdf", array("attachment" => true));

        ?>