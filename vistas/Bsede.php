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

if(isset($_GET['borrar'])){
    
    $consulta = "DELETE FROM sede WHERE trial_id_sede_1='". $_GET['borrar'] . "'";
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
                        "se elimino la sede: '. $_GET['borrar'] .'"
                        )';
            
                $statement = $conexion->prepare($sql);
                $statement->execute();

}


$sql = 'SELECT sede.trial_id_sede_1, sede.observaciones, dc.id_detalle_sede_capital, c.trial_id_capital_1, sede.nombre, sede.direccion, c.monto_inicial FROM sede 
        INNER JOIN detalle_sede_capital AS dc ON sede.trial_id_sede_1 = dc.id_sede
        INNER JOIN capital AS c ON dc.id_capital = c.trial_id_capital_1
        WHERE nombre LIKE "%' . $palabra. '%"';
$resultado = $conexion->query($sql);
$sedes = $resultado->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/fdepago.css" rel="stylesheet" type="text/css">
    <title>Sedes</title>
</head>
<body>
    


<div class="container">
    <header>Buscar Sede</header>

    <form action="Bsede.php" method="POST">
        <div class="primer-form">
            <div class="datos-personales">
                <span class="tittle">Ingresar datos</span>
                <div class="fields">
                    <div class="input-fields">
                        <input type="search" name="palabra" placeholder="Escribir nombre de la sede">
                    </div>
                    <div class="input-fields">
                        <button class="uBtn" type="submit">Buscar </button>
                    </div>
                </div>
            </div>
        </div>
 <!--   </form>  -->
        
<div class="datos-personales">


                

                
<div class="fields">
<div class="input-fields">
        <label for="">Datos Encontrados</label>


    </div>
</div>

<div class="outer-wrapper">
                        <div class="table-wrapper">
   
        <table>
        <thead>

        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Capital Disponible</th>
            <th>Observaciones</th>
           
            <th> </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($sedes as $row) { ?>
        <tr>

        <td data-label="Nombre"><?php echo $row['nombre'] ?></td>
        <td data-label="Departamento"><?php echo $row['direccion'] ?></td>
        <td data-label="Capital Disponible"><?php echo $row['monto_inicial'] ?></td>
        
        <td data-label="Observaciones"><?php echo $row['observaciones'] ?></td>
        
        <td data-label="Eliminar">            
            <a href="<?php echo 'Bsede.php?borrar=' . $row['trial_id_sede_1'] . '&id_sede_capital=' . $row['id_detalle_sede_capital'] . '&id_capital=' . $row['trial_id_capital_1'] ?>" class="uBtn2">Eliminar </a>
        </td>
        </tr>
       <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="uBtn2" href="<?php echo "../class/imprimir_sede.php?palabra=" . $palabra ?>">imprimir </a>


</div>

</div>

    </form>


</div>










</body>
</html>