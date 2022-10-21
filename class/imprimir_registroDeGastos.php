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

$sql = 'SELECT * FROM gasto
        WHERE nombre LIKE "%' . $palabra . '%"';
$resultado = $conexion->query($sql);
$gastos = $resultado->fetchAll();




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
    

<center><h4>Historial de Gastos</h4>
<table class= "table" border="1">
        <thead>

        <tr>
            <th>Nombre del gasto</th>
            <th>Tipo de gasto</th>
            <th>Fecha del gasto</th>
            <th>Cantidad del gasto</th>
            <th>Rubro</th>
            
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($gastos as $row) { ?>
            <tr>
                <td data-label="nombre"><?php echo $row['nombre'] ?></td>
                <td data-label="tipo"> <?php echo $row['tipo'] ?> </td>
                <td data-label="Fecha"><?php echo $row['fecha'] ?></td>
                <td data-label="cantidad"><?php echo $row['cantidad'] ?></td>
                <td data-label="rubro"><?php echo $row['rubro'] ?></td>
            <tr>
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
        $dompdf->stream("registrodeGastos.pdf", array("attachment" => true));

        ?>