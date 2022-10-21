<?php 
session_start();

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



$consulta = 'UPDATE cuotas
    SET estado = "cancelado"
    WHERE id_solicitud = ' . $_POST['id_solicitud'] . ' AND numero_cuota = ' . $_POST['numero_cuota'];

    $res = $conexion->prepare($consulta);
    $res->execute();

if(isset($_POST['ultimoPago'])){

    $consulta = 'UPDATE solicitud
    SET estado = "cancelado"
    WHERE trial_id_solicitud_1 = ' . $_POST['id_solicitud'];

    $res = $conexion->prepare($consulta);
    $res->execute();

}

$sql = 'INSERT INTO pagos_historial(
    id_empleado,
    id_cliente,
    fecha, 
    mora,
    monto_atrasado,
    pago_atrasado,
    saldo_actual,
    monto
    ) VALUES(
        "'. $_SESSION['id_empleado'] .'",
        "'. $_POST['id_cliente'] .'",
        "'. $_POST['fecha'] .'",
        "'. $_POST['mora'] .'",
        "'. $_POST['monto_atrasado'] .'",
        "'. $_POST['pago_atrasado'] .'",
        "'. $_POST['saldo_actual'] .'",
        "'. $_POST['monto'] .'"
        )';

$statement = $conexion->prepare($sql);

$statement->execute();

            

            //insertar bitacora
            $sql = 'INSERT INTO bitacora(
                oficina,
                responsable,
                descripcion
                ) VALUES(
                    "'. $_SESSION['nombre_sede'] .'",
                    "'. $_SESSION['nombre'] .'",
                    "se registro un nuevo pago del cliente: '. $_POST['id_cliente'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();

header("Location: ../vistas/dash3.php");


?>
