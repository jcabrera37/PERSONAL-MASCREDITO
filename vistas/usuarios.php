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

    $consulta = "DELETE FROM empleado WHERE trial_id_empleado_1='". $_GET['empleado'] . "'";
    $res = $conexion->prepare($consulta);
    $res->execute();

    $consulta = "DELETE FROM usuario WHERE id_usuario='". $_GET['borrar'] . "'";
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
                        "se elimino al usuario: '. $_GET['borrar'] .'"
                        )';
            
                $statement = $conexion->prepare($sql);
                $statement->execute();


}

$sql = 'SELECT * FROM usuario AS u
        INNER JOIN empleado AS e ON u.id_empleado = e.trial_id_empleado_1
        WHERE nombre LIKE "%' . $palabra . '%"';
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
    <link href="../styles/fdepago.css" rel="stylesheet" type="text/css">
    <title>Usuarios</title>
</head>
<body>
    


<div class="container">
    <header>Buscar Usuarios</header>

    <form action="usuarios.php" method="POST">
        <div class="primer-form">
                <div class="datos personales">
                    <span class="tittle">Ingresar datos</span>
                    <div class="fields">
                    <div class="input-fields">
            <input type="search" name="palabra" placeholder="Escribir nombre del usuario">
        </div>
        
        
                    
                    <div class="input-fields">

            <button class="uBtn" type="submit">Buscar </button>
            </div>

              
            <div class="input-fields">

<button class="uBtn" type="submit">Todos los usuarios </button>
</div>

                    </div>

                   

        </div>

        </form>      
<div class="datos personales">


                

                
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
            <th>Nombre de usuario o Email</th>
            <th>Tipo de usuario</th>
            <th>Sede</th>
            <th>password</th>
           
            <th> </th>
        </tr>
        </thead>

        <tbody>
            <?php foreach($user as $row){ ?>
        <tr>

        <td data-label="Nombre"><?php echo $row['nombre'] ?></td>
        <td data-label="email"><?php echo $row['usuario'] ?></td>
        <td data-label="tipo"><?php echo $row['tipo_usuario'] ?></td>
        <td data-label="sede"><?php echo $row['sede'] ?></td>
        <td data-label="pass"><?php echo $row['contrasena'] ?></td>
        
        <td data-label="eliminar">            
            <a href="<?php echo 'usuarios.php?borrar=' . $row['id_usuario'] . '&empleado=' . $row['id_empleado'] ?>" class="uBtn2">Eliminar </a>
        </td>
        </tr>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="uBtn2" href="<?php echo "../class/imprimir_usuarios.php?palabra=" . $palabra ?>">imprimir </a>


</div>

</div>




</div>










</body>
</html>