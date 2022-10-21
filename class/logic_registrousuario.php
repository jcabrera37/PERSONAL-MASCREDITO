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
$sql = 'SELECT trial_id_empleado_1 FROM empleado ORDER BY trial_id_empleado_1 desc limit 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();

$id_empleado = null;

if(isset($user['trial_id_empleado_1'])){
    $id_empleado = $user['trial_id_empleado_1'] + 1;
}else{
    $id_empleado = 1;
}

// insertar solicitud
$sql = 'INSERT INTO empleado(
    trial_id_empleado_1,
    nombre,
    apellido,
    cargo,
    telefono,
    dpi,
    fecha_nacimiento,
    sexo, 
    trial_estado_civil_9
    ) VALUES(
        "'. $id_empleado .'",
        "'. $_POST['nombre'] .'",
        "'. $_POST['apellido'] .'",
        "'. $_POST['cargo'] .'",
        "'. $_POST['telefono'] .'",
        "'. $_POST['dpi'] .'",
        "'. $_POST['fecha_nacimiento'] .'",
        "'. $_POST['sexo'] .'",
        "'. $_POST['estado_civil'] .'"
        )';

$statement = $conexion->prepare($sql);
$statement->execute();



// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_usuario FROM usuario ORDER BY id_usuario desc limit 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();

$id_usuario = null;

if(isset($user['id_usuario'])){
    $id_usuario = $user['id_usuario'] + 1;
}else{
    $id_usuario = 1;
}

// insertar solicitud
$sql = 'INSERT INTO usuario(
    id_usuario,
    usuario,
    contrasena,
    fecha_creacion,
    id_empleado,
    tipo_usuario,
    sede
    ) VALUES(
        "'. $id_usuario .'",
        "'. $_POST['usuario'] .'",
        "'. $_POST['password'] .'",
        now(),
        "'. $id_empleado .'",
        "'. $_POST['tipo_usuario'] .'",
        "'. $_POST['sede'] .'"
        )';

$statement = $conexion->prepare($sql);
$statement->execute();


// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_detalle_usuario_sede FROM detalle_usuario_sede ORDER BY id_detalle_usuario_sede desc limit 1';
$resultado = $conexion->query($sql);
$sede = $resultado->fetch();

$id_detalle = null;

if(isset($sede['id_detalle_usuario_sede'])){
    $id_detalle = $sede['id_detalle_usuario_sede'] + 1;
}else{
    $id_detalle = 1;
}

// insertar solicitud
$sql = 'INSERT INTO detalle_usuario_sede(
    id_detalle_usuario_sede,
    id_sede,
    id_usuario
    ) VALUES(
        "'. $id_detalle .'",
        "'. $_POST['sede'] .'",
        "'. $id_usuario .'"
        )';

$statement = $conexion->prepare($sql);
$statement->execute();


// OBTENER EL CORRELATIVO 
$sql = 'SELECT trial_id_setalle_sede_empleado_1 FROM id_detalle_sede_empleado ORDER BY trial_id_setalle_sede_empleado_1 desc limit 1';
$resultado = $conexion->query($sql);
$sede = $resultado->fetch();

$id_detalle = null;

if(isset($sede['trial_id_setalle_sede_empleado_1'])){
    $id_detalle = $sede['trial_id_setalle_sede_empleado_1'] + 1;
}else{
    $id_detalle = 1;
}

// insertar solicitud
$sql = 'INSERT INTO id_detalle_sede_empleado(
    trial_id_setalle_sede_empleado_1,
    id_sede,
    id_empleado
    ) VALUES(
        "'. $id_detalle .'",
        "'. $_POST['sede'] .'",
        "'. $id_empleado .'"
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
                    "se creo el usuario: '. $_POST['usuario'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();


header("Location: ../vistas/dash3.php");



?>