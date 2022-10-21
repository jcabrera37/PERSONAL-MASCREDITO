<?php
    session_start();
    $_SESSION['id_usuario'] = "";
    $_SESSION['id_empleado'] = "";
    $_SESSION['nombre'] = "";
    $_SESSION['tipo'] = "";
    session_destroy();
    header("Location: ../login.php");
    
?>