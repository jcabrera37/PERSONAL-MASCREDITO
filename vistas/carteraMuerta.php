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


$inicio = null;
$fin = null;
if(!isset($_POST['inicio'])){
    $inicio = "";
    $fin = "";
}else{
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
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
            s.estado
        FROM solicitud AS s
        INNER JOIN detalle_solicitud AS ds ON s.trial_id_solicitud_1 = ds.trial_id_solicitud_2
        INNER JOIN detalle_prestamo AS dp ON s.trial_id_solicitud_1 = dp.id_solicitud
        INNER JOIN cliente AS c ON dp.id_cliente = c.id_cliente
        INNER JOIN empleado AS e ON ds.id_empleado = e.trial_id_empleado_1
        INNER JOIN desembolso AS d ON dp.id_detalle_prestamo = d.trial_id_detalle_desembolso_3
        INNER JOIN interes AS i ON dp.id_detalle_prestamo = i.trial_id_detalle_prestamo_2
        WHERE s.estado = "cancelado" AND DATE_ADD(d.fecha_fin,INTERVAL 30 DAY) < now()
        AND d.fecha_fin >= "' . $inicio . '" 
        AND d.fecha_fin <= "' . $fin . '"
        ';
$resultado = $conexion->query($sql);
$user = $resultado->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/carteraMuerta.css" rel="stylesheet" type="text/css">
    <title>Cartera Muerta</title>
</head>
<body>
    


<div class="container">
    <header>Cartera Muerta</header>

    <form action="carteraMuerta.php" method="POST">
        <div class="primer form">
                 

                <div class="datos personales">
                    <span class="tittle">+30 días vencidos</span>
                    <div class="fields">
        <div class="input-fields">
                        
        <input type="date" name="inicio" placeholder="Seleccionar rutas" value="<?php echo $inicio ?>">

                    </div>
                    <div class="input-fields">
                    <input type="date" name="fin" id="" value="<?php echo $fin ?>">


                    </div>

                    <div class="input-fields">

            <button class="uBtn" type="submit">Buscar </button>
            </div>

                    </div>

                   

        </div>

        
<div class="datos personales">


                

                
<div class="fields">
<div class="input-fields">
        <label for="">Datos Encontrados</label>


    </div>
        <table class= "table">
        <thead>

        <tr>
            <th>Codigo</th>
            <th>Cliente</th>
            <th>Gestor</th>
            <th>Desembolso</th>
            <th>Interés</th>
            <th>Fecha Desembolso</th>
            <th>Fecha Vencimiento</th>
            <th>Estado</th>
            <th> </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>
        <td data-label="codigo"><?php echo $row['trial_id_solicitud_1'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_segundo_nombre_3'] . " " . $row['trial_primer_apellido_4'] . " " . $row['segundo_apellido'] ?></td>
        <td data-label="Gestor"><?php echo $row['nombre'] . " " . $row['apellido'] ?></td>
        <td data-label="Desembolso"><?php echo "Q " . $row['monto_solicitado'] ?></td>
        <td data-label="Interes"><?php echo $row['porcentaje'] . " %" ?></td>
        <td data-label="Fecha Desembolso"><?php echo date("d-m-Y", strtotime($row['fecha'])) ?></td>
        <td data-label="Fecha Vencimiento"><?php echo date("d-m-Y", strtotime($row['fecha_fin']))  ?></td>
        <td data-label="Estado"><?php echo $row['estado'] ?></td>
        <td data-label="Revisar">            
            <button class="uBtn2">Buscar </button>
        </td>
        </tr>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_carteraMuerta.php?inicio=" . $inicio . "&fin=" . $fin ?>">imprimir </a>


</div>



    </form>


</div>










</body>
</html>