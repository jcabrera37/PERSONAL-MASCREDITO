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
if(!isset($_GET['palabra'])){
    $palabra = "";
}else{
    $palabra = $_GET['palabra'];
}

$sql = 'SELECT c.* FROM cliente AS c
        WHERE estado = "inactivo"
        WHERE primer_nombre = "%' . $palabra . '%"
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
    

<center><h4>Clientes Inactivos</h4>
<table class= "table" border="1">
<thead>

        <tr>
            <th>Codigo</th>
            <th>Cliente</th>
            <!-- <th>Gestor</th>
            <th>Desembolso</th>
            <th>Interés</th>
            <th>Fecha Desembolso</th>
            <th>Fecha Vencimiento</th> -->
            <th>Estado</th>
            <th>Operador</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>

        <td data-label="codigo"><?php echo $row['id_cliente'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
        <!-- <td data-label="Gestor"><?php echo $row['id_cliente'] ?></td>
        <td data-label="Desembolso">-</td>
        <td data-label="Interes">-</td>
        <td data-label="Fecha Desembolso">-</td>
        <td data-label="Fecha Vencimiento">-</td> -->
        <td data-label="Estado"><?php echo $row['estado'] ?></td>
        <td data-label="Operador"><?php echo $row['usuario'] ?></td>
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
        $dompdf->stream("ClientesInactivos.pdf", array("attachment" => true));

        ?>