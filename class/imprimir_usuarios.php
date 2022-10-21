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

$sql = 'SELECT * FROM usuario AS u
        INNER JOIN empleado AS e ON u.id_empleado = e.trial_id_empleado_1
        WHERE nombre LIKE "%' . $_GET['palabra'] . '%"';
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
    

<center><h4>Usuarios</h4>
<table border="1" style="margin: 0 auto;">
        <thead>

        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo de usuario</th>
            <th>Sede</th>
            <th>password</th>
           
        </tr>
        </thead>

        <tbody>
            <?php foreach($user as $row){ ?>
        <tr>

        <td data-label="Nombre"><?php echo $row['nombre'] ?></td>
        <td data-label="email"><?php echo $row['usuario'] ?></td>
        <td data-label="tipo"><?php echo $row['tipo_usuario'] ?></td>
        <td data-label="sede"><?php echo $row['sede'] ?></td>
        <td data-label="pass"><?php echo $row['contrasena'] ?></td>
        
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
        $dompdf->stream("listadoUsuarios.pdf", array("attachment" => true));

        ?>