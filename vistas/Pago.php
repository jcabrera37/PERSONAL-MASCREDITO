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

$sql = 'SELECT * FROM cliente WHERE dpi = "' . $palabra . '" OR primer_nombre = "' . $palabra . '" LIMIT 1';
$resultado = $conexion->query($sql);
$user = $resultado->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/Bclientes.css" rel="stylesheet" type="text/css">
</head>
<body>




 


   

      
<div class="container">
    <header>Nuevo Pago</header>

    <form action="Pago.php" method="POST">
        <div class="primer-form">
        <div class="input-fields2">
            <input type="search" name="palabra" placeholder="Buscar por nombre o dpi">
           
        </div>
        <div class="input-fields">
            
        <button class="uBtn" type="submit">Buscar </button>
        </div>
</form>       
        <form action="../class/logic_pago.php" method="post">
        <div class="datos-personales">
                    <span class="tittle">Cliente Encontrado</span>
                
                <div class="fields">
                    <div class="input-fields2">
                        <label for="">Cliente</label>
                        <input type="text" name="" id="" value="<?php 
                        if(isset($user['primer_nombre'])){ 
                            echo $user['primer_nombre'] . " " . $user['trial_segundo_nombre_3'] . " " . $user['trial_primer_apellido_4'] . " " . $user['segundo_apellido'];
                        }?>">
                         <input type="hidden" name="id_cliente" id="" value="<?php 
                         if(isset($user['primer_nombre'])){ 
                            echo $user['id_cliente'];
                        }?>">


                    </div>
                    
</div>             
</div>
        


            

                <div class="datos-personales">
                    <span class="tittle">Datos financieros</span>
                
                <div class="fields">

                <div class="input-fields3">
                        <label for="">Numero de Cuota  </label>
                        <input type="text" name="numero_cuota" id="" placeholder="Ingrese el monto solicitado">


                    </div>

                    <div class="input-fields3">
                        <label for="">Numero de Prestamo</label>
                        <input type="text" name="id_solicitud" id="" placeholder="Ingrese el monto solicitado">


                    </div>

                <div class="input-fields3">
                        <label for="">Fecha de pago  </label>
                        <input type="date" name="fecha" id="" >


                    </div>
                      
                <div class="input-fields3">
                        <label for="">Mora  </label>
                        <input type="text" name="mora" id="" placeholder="Ingrese el monto solicitado">


                    </div>

                    <div class="input-fields3">
                        <label for="">Monto atrasado  </label>
                        <input type="text" name="monto_atrasado" id="" placeholder="Ingrese el monto solicitado">


                    </div>

                    <div class="input-fields3">
                        <label for="">Pago atrasado  </label>
                        <input type="text" name="pago_atrasado" id="" placeholder="Ingrese el monto solicitado">


                    </div>


                    <div class="input-fields3">
                        <label for="">Saldo Actual  </label>
                        <input type="text" name="saldo_actual" id="" placeholder="Ingrese el monto solicitado">


                    </div>
            
            
                    <div class="input-fields3">
                        <label for="">Monto  </label>
                        <input type="text" name="monto" id="" placeholder="Ingrese el monto solicitado">


                    </div>
                    <div class="input-fields3">
                        <input type="checkbox" id="cbox2" value="second_checkbox" name="ultimoPago"> 
                        <label for="cbox2">clic para ultimo pago</label>
                    </div>

                                 <div class="input-fields">
            
        <button class="uBtn2" type="submit">Registrar Pago </button>
        </div>


                   

        </div>
    </form>


</div>



</body>
</html>