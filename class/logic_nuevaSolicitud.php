<?php

ob_start();

session_start();

if(!isset($_SESSION['id_usuario'])){
  header("Location: ../login.php");
}


ini_set('display_errors', 1);
error_reporting(-1);

$fecha_actual = date("Y-m-d"); 

// CONEXION A LA BASE DE DATOS
$conexion = null;
try {
    $conexion = new PDO('mysql:host=localhost;dbname=mc', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$tipo = $_POST['estado'];

echo $tipo;

if($tipo == "nuevo"){


    // OBTENER EL CORRELATIVO 
    $sql = 'SELECT trial_id_solicitud_1 FROM solicitud ORDER BY trial_id_solicitud_1 desc limit 1';
    $resultado = $conexion->query($sql);
    $user = $resultado->fetch();

    $id_solicitud = null;

    if(isset($user['trial_id_solicitud_1'])){
        $id_solicitud = $user['trial_id_solicitud_1'] + 1;
    }else{
        $id_solicitud = 1;
    }

    // insertar solicitud
    $sql = 'INSERT INTO solicitud(
        trial_id_solicitud_1,
        estado,
        sede
        ) VALUES(
            "'. $id_solicitud .'",
            "pendiente",
            "' . $_SESSION['nombre_sede'] . '"
            )';

    $statement = $conexion->prepare($sql);
    $statement->execute();




    // OBTENER EL CORRELATIVO 
    $sql = 'SELECT id_detalle_solicitud FROM detalle_solicitud ORDER BY id_detalle_solicitud desc limit 1';
    $resultado = $conexion->query($sql);
    $user = $resultado->fetch();
    $id_detalle_solicitud = null;

    if(isset($user['id_detalle_solicitud'])){
        $id_detalle_solicitud = $user['id_detalle_solicitud'] + 1;
    }else{
        $id_detalle_solicitud = 1;
    }

    //insertar detalle de la solicitud
    $sql = 'INSERT INTO detalle_solicitud(
        id_detalle_solicitud,
        trial_id_solicitud_2,
        id_cliente,
        fecha_inicio,
        fecha_fin,
        id_empleado,
        observaciones
        ) VALUES(
            "'. $id_detalle_solicitud .'",
            "'. $id_solicitud .'",
            "'. $_POST['cliente_id'] .'",
            "'. $fecha_actual .'",
            "' . date("Y-m-d",strtotime($fecha_actual."+ ". $_POST['plan_cuotas'] ." days")) . '",
            "'. $_SESSION['id_empleado'] .'",
            "'. $_POST['observaciones'] .'"
            )';

    $statement = $conexion->prepare($sql);
    $statement->execute();






    // OBTENER EL CORRELATIVO 
    $sql = 'SELECT id_detalle_prestamo
    FROM detalle_prestamo ORDER BY id_detalle_prestamo desc limit 1';
    $resultado = $conexion->query($sql);
    $user = $resultado->fetch();
    $id_detalle_prestamo = null;
    if(isset($user['id_detalle_prestamo'])){
        $id_detalle_prestamo = $user['id_detalle_prestamo'] + 1;
    }else{
        $id_detalle_prestamo = 1;
    }
    $sql = 'INSERT INTO detalle_prestamo(
        id_detalle_prestamo,
        monto_solicitado,
        cuotas,
        trial_fecha_4,
        estado,
        id_cliente,
        id_solicitud
        ) VALUES(
            "'. $id_detalle_prestamo .'",
            "'. $_POST['monto_solicitado'] .'",
            "'. $_POST['plan_cuotas'] .'",
            now(),
            "creado",
            "'. $_POST['cliente_id'] .'",
            "'. $id_solicitud .'"
            )';

    $statement = $conexion->prepare($sql);
    $statement->execute();






    // OBTENER EL CORRELATIVO 
    $sql = 'SELECT trial_id_interes_1 FROM interes ORDER BY trial_id_interes_1 desc limit 1';
    $resultado = $conexion->query($sql);
    $user = $resultado->fetch();
    $id_interes = null;

    if(isset($user['trial_id_interes_1'])){
        $id_interes = $user['trial_id_interes_1'] + 1;
    }else{
        $id_interes = 1;
    }

    $cantidad = floatval($_POST['interes']) * (floatval($_POST['monto_solicitado'])/100);
    echo $cantidad;
    $sql = 'INSERT INTO interes(
        trial_id_interes_1,
        trial_id_detalle_prestamo_2,
        cantidad,
        trial_fecha_4,
        porcentaje
        ) VALUES(
            "'. $id_interes .'",
            "'. $id_detalle_prestamo .'",
            "'. $cantidad .'",
            now(),
            "'. $_POST['interes'] .'"
            )';

    $statement = $conexion->prepare($sql);
    $statement->execute();







    $cantidad = ((floatval($_POST['interes'])/100) * (floatval($_POST['monto_solicitado']))) + floatval($_POST['monto_solicitado']);
    $cuota = $cantidad / $_POST['plan_cuotas'];

    for($i = 1; $i<= $_POST['plan_cuotas']; $i++){

        $sql = 'INSERT INTO cuotas(
            trial_id_interes_2,
            trial_fecha_3,
            detalle, 
            cantidad,
            estado,
            id_solicitud,
            numero_cuota
            ) VALUES(
                "'. $id_interes .'",
                "' . date("Y-m-d",strtotime($fecha_actual."+ ". $i ." days")) . '",
                "'. $cuota .'",
                "'. $cantidad .'",
                "creado",
                "'. $id_solicitud .'",
                "'. $i .'"
                )';

        $statement = $conexion->prepare($sql);
        $statement->execute();

    }






    // OBTENER EL CORRELATIVO 
    $sql = 'SELECT id_desembolso FROM desembolso ORDER BY id_desembolso desc limit 1';
    $resultado = $conexion->query($sql);
    $sede = $resultado->fetch();

    $id_detalle = null;

    if(isset($sede['id_desembolso'])){
        $id_detalle = $sede['id_desembolso'] + 1;
    }else{
        $id_detalle = 1;
    }

    //insertar 
    $sql = 'INSERT INTO desembolso(
        id_desembolso,
        id_cliente,
        trial_id_detalle_desembolso_3,
        estado, 
        fecha_fin
        ) VALUES(
            "'. $id_detalle .'",
            "'. $_POST['cliente_id'] .'",
            "'. $id_detalle_prestamo .'",
            "pendiente",
            "' . date("Y-m-d",strtotime($fecha_actual."+ ". $_POST['plan_cuotas'] ." days")) . '"
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
                    "Creo nueva solicitud para el usuario: '. $_POST['cliente_id'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();

    header("Location: ../class/imprimir_solicitud.php?solicitud=" . $id_solicitud . "&cliente=" . $_POST['cliente_id'] . "&monto=" . $_POST['monto_solicitado']. "&cuota=" . $cuota . "&cuotas=" . $_POST['plan_cuotas'] );
    

}else if($tipo == "lnegra"){
    
    echo "estamos en lista negra";

    $consulta = 'UPDATE cliente
                SET estado = "lnegra"
                WHERE id_cliente = ' . $_POST['cliente_id'];

    $sql = $conexion->prepare($consulta);
    $sql->execute();

        //insertar bitacora
    $sql = 'INSERT INTO bitacora(
        oficina,
        responsable,
        descripcion
        ) VALUES(
            "'. $_SESSION['nombre_sede'] .'",
            "'. $_SESSION['nombre'] .'",
            "mando a lista negra cliente con codigo: '. $_POST['cliente_id'] .'"
            )';

    $statement = $conexion->prepare($sql);
    $statement->execute();
    header("Location: ../vistas/dash3.php");

}else if($tipo == "inactivo") {
    echo "estamos en inactivo";

    $consulta = 'UPDATE cliente
                SET estado = "inactivo", usuario = "' . $_SESSION['nombre'] . '" 
                WHERE id_cliente = ' . $_POST['cliente_id'];

    $sql = $conexion->prepare($consulta);
    $sql->execute();

            //insertar bitacora
            $sql = 'INSERT INTO bitacora(
                oficina,
                responsable,
                descripcion
                ) VALUES(
                    "'. $_SESSION['nombre_sede'] .'",
                    "'. $_SESSION['nombre'] .'",
                    "se coloco en inactivo al usuario: '. $_POST['cliente_id'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();
            header("Location: ../vistas/dash3.php");


}else if($tipo == "activo") {
    echo "estamos en activo";

    $consulta = 'UPDATE cliente
                SET estado = "activo", usuario = "' . $_SESSION['nombre'] . '" 
                WHERE id_cliente = ' . $_POST['cliente_id'];

    $sql = $conexion->prepare($consulta);
    $sql->execute();



            //insertar bitacora
            $sql = 'INSERT INTO bitacora(
                oficina,
                responsable,
                descripcion
                ) VALUES(
                    "'. $_SESSION['nombre_sede'] .'",
                    "'. $_SESSION['nombre'] .'",
                    "se coloco en activo al cliente: '. $_POST['cliente_id'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();
header("Location: ../vistas/dash3.php");

}



?>