<?php 


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

    $sql = 'SELECT u.*, s.nombre FROM usuario AS u
            INNER JOIN sede AS s ON s.trial_id_sede_1 = u.sede
            WHERE u.usuario = "' . $_POST['email'] . '" 
            AND u.contrasena = "' . $_POST['password'] . '" 
            LIMIT 1';
    $resultado = $conexion->query($sql);
    $user = $resultado->fetch();

    if (isset($user['id_usuario'])) {
        session_start();
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['id_empleado'] = $user['id_empleado'];
        $_SESSION['nombre'] = $user['usuario'];
        $_SESSION['tipo'] = $user['tipo_usuario'];
        $_SESSION['nombre_sede'] = $user['nombre'];
        header("Location: ../vistas/dash3.php");
    }else{
        header("Location: ../login.php");
    }

?>