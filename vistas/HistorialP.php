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

if(isset($_GET['actualizar'])){

    $consulta = 'UPDATE desembolso
    SET estado = "realizado"
    WHERE id_desembolso = ' . $_GET['actualizar'];

    $res = $conexion->prepare($consulta);
    $res->execute();

}


$sql = 'SELECT d.*, c.primer_nombre, c.trial_primer_apellido_4, c.dpi, i.cantidad, e.nombre as nombre_empleado, e.apellido as apellido_empleado, dp.id_solicitud, dp.monto_solicitado FROM desembolso AS d
        INNER JOIN cliente AS c ON c.id_cliente = d.id_cliente
        INNER JOIN detalle_prestamo AS dp ON dp.id_detalle_prestamo = d.trial_id_detalle_desembolso_3
        INNER JOIN detalle_solicitud AS ds ON ds.id_detalle_solicitud = dp.id_solicitud
        INNER JOIN empleado AS e ON e.trial_id_empleado_1  = ds.id_empleado
        INNER JOIN interes AS i ON i.trial_id_detalle_prestamo_2 = dp.id_detalle_prestamo
        WHERE c.primer_nombre LIKE "%' . $palabra . '%" ';
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
    <link href="../styles/HistorialP.css" rel="stylesheet" type="text/css">
    <title>Historial Prestamo</title>
</head>
<body>
    


<div class="container">
    <header>Historial de Prestamos</header>

    <form action="HistorialP.php" method="POST">
        <div class="primer-form">
                 

                <div class="datos personales">
                    <span class="tittle">Busqueda por fecha</span>
                    <div class="fields">
                    <div class="input-fields">
            <input type="text" name="palabra" placeholder="Escriba el nombre del cliente">
        </div>

        <div class="input-fields">
                        
                        <input type="date" name="" id="" >


                    </div>
                    <div class="input-fields">
                        <input type="date" name="" id="" >


                    </div>

                 

                    <div class="input-fields">

            <button class="uBtn" type="submit">Buscar </button>
            </div>

                    </div>

                   

        </div>

</form>   

<div class="datos personales">


                

                
                <div class="fields">
                <div class="input-fields">
                        <label for="">Datos de historial</label>


                    </div>

                </div>        





<div class="heading">
</div>
<div class="outer-wrapper">
<div class="table-wrapper">
<table>
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
        <td data-label="Gestor"><?php echo $row['nombre_empleado'] . ' ' . $row['apellido_empleado'] ?></td>
        <td data-label="Desembolso"><?php echo $row['monto_solicitado'] ?></td>
        
        <td data-label="Interes"><?php echo $row['cantidad'] ?></td>
        <td data-label="Fecha Desembolso"><?php echo $row['fecha'] ?></td>
        <td data-label="Fecha Vencimiento"><?php echo $row['fecha_fin'] ?></td>
        <td data-label="Estado"><?php echo $row['estado'] ?></td>
        <td data-label="Operador"><?php echo $row['operador_autorizador'] ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>

<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_historialP.php?cliente=" . $palabra ?>">imprimir </a>


</div>




    </form>


</div>










</body>
</html>