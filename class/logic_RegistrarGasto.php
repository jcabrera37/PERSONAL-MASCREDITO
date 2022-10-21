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


$sql = 'INSERT INTO gasto(
    nombre, 
    tipo,
    fecha,
    cantidad,
    rubro,
    observaciones,
    id_empleado
    ) VALUES(
        "'. $_POST['nombre'] .'",
        "'. $_POST['tipo'] .'",
        "'. $_POST['fecha'] .'",
        "'. $_POST['cantidad'] .'",
        "'. $_POST['rubro'] .'",
        "'. $_POST['observaciones'] .'",
        "'. $_SESSION['id_empleado'] .'"
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
                    "se registro un nuevo gasto: '. $_POST['nombre'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();

header("Location: ../vistas/dash3.php");

?>