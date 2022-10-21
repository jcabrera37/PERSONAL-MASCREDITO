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


$sql = 'SELECT * FROM bitacora 
    WHERE responsable = "' . $palabra . '"
    AND fecha_hora >= "' . $inicio . '" 
    AND fecha_hora <= "' . $fin . '"';
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
    <link href="../styles/bitacora.css" rel="stylesheet" type="text/css">
    <title>Bitacora de sistema</title>
</head>
<body>
    


<div class="container">
    <header>Bitacora de sistema</header>

    <form action="Bitacora.php" method="post">
        <div class="primer-form">
                 

                <div class="datos personales">
                    <span class="tittle">Búsqueda por fecha y usuario</span>
                    <div class="fields">
                    <div class="input-fields">
                   <label for="">Usuario</label>
            <input type="search" name="palabra" value="<?php echo $palabra ?>" placeholder="Buscar por nombre de usuario">
        </div>
        
        <div class="input-fields">
            <label for="">Fecha inicio</label>
            <input type="date" name="inicio" id="" value="<?php echo $inicio ?>">        
        </div>
        <div class="input-fields">
        <label for="">Fecha Finalización</label>
            <input type="date" name="fin" id="" value="<?php echo $fin ?>">
        </div>
        <div class="input-fields">

<button class="uBtn" type="submit">Buscar </button>
</div>

                   

        </div>
</form>
        
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
            <th>ID </th>
            <th>Oficina </th>
            <th>Responsable  </th>
            <th>Descripción </th>
            <th>Fecha y hora </th>
           
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>

        <td data-label="Oficina"><?php echo $row['id_bitacora'] ?></td>
        <td data-label="Responsable"><?php echo $row['oficina'] ?></td>
        <td data-label="Responsable"><?php echo $row['responsable'] ?></td>
        <td data-label="Fecha y hora"><?php echo $row['descripcion'] ?></td>
        <td data-label="Fecha y hora"><?php echo $row['fecha_hora'] ?></td>

       
        </tr>
       <?php } ?>
        </tbody>
</table>
</div>
    
</div>
</div>

    </form>


</div>
</body>
</html>