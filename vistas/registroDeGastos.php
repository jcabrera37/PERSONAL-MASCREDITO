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
    $consulta = "DELETE FROM gasto WHERE id_gasto='". $_GET['borrar'] . "'";
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
                        "se elimino el gasto: '. $_GET['borrar'] .'"
                        )';
            
                $statement = $conexion->prepare($sql);
                $statement->execute();
}

$sql = 'SELECT * FROM gasto
        WHERE nombre LIKE "%' . $palabra . '%"';
$resultado = $conexion->query($sql);
$gastos = $resultado->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/historialPagos.css" rel="stylesheet" type="text/css">
    <title>Registro Gastos</title>
</head>
<body>
    


<div class="container">
    <header>Gastos Registrados</header>

    <form action="registroDeGastos.php" method="POST">
        <div class="primer form">
                 

                <div class="datos personales">
                    <span class="tittle">Busqueda por nombre de gasto y fecha </span>
                    <div class="fields">
                 
        <div class="input-fields">
            <input type="search" name="palabra" placeholder="Buscar por nombre de gasto">
        </div>   
        
        <div class="input-fields1">
                    <button class="uBtn2" type="submit">Buscar </button>
                    </div>

                  
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
            <th>Nombre del gasto</th>
            <th>Tipo de gasto</th>
            <th>Fecha del gasto</th>
            <th>Cantidad del gasto</th>
            <th>Observación</th>
            
            <th></th>
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($gastos as $row) { ?>
            <tr>
                <td data-label="nombre"><?php echo $row['nombre'] ?></td>
                <td data-label="tipo"> <?php echo $row['tipo'] ?> </td>
                <td data-label="Fecha"><?php echo $row['fecha'] ?></td>
                <td data-label="cantidad"><?php echo $row['cantidad'] ?></td>
                <td data-label="rubro"><?php echo $row['rubro'] ?></td>
                <td>
                    <a href="<?php echo 'registroDeGastos.php?borrar=' . $row['id_gasto'] ?>" class="uBtn2">Eliminar </a>
                </td>
            <tr>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_registroDeGastos.php?palabra=" . $palabra ?>">imprimir </a>


</div>

</div>
  

        </div>
  
    
        
</div>
</div>


</div>









</body>
</html>