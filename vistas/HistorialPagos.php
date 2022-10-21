<?php require('dashboard.php');

// CONEXION A LA BASE DE DATOS
$conexion = null;
try {
    $conexion = new PDO('mysql:host=localhost;dbname=mc', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
$palabra = null;
$inicio = null;
$fin = null;
if(!isset($_POST['palabra'])){
    $palabra = "";
    $inicio = "";
    $fin = "";
}else{
    $palabra = $_POST['palabra'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    
}
$sql = 'SELECT * FROM empleado AS e
INNER JOIN pagos_historial ph ON ph.id_empleado = e.trial_id_empleado_1
INNER JOIN cliente AS c ON ph.id_cliente = c.id_cliente
WHERE e.nombre = "' . $palabra . '"
AND ph.fecha >= "' . $inicio . '" 
AND ph.fecha <= "' . $fin . '"
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
    <link href="../styles/historialPagos.css" rel="stylesheet" type="text/css">
    <title>Historial Pagos</title>
</head>
<body>
    


<div class="container">
    <header>Historial de Pagos</header>

    <form action="HistorialPagos.php" method="post">
        <div class="primer form">
                 

                <div class="datos personales">
                    <span class="tittle">Busqueda por nombre & fecha</span>
                    <div class="fields">
                 
        <div class="input-fields">
            <input type="search" value="<?php echo $palabra ?>" name="palabra" placeholder="Buscar Nombre Asesor">
        </div>   
            
        <div class="input-fields">
            <input type="date" name="inicio" placeholder="" value="<?php echo $inicio ?>">
        </div>
        <div class="input-fields">
            <input type="date" name="fin" placeholder="" value="<?php echo $fin ?>">
        </div>
        <div class="input-fields1">
                    <button class="uBtn2" type="submit">Buscar</button> </div>

                    </div>
<!-- </form> -->
                    
                    <div class="datos personales">


                

                
<div class="fields">
<div class="input-fields">
        <label for="">Datos Encontrados</label>


    </div>
</div>
    <div class="outer-wrapper">
                        <div class="table-wrapper">
        <table class= "table">
        <thead>

        <tr>
            <th>Asesor</th>
            <th>Cliente</th>
            <th>Fecha De Pago</th>
            <th>Monto</th>
            <th>Mora</th>
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>

        <tr>

        <td data-label="Asesor"><?php echo $row['nombre'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
        <td data-label="Fecha"><?php echo $row['fecha'] ?></td>
        
        <td data-label="Monto"><?php echo $row['monto'] ?></td>
        <td data-label="Mora"><?php echo $row['mora'] ?></td>
        </br>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_historialPagos.php?empleado=" . $palabra . "&inicio=" . $inicio . "&fin=" . $fin ?>">imprimir </a>


</div>

</div>
  

        </div>
  
    
        
</div>
</div>






    </form>


</div>









</body>
</html>