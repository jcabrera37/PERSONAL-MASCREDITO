<?php require('dashboard.php');

ini_set('display_errors', 1);
error_reporting(-1);

$cuotas = null;
$nombre = null;
$direccion = null;
$telefono = null;
$interes = 0; 
$monto = null; 
$montoI = null;
$fecha_actual = date("d-m-Y"); 


if(isset($_POST['nombre']) ){
    if($_POST['cuotas'] != "1"){
        $monto = floatval($_POST['monto']);
        $cuotas = floatval($_POST['cuotas']);

        $interes = 0;

        if($_POST['cuotas'] < 15){
            $interes = 0.10;
        }
        else if($_POST['cuotas'] == 15){
            $interes = 0.20;
        }else if($_POST['cuotas'] == 21){
            $interes = 0.26;
        }else if($_POST['cuotas'] == 26){
            $interes = 0.30;
        }else if($_POST['cuotas'] == 36){
            $interes = 0.44;
        }else {
            $interes = 0.50;
        }


        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $montoI = $monto + ($monto * $interes);
        $cuota = $montoI / $cuotas;
    }
}else{
    $cuotas = 0;
    $nombre = "";
    $direccion = "";
    $telefono = "";
    $interes = 0; 
    $monto = ""; 
    $montoI = 0;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/img.ico"> 
    <link href="../styles/simulador.css" rel="stylesheet" type="text/css">
    <title>Simulador Pagos</title>
</head>
<body>
    


<div class="container">
    <header>Simulador de Pagos</header>

    <form action="simulador.php" method="post">
        <div class="primer-form">
            <div class="datos personales">
                <span class="tittle">Datos a ingresar</span>
                <div class="fields">
                    <div class="input-fields">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $nombre ?>" id="name" placeholder="Nombre del cliente" required>
                    </div>
                    <div class="input-fields">
                        <label for="">Direcci??n</label>
                        <input type="text" name="direccion" value="<?php echo $direccion ?>" placeholder="Direcci??n" required>
                    </div>
                    <div class="input-fields">
                        <label for="">Tel??fono</label>
                        <input type="number" name="telefono" value="<?php echo $telefono ?>" placeholder="Tel??fono" required> 
                    </div>
                    <div class="input-fields">
                        <label for="">Monto</label>
                        <input type="text" name="monto" value="<?php echo $monto ?>" placeholder="Monto" required>
                    </div>
        
                    <div class="input-fields">
                        <label for="">Cuotas(plan)</label>
                        <input type="text" name="cuotas"  placeholder="Cuotas (D??as)" > 
                    </div>
                </div>
            </div>
        </div>

        <div class="datos-personales">
           
            <div class="input-fields2">
                <button class="uBtn4" type="submit">Calcular</button>
            </div>
            <div class="input-fields2">
            <a class="uBtn4" href="<?php echo "../class/imprimir_simulador.php?nombre=" . $nombre . "&direccion=" . $direccion . "&telefono=" . $telefono . "&cuotas=" . $cuotas . "&interes=" . $interes . "&monto=" . $monto ?>">imprimir </a>
            </div>
        </div>
    
        <div class="datos-personales">
            <div class="fields">
                <div class="input-fields">
                    <label for="">Simulaci??n de pagos</label>
                </div>
            </div>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cuota #</th>
                                <th>Fecha</th>
                                <th>Cuota (Q)</th>
                                <th>Saldo total Q </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Nombre"><?php echo 0 ?></td>
                                <td data-label="Cuotas"><?php echo "-" ?></td>
                                <td data-label="Inter??s"><?php echo "-"?></td>
                                <td data-label="Saldo total"><?php echo "Q " . round($montoI,2) ?></td>
                            </tr>
                            <?php for($i = 1; $i<=$cuotas; $i++){  $montoI-=$cuota; ?>
                            <tr>
                                <td data-label="Nombre"><?php echo $i ?></td>
                                <td data-label="Cuotas"><?php echo date("d-m-Y",strtotime($fecha_actual."+ ". $i ." days"));  ?></td>
                                <td data-label="Inter??s"><?php echo "Q " . round($cuota,2) ?></td>
                                <td data-label="Saldo total"><?php echo "Q " .round($montoI,2) ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </form>
</div>

</body>
</html>