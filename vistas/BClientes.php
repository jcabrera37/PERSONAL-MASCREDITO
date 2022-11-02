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
if(!isset($_POST['palabra'])){
    $palabra = "";
}else{
    $palabra = $_POST['palabra'];
}

$sql = 'SELECT * FROM cliente WHERE dpi = "' . $palabra . '" OR id_cliente = "' . $palabra . '" LIMIT 1';
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
    <header>Nueva Solicitud</header>
    <div class="primer-form">
        <form action="BClientes.php" method="POST">
            <div class="input-fields2">
                <input type="search" name="palabra" placeholder="Buscar por DPI o código de cliente">
            </div>
            <div class="input-fields">
                <button class="uBtn" type="submit">Buscar </button>
            </div>
       
        <div class="datos personales">
            <span class="tittle">Cliente Encontrado</span>
            <div class="fields">
                <div class="input-fields2">
                    <label for="">Cliente</label>
                    <input type="text" name="" id="" value="<?php 
                    if(isset($user['primer_nombre'])){ 
                        echo $user['primer_nombre'] . " " . $user['trial_segundo_nombre_3'] . " " . $user['trial_primer_apellido_4'] . " " . $user['segundo_apellido'];
                    }?>">
                </div>
            </div>             
        </div>
        
        </form> 
               
    <form action="../class/logic_nuevaSolicitud.php" method="POST">
        <input type="hidden" name="cliente_id" value="<?php echo $user['id_cliente'] ?>">
        <div class="datos personales">
            <span class="tittle">Tipo de registro</span>    
            <div class="fieldsr">
                <div class="input-fieldsr">
                    <label for=""><input type="radio" name="estado" id="" value="nuevo">
                        <span> Nuevo</span> 
                    </label>
                </div>
                <div class="input-fieldsr">
                    <label for=""><input type="radio" name="estado" id="" value="activo"> <span>Activo</span> </label>
                </div>
                <div class="input-fieldsr">
                    <label for=""><input type="radio" name="estado" id="" value="lnegra"> <span>Lista negra</span> </label>
                </div>
                <div class="input-fieldsr">
                    <label for=""><input type="radio" name="estado" id="" value="inactivo"> <span>Inactivo</span> </label>
                </div>
            </div>
        </div>
                


<!--         <div class="datos personales">
            <span class="tittle">Asesor</span>
            <div class="fields">
                <div class="input-fields2">
                    <label for="">Gestor</label>
                    <input type="text" name="asesor" id="" placeholder="Seleccionar gestor">
                </div>    
            </div>             
        </div> -->
            

        <div class="datos personales">
            <span class="tittle">Datos financieros</span>
            <div class="fields">
                <div class="input-fields3">
                    <label for="">Monto Solicitado </label>
                    <input type="text" name="monto_solicitado" id="" placeholder="Ingrese el monto solicitado">
                </div>
                <div class="input-fields3">
                    <label for="">Plan(cuotas)</label>
                    <input type="text" name="plan_cuotas" id="" placeholder="15, 21, 26 días">
                    <!--  <select name="plan_cuotas" id="">
                        <option value="15">15 dias</option>
                        <option value="21">21 dias</option>
                        <option value="26">26 dias</option>
                        <option value="36">36 dias</option>
                    </select> -->
                </div>
            </div>
        </div>

        <div class="datos personales">
            <span class="tittle">Interés</span>
            <div class="fields">
            <div class="input-fields3">
                    <label for="">Interes</label>
                    <input type="text" name="interes" id="" placeholder="20%, 26% ...">
                    <!--  <select name="interes" id="">
                        <option value="20">20%</option>
                        <option value="26">26%</option>
                        <option value="30">30%</option>
                        <option value="44">44%</option>
                    </select> -->
                </div>
            </div>
        </div>

<!--
        <div class="datos personales">
            <span class="tittle">Datos financieros</span>
            <div class="fields">
                <div class="input-fields2">
                    <table class= "table">
                        <thead>
                            <tr>
                                <th>Descripción </th>
                                <th>Modelo</th>
                                <th>Serie</th>
                                <th>valor Q</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Descripcion">imagen </td>
                                <td data-label="Model">2</td>
                                <td data-label="Serie">3</td>
                                <td data-label="Valor">4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                -->
            <!--
            <div class="datos personales">
                <span class="tittle">Observaciones</span>
                <div class="fields">
                    <div class="input-fields">
                        <textarea name="observaciones" id="" cols="30" rows="10" placeholder="Desea agregar algún comentario u observación del cliente?(Opcional)"></textarea>
                    </div>
                </div>
            </div> 


                -->

            <div class="input-fields">
                <button class="uBtn2" type="submit">Registrar Solicitud </button>
            </div>
        </div>
    </div>
                      
</form>


</body>
</html>