<?php require('dashboard.php');

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
if(!isset($_POST['palabra'])){
    $palabra = "";
}else{
    $palabra = $_POST['palabra'];
}


$sql = 'SELECT c.*, n.nombre, n.direccion, n.trial_telefono_4, n.trial_tiempo_laborando_5 FROM cliente AS c
        INNER JOIN negocio AS n ON c.id_cliente = n.id_cliente
        WHERE primer_nombre LIKE "%' . $palabra . '%" AND estado = "lnegra"';
$resultado = $conexion->query($sql);
$user = $resultado->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista negra</title>
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/listanegra.css" rel="stylesheet" type="text/css">
</head>
<body>


<div class="container">


<Header class="header">Busque por nombre de cliente

</Header>


<div class="fields">
        <div class="inputfields">
        <form action="listanegra.php" method="POST">
            <input type="text" name="palabra" placeholder="Escriba el nombre del cliente">
            <button class="uBtn"><span class="btnText" type="submit">Buscar</span> </button>
        </div>



</div>

<div class="datos personales">


                

                
                <div class="fields">
                <div class="input-fields">
                        <label for="">Lista negra</label>


                    </div>
</div>
                        <div class="outer-wrapper">
                        <div class="table-wrapper">
                        <table>
                        <thead>

                        <tr>
                            
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>teléfono</th>
                          
                            <th>Tiempo Laborando</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($user as $row) { ?>
                        <tr>                
                            <td data-label="Nombres"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
                            <td data-label="Dirección"><?php echo $row['trial_domicilio_14'] ?></td>
                            <td data-label="Teléfono"><?php echo $row['trial_telefono_11'] ?></td>
                            <td data-label="Monto"><?php echo $row['trial_tiempo_laborando_5'] ?></td>
                        </tr>
                        <?php } ?>
                      
                        </tbody>
</table>
                  
                    
</div>
</div>





</div>
</body>
</html>