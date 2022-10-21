<?php

session_start();

if(!isset($_SESSION['id_usuario'])){
  header("Location: ../login.php");
}

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

// OBTENER EL CORRELATIVO 
$sql = 'SELECT trial_id_sede_1 FROM sede ORDER BY trial_id_sede_1 desc limit 1';
$resultado = $conexion->query($sql);
$id = $resultado->fetch();
$id_sede = $id['trial_id_sede_1'] +1;

$sql = 'INSERT INTO sede(
    trial_id_sede_1,
    nombre,
    direccion,
    trial_telefono_4,
    observaciones
    ) VALUES(
        "'. $id_sede .'",
        "'. $_POST['nombre'] .'",
        "'. $_POST['direccion'] .'",
        "'. $_POST['telefono'] .'",
        "'. $_POST['observaciones'] .'"
        )';

$statement = $conexion->prepare($sql);

$statement->execute();

// OBTENER EL CORRELATIVO 
$sql = 'SELECT trial_id_capital_1 FROM capital ORDER BY trial_id_capital_1 desc limit 1';
$resultado = $conexion->query($sql);
$capital = $resultado->fetch();

if(isset($capital['trial_id_capital_1'])){
    $id_capital = $capital['trial_id_capital_1'] + 1;
}else{
    $id_capital = 1;
}


$sql = 'INSERT INTO capital(
    trial_id_capital_1,
    monto_inicial,
    fecha
    ) VALUES(
        "'. $id_capital .'",
        "'. $_POST['capital'] .'",
        now()
        )';

$statement = $conexion->prepare($sql);

$statement->execute();


// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_detalle_sede_capital FROM detalle_sede_capital ORDER BY id_detalle_sede_capital desc limit 1';
$resultado = $conexion->query($sql);
$id = $resultado->fetch();
$id_detalle_capital = $id['id_detalle_sede_capital'] + 1;

$sql = 'INSERT INTO detalle_sede_capital(
    id_detalle_sede_capital,
    id_sede,
    id_capital
    ) VALUES(
        "'. $id_detalle_capital .'",
        "'. $id_sede .'",
        "'. $id_capital .'"
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
                    "se registro la sede: '. $_POST['nombre'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();

header("Location: ../vistas/dash3.php");

?>