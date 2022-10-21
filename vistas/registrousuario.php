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


$sql = 'SELECT * FROM sede';
$resultado = $conexion->query($sql);
$user = $resultado->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  
  <link rel="icon" href="../images/img.ico"> 
  <link href="../styles/Ru.css" rel="stylesheet" type="text/css">
  <title>Registro Usuarios</title>
 
</head>
<body>
  <div class="login"> 
    <div class="form-container">
   
      <h1 class="title">Registro Usuario</h1>

      <form action="../class/logic_registrousuario.php" method="POST" class="form">
        <div>
          <label for="name" class="label">Nombre</label>
          <input type="text" name="nombre" id="name" placeholder="Tú nombre" class="input input-name">

          <label for="name" class="label">Apellido</label>
          <input type="text" name="apellido" id="apellido" placeholder="Tú apellido" class="input input-name">

         

          <label for="email" class="label">Usuario</label>
          <input type="text" name="usuario" placeholder="Nombre que quiera en su usuario" class="input input-email">
          
          <label for="password" class="label">Password</label>
          <input type="password" name="password" placeholder="*********" class="input input-password">
          
          <label for="tipo_usuario" class="label">Tipo de usuario</label>
          <select name="tipo_usuario" id="tipo_usuario" class="input input-name">
            <option value="administrador">Administrador</option>
            <option value="supervisor">Supervisor</option>
            <option value="asesor">Asesor</option>
          </select>

          <label for="sede" class="label">Sede</label>
          <select name="sede" id="sede" class="input input-name">
              <?php foreach($user as $row){ ?>
                <option value="<?php echo $row['trial_id_sede_1'] ?>"> <?php echo $row['nombre'] ?> </option>
              <?php } ?>
            </select>

        </div>

        <input type="submit" value="Registrar" class="primary-button login-button">
      </form>
    </div>
  </div>
</body>
</html>