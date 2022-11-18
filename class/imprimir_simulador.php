<?php 

ini_set('display_errors', 1);
error_reporting(-1);

$cuotas = null;
$nombre = null;
$direccion = null;
$telefono = null;
$interes = null; 
$monto = null; 
$montoI = null;
$fecha_actual = date("d-m-Y"); 

if(isset($_GET['nombre']) ){
    if($_GET['cuotas'] != "1"){
        $monto = floatval($_GET['monto']);
        $cuotas = floatval($_GET['cuotas']);

        if($_GET['cuotas'] <= 14){
            $interes = 0.10;
        }
        if($_GET['cuotas'] == 15){
            $interes = 0.20;
        }else if($_GET['cuotas'] == 21){
            $interes = 0.26;
        }else if($_GET['cuotas'] == 26){
            $interes = 0.30;
        }else if($_GET['cuotas'] == 36){
            $interes = 0.44;
        }else {
            $interes = 0.50;
        }
    


        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $telefono = $_GET['telefono'];
        $montoI = $monto + ($monto * $interes);
        $cuota = $montoI / $cuotas;
    }
}else{
    $cuotas = 0;
    $nombre = "";
    $direccion = "";
    $telefono = "";
    $interes = ""; 
    $monto = ""; 
    $montoI = 0;
}

ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
</head>
<body>
    

<center><h4>Simulador de pagos</h4>
<p>Nombre: <?php echo $_GET['nombre'] ?> <br>
<p>Dirección: <?php echo $_GET['direccion'] ?> <br>
<p>Telefono: <?php echo $_GET['telefono'] ?> <br>
<p>Monto: <?php echo $_GET['monto'] ?> <br>
<p>Cuotas: <?php echo $_GET['cuotas'] ?> <br>
<p>interes: <?php echo ($_GET['interes']*100) . "%" ?> <br>
<table class="table" border="1">
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
                                <td data-label="Interés"><?php echo "-"?></td>
                                <td data-label="Saldo total"><?php echo "Q " . round($montoI,2) ?></td>
                            </tr>
                            <?php for($i = 1; $i<=$cuotas; $i++){  $montoI-=$cuota; ?>
                            <tr>
                                <td data-label="Nombre"><?php echo $i ?></td>
                                <td data-label="Cuotas"><?php echo date("d-m-Y",strtotime($fecha_actual."+ ". $i ." days"));  ?></td>
                                <td data-label="Interés"><?php echo "Q " . round($cuota,2) ?></td>
                                <td data-label="Saldo total"><?php echo "Q " .round($montoI,2) ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>


        </body>
        </html>

        <?php 

        $html = ob_get_clean();

        require_once '../libreria/dompdf/autoload.inc.php';
        use Dompdf\Dompdf;
        $dompdf = new Dompdf();

        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('letter', "landscape");

        $dompdf->render();
        $dompdf->stream("HistorialPagos.pdf", array("attachment" => true));

        ?>