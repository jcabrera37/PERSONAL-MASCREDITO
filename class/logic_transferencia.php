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

$consulta = 'UPDATE detalle_cliente_empleado
SET id_empleado = "' . $_POST['destino'] . '"
WHERE id_cliente = ' . $_POST['clienteTrans'];

$res = $conexion->prepare($consulta);
$res->execute();



            //insertar bitacora
            $sql = 'INSERT INTO bitacora(
                oficina,
                responsable,
                descripcion
                ) VALUES(
                    "'. $_SESSION['nombre_sede'] .'",
                    "'. $_SESSION['nombre'] .'",
                    "se transfirio al cliente: '. $_POST['usuario'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();


header("Location: ../vistas/dash3.php");



?>