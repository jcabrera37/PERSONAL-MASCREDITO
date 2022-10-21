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


$sql = 'SELECT c.*, n.nombre, n.direccion, n.trial_telefono_4, n.trial_tiempo_laborando_5 FROM cliente AS c
        INNER JOIN negocio AS n ON c.id_cliente = n.id_cliente
        WHERE c.id_cliente ='. $_GET['cliente'];
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch();

$sql = 'SELECT dp.* FROM desembolso AS d
        INNER JOIN detalle_prestamo AS dp ON d.trial_id_detalle_desembolso_3 = dp.id_detalle_prestamo
        WHERE d.id_cliente ='. $_GET['cliente'];
$resultado = $conexion->query($sql);
$prestamo = $resultado->fetch();

echo $prestamo['monto_solicitado'];

ob_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center><h1>LIBRE DE PROTESTO</h1></center>
<p align="justify">
Yo,   <b><?php echo $cliente['primer_nombre'] . " " . $cliente['trial_segundo_nombre_3'] . " " . $cliente['trial_primer_apellido_4'] . " " . $cliente['segundo_apellido'] ?></b>,   
(<b><?php echo $cliente['edad'] ?></b>)   años de edad, de nacionalidad 
Guatemalteco, <b><?php echo $cliente['estado_civil'] ?></b> y de Profesión <b><?php echo $cliente['profesion_oficio'] ?></b>, de este domicilio, <b><?php echo $cliente['trial_domicilio_14'] ?></b>, me identifico 
con el documento personal de Identificación, código único de identificación (CUI) número, <b><?php echo $cliente['dpi'] ?></b>,   
Extendido por el Registro Nacional de las Personas de la República de Guatemala, (En adelante “el 
deudor”), por el presente PAGARÉ  libre de protesto promete incondicionalmente pagar a: MAS CREDITO,  
(en adelante “el acreedor”), la suma en quetzales que a continuación se detalla,  Q <b><?php echo $_GET['monto'] ?></b>,   Monto total que incluye capital e interés, por comisión 
de cobranza y gastos administrativos, del cual me reconozco Liso y llano DEUDOR, y declaro que 
entiendo y acepto las condiciones, plazo y forma de pago, como la penalización que a continuación 
se detalla.

FORMA DE PAGO: EL monto anteriormente indicado se pagará de la siguiente forma: a.) Mediante  <b><?php echo $_GET['cuotas'] ?></b>  
cuotas cada una por un valor de <b><?php echo $_GET['cuota'] ?></b>  mismas que serán cobradas seis días a la semana (de lunes a 
sábado) respectivamente, quedando como fecha de pago de la primera cuota el siguiente día hábil; 
b.) El valor de cada cuota corresponde a abonos de capital e intereses devengados según lo 
establecido; c.) Se hace de su conocimiento que el incumplimiento en el pago de la cuota estará 
siendo penalizado con una multa de Q.20.00 por día de atraso.

<br><br>

OTRAS ESTIPULACIONES: Como deudor (a) acepto y reconozco: a.) el acreedor puede dar por vencido 
el plazo de este pagaré y cobrar ejecutivamente el saldo adeudado cuando el deudor (a) deje de 
pagar una de las amortizaciones a que está obligado (a); b.) Pagar todos los impuestos y gastos 
directos e indirectos que ocasione este título de crédito, incluyendo los cobros judiciales, 
extrajudiciales y honorarios de Abogados si fuere necesario; c.) El acreedor podrá dar por vencido 
el plazo de este título y exigir ejecutivamente el pago total del saldo adeudado si reinciden en 
el incumplimiento de cada una de las cuotas y su respectiva penalización anteriormente establecidas;
 d.) Que este título es cedible o negociable, mediante simple endoso, sin necesidad de previa o 
 posterior notificación; e.) Acepto desde ya como buenas y exactas las cuentas que el acreedor forme 
 acerca de este título y como liquidó el saldo que me exija, que los gastos que origine este título 
 por mi cuenta y que en caso de acción judicial en los remates sirva de base a discreción del 
 acreedor, si se trata de muebles, la primera postura que se presente, el monto del crédito o el 
 avalúo de los bienes cualquier depositario o interventor que el acreedor designe no estará obligado 
 prestar garantía alguna y el acreedor designe no estará obligado prestar garantía alguna y el 
 acreedor no será responsable de su actuación; f.) Renunció al fuero de mi domicilio y me sujeto a 
 los tribunales que el acreedor elija señalando como lugar para recibir cualquier citación,   
 RETALHULEU, la prueba de la comunicación o notificación, obligando a comunicar de inmediato 
 cualquier cambio de la misma, la prueba de la comunicación corre a mi cargo aceptando para el 
 cargo de no dar este aviso como válido como cualquier notificación que se me haga cargo en la 
 dirección siguiente.</p>
 
 <br><br>

 <center>(f.)__________________________________</center>
 
 <br> <br>

 <center>
 En el municipio y departamento de Mazatenango, el día  (Fecha en que estamos en números y letras 
 por ejemplo la fecha  siguiente) <b><?php echo date('d-m-Y h:i:s a', time()) ?></b>, como notario, DOY FE: que la 
 firma que antecede y que calza el PAGARE, es, AUTENTICA, por haber sido puesta en mi presencia el 
 día de hoy,  por el señor (a),  <b><?php echo $cliente['primer_nombre'] . " " . $cliente['trial_segundo_nombre_3'] . " " . $cliente['trial_primer_apellido_4'] . " " . $cliente['segundo_apellido'] ?></b>, Quien identificada con documento  de personal de 
 identificación con código único de Identificación <b><?php echo $cliente['dpi'] ?></b>,   extendiendo por el registro nacional de
las personas de la república de Guatemala.  Leo lo escrito al signatario (a), quien enterado de su 
contenido, objeto, validez y demás efectos legales lo ratifica, acepta y firma nuevamente haciéndolo
a continuación el notario autorizante.

<br><br><br><br><br><br><br><br>
ANTE MI: <br><br><br><br><br><br><br>
f.) __________________________________<br>
		<br>
			<br>
</center>
</body>
</html>

<?php 

$html = ob_get_clean();

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => false));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("pagare.pdf", array("attachment" => true));

?>