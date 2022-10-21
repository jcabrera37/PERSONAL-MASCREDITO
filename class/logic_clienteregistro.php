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
$sql = 'SELECT id_cliente FROM cliente ORDER BY id_cliente desc limit 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();
$id = null; 

if(isset($user['id_cliente'])){
    $id = $user['id_cliente'];
}else{
    $id = 1;
}



$sql = 'INSERT INTO cliente(
    id_cliente, 
    primer_nombre,
    trial_segundo_nombre_3,
    trial_primer_apellido_4,
    segundo_apellido,
    dpi,
    estado_civil,
    profesion_oficio,
    genero,
    trial_fecha_nacimiento_10,
    trial_telefono_11,
    departamento,
    municipio,
    trial_domicilio_14,
    nis,
    propiedad, 
    estado,
    edad,
    observaciones
    ) VALUES(
        "'. $id+1 .'", 
        "'. $_POST['primer_nombre'] .'",
        "'. $_POST['trial_segundo_nombre_3'] .'",
        "'. $_POST['trial_primer_apellido_4'] .'",
        "'. $_POST['segundo_apellido'] .'",
        "'. $_POST['dpi'] .'",
        "'. $_POST['estado_civil'] .'",
        "'. $_POST['profesion_oficio'] .'",
        "'. $_POST['genero'] .'",
        "'. $_POST['trial_fecha_nacimiento_10'] .'",
        "'. $_POST['trial_telefono_11'] .'",
        "'. $_POST['departamento'] .'",
        "'. $_POST['municipio'] .'",
        "'. $_POST['trial_domicilio_14'] .'",
        "'. $_POST['nis'] .'",
        "'. $_POST['propiedad'] .'",
        "creado",
        "'. $_POST['edad'] .'",
        "'. $_POST['observaciones'] .'"
        )';

        $id_cliente = $id+1;

$statement = $conexion->prepare($sql);

$statement->execute();

// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_referencia_cliente FROM referencias_clientes ORDER BY id_referencia_cliente desc limit 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();
$id = null;
if(isset($user['id_referencia_cliente'])){
    $id = $user['id_referencia_cliente'];
}else{
    $id = 0;
}

$sql = 'INSERT INTO referencias_clientes(
    id_referencia_cliente, 
    nombre,
    trial_parentesco_3,
    trial_direccion_4,
    trial_observaciones_5,
    id_cliente,
    telefono
    ) VALUES(
        "'. $id+1 .'", 
        "'. $_POST['nombre_cliente'] .'",
        "'. $_POST['trial_parentesco_1'] .'",
        "'. $_POST['trial_direccion_1'] .'",
        "'. $_POST['observaciones'] .'",
        "'. $id_cliente .'",
        "'. $_POST['telefono_1'] .'"
        )';

        $statement = $conexion->prepare($sql);

$statement->execute();

$sql = 'INSERT INTO referencias_clientes(
    id_referencia_cliente, 
    nombre,
    trial_parentesco_3,
    trial_direccion_4,
    trial_observaciones_5,
    id_cliente,
    telefono
    ) VALUES(
        "'. $id+2 .'", 
        "'. $_POST['nombre_cliente_2'] .'",
        "'. $_POST['trial_parentesco_2'] .'",
        "'. $_POST['trial_direccion_2'] .'",
        "'. $_POST['observaciones'] .'",
        "'. $id_cliente .'",
        "'. $_POST['telefono_2'] .'"
        )';   
        
        $statement = $conexion->prepare($sql);

$statement->execute();

$sql = 'INSERT INTO referencias_clientes(
    id_referencia_cliente, 
    nombre,
    trial_parentesco_3,
    trial_direccion_4,
    trial_observaciones_5,
    id_cliente,
    telefono
    ) VALUES(
        "'. $id+3 .'", 
        "'. $_POST['nombre_cliente_3'] .'",
        "'. $_POST['trial_parentesco_3'] .'",
        "'. $_POST['trial_direccion_3'] .'",
        "'. $_POST['observaciones'] .'",
        "'. $id_cliente .'",
        "'. $_POST['telefono_3'] .'"
        )';        

$statement = $conexion->prepare($sql);

$statement->execute();

// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_negocio FROM negocio ORDER BY id_negocio desc limit 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();
$id = null;
if(isset($user['id_negocio'])){
    $id = $user['id_negocio'];
}else{
    $id = 0;
}

$sql = 'INSERT INTO negocio(
    id_negocio, 
    nombre,
    direccion,
    trial_telefono_4,
    trial_tiempo_laborando_5,
    id_cliente
    ) VALUES(
        "'. $id+1 .'", 
        "'. $_POST['nombre_negocio'] .'",
        "'. $_POST['direccion'] .'",
        "'. $_POST['trial_telefono_4'] .'",
        "'. $_POST['trial_tiempo_laborando_5'] .'",
        "'. $id_cliente .'"
        )';        

$statement = $conexion->prepare($sql);

$statement->execute();


// OBTENER EL CORRELATIVO 
$sql = 'SELECT id_detalle_cliente_empleado FROM detalle_cliente_empleado ORDER BY id_detalle_cliente_empleado desc limit 1';
$resultado = $conexion->query($sql);
$sede = $resultado->fetch();

$id_detalle = null;

if(isset($sede['id_detalle_cliente_empleado'])){
    $id_detalle = $sede['id_detalle_cliente_empleado'] + 1;
}else{
    $id_detalle = 1;
}

//insertar 
$sql = 'INSERT INTO detalle_cliente_empleado(
    id_detalle_cliente_empleado,
    id_cliente,
    id_empleado
    ) VALUES(
        "'. $id_detalle .'",
        "'. $id_cliente .'",
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
        "Cración del clinete con codigo: '. $id_cliente .'"
        )';

$statement = $conexion->prepare($sql);
$statement->execute();





header("Location: ../vistas/dash3.php");

?>