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

$sql = 'SELECT * FROM cliente 
        WHERE estado = "inactivo"
        AND primer_nombre LIKE "%' . $palabra . '%"
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
    <link href="../styles/inactivos.css" rel="stylesheet" type="text/css">
    <title>Inactivos</title>
</head>
<body>
    


<div class="container">
    <header>Inactivos</header>

    <form action="inactivos.php" method="POST">
        <div class="primer-form">
                 

                <div class="datos personales">
                    <span class="tittle"></span>
                    <div class="fields">
                    <div class="input-fields1">
            <input type="search" name="palabra" placeholder="Nombre del cliente" value="<?php echo $palabra ?>">
        </div>
                    <div class="input-fields">

            <button class="uBtn" type="submit">Buscar </button>
            </div>

                    </div>
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
            <th>Codigo</th>
            <th>Cliente</th>
            <!-- <th>Gestor</th>
            <th>Desembolso</th>
            <th>Interés</th>
            <th>Fecha Desembolso</th>
            <th>Fecha Vencimiento</th> -->
            <th>Estado</th>
            <th>Operador</th>
            
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>

        <td data-label="codigo"><?php echo $row['id_cliente'] ?></td>
        <td data-label="Cliente"><?php echo $row['primer_nombre'] . " " . $row['trial_primer_apellido_4'] ?></td>
        <!-- <td data-label="Gestor"><?php echo $row['id_cliente'] ?></td>
        <td data-label="Desembolso">-</td>
        <td data-label="Interes">-</td>
        <td data-label="Fecha Desembolso">-</td>
        <td data-label="Fecha Vencimiento">-</td> -->
        <td data-label="Estado"><?php echo $row['estado'] ?></td>
        <td data-label="Operador"><?php echo $row['usuario'] ?></td>

        
        </tr>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_inactivos.php?palabra=" . $palabra ?>">imprimir </a>

</div>



    </form>


</div>










</body>
</html>