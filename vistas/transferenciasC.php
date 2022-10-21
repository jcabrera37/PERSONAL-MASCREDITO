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

$origen = null;
$clientes = null;
if(!isset($_POST['origen'])){
    $origen = "";
    $clientes = "";
}else{
    $origen = $_POST['origen'];
    $sql = 'SELECT c.id_cliente, c.primer_nombre, c.trial_primer_apellido_4	 FROM cliente AS c
            INNER JOIN detalle_cliente_empleado AS dc ON c.id_cliente = dc.id_cliente
            WHERE dc.id_empleado = '. $origen;
    $resultado = $conexion->query($sql);
    $clientes = $resultado->fetchAll();
}

if(isset($_GET['actualizar'])){
    $fecha_actual = date("Y-m-d"); 

$consulta = 'UPDATE desembolso
    SET estado = "realizado",
    fecha = now(),
    fecha_fin = "' . date("Y-m-d",strtotime($fecha_actual." + ". $_GET['cuotas'] ." days")) . '"
    WHERE id_desembolso = ' . $_GET['actualizar'];

    $res = $conexion->prepare($consulta);
    $res->execute();
   

    $consulta = 'UPDATE solicitud
    SET estado = "activo"
    WHERE trial_id_solicitud_1 = ' . $_GET['solicitud'];

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
                    "se desembolso el registro con id: '. $_GET['actualizar'] .'"
                    )';
        
            $statement = $conexion->prepare($sql);
            $statement->execute();

}


$sql = 'SELECT e.trial_id_empleado_1, e.nombre, e.apellido FROM usuario AS u
        INNER JOIN empleado AS e ON u.id_empleado = e.trial_id_empleado_1';
$resultado = $conexion->query($sql);
$user = $resultado->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/tfcarteras.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../images/img.ico"> 
    <title>Transferencia de Carteras</title>
</head>
<body>
<div class="container">
    <header>Transferencia de Carteras</header>

        <div class="primer-form">
                <div class="datos personales">
                   <!-- <span class="tittle">Seleccione usuario origen y usuario destino</span> -->
                    <div class="fields">
                        <form action="transferenciasC.php" method="POST">
                            <div class="input-fields">
                            <label for="">Usuario Origen</label>
                            <select name="origen" id="">
                                <?php foreach($user as $row){ ?>
                                <option value="<?php echo $row['trial_id_empleado_1'] ?>"><?php echo $row['nombre'] . ' ' . $row['apellido'] ?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <button class="uBtn2" type="submit">buscar cliente</button>

                      </form> 

                    <form action="../class/logic_transferencia.php" method="POST">
                    <div class="input-fields">
                            <label for="">Cliente a Transferir</label>
                            <select name="clienteTrans" id="">
                                <?php foreach($clientes as $row){ ?>
                                <option value="<?php echo $row['id_cliente'] ?>"><?php echo $row['primer_nombre'] . ' ' . $row['trial_primer_apellido_4'] ?></option>
                                <?php } ?>
                            </select>
                            </div>


                    <div class="input-fields">
                            <label for="">Usuario Destino</label>
                            <select name="destino" id="">
                                <?php foreach($user as $row){ ?>
                                <option value="<?php echo $row['trial_id_empleado_1'] ?>"><?php echo $row['nombre'] . ' ' . $row['apellido'] ?></option>
                                <?php } ?>
                            </select>
                            </div>

                   
                    <div class="input-fields1">
                    <button class="uBtn2" type="submit">Transferir</button>
                    <div class="input-fields2">
                    
                    <label for="">Debe seleccionar un usuario origen,los clientes a transferir y luego seleccionar al usuario destino.</label>
</div>

                    </div>

                   

                    </div>


  
    







    </form>


</div>








</body>
</html>