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

    $consulta = "DELETE FROM cliente WHERE id_cliente='". $_GET['borrar'] . "'";
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
        "Borro cliente con codigo: '. $_GET['borrar'] .'"
        )';

$statement = $conexion->prepare($sql);
$statement->execute();


}

$sql = 'SELECT c.*, n.nombre, n.direccion, n.trial_telefono_4, n.trial_tiempo_laborando_5 FROM cliente AS c
        INNER JOIN negocio AS n ON c.id_cliente = n.id_cliente
        WHERE primer_nombre LIKE "%' . $palabra . '%"';
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
    <link href="../styles/BuscarClientes.css" rel="stylesheet" type="text/css">
    <title>Buscar Clientes</title>
</head>
<body>
    


<div class="container">
    <header>Busqueda de clientes</header>

    <form action="BuscarClientes.php" method="POST">
        <div class="primer-form">
            <div class="datos personales">
                <span class="tittle">Ingrese el nombre del cliente</span>
                <div class="fields">
                    <div class="input-fields1">
                        <input type="search" placeholder="Nombre del cliente" id="palabra" name="palabra">
                    </div>
                    <div class="input-fields">
                        <button class="uBtn" type="submit">Buscar </button>
                    </div>
                    <div class="input-fields">
                        <button class="uBtn" type="submit">Todos los clientes </button>
                    </div>
                </div>
            </div>
        </div>
 <!--   </form>  -->
        
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
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dpi</th>
            <th>Estado Civil</th>
            <th>Género</th>
            <th>Profesión u oficio</th>
            <th>Fecha de nacimiento</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Nombre del negocio</th>
            <th>Dirección del negocio</th>
            <th>Teléfono del negocio</th>
            <th>Tiempo de laborar</th>
            <th>referencia 1</th>
            <th>Parentesco ref 1</th>
            <th>Teléfono ref 1</th>
            <th>Dirección ref 1</th>
            <th>referencia 2</th>
            <th>Parentesco ref 2</th>
            <th>Teléfono ref 2</th>
            <th>Dirección ref 2</th>
            <th>referencia 3</th>
            <th>Parentesco ref 3</th>
            <th>Teléfono ref 3</th>
            <th>Dirección ref 3</th>
            <th>Observaciones</th>
            <th> </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($user as $row) { ?>
        <tr>

        <td data-label="Nombres"><?php echo $row['primer_nombre'] . " " . $row['trial_segundo_nombre_3'] ?></td>
        <td data-label="Apellidos"><?php echo $row['trial_primer_apellido_4'] . " " . $row['segundo_apellido'] ?></td>
        <td data-label="Dpi"><?php echo $row['dpi'] ?></td>
        <td data-label="Estado Civil"><?php echo $row['estado_civil'] ?></td>
        
        <td data-label="Género"><?php echo $row['genero'] ?></td>
        <td data-label="Profesión u oficio"><?php echo $row['profesion_oficio'] ?></td>
        <td data-label="Fecha Nacimiento"><?php echo $row['trial_fecha_nacimiento_10'] ?></td>
        <td data-label="Teléfono"><?php echo $row['trial_telefono_11'] ?></td>
        <td data-label="Dirección"><?php echo $row['trial_domicilio_14'] ?></td>
        <td data-label="NombreNeg"><?php echo $row['nombre'] ?></td>
        <td data-label="DirecciónNeg"><?php echo $row['direccion'] ?></td>
        <td data-label="TeléfonoNeg"><?php echo $row['trial_telefono_4'] ?></td>  
        <td data-label="TiempoLaboral"><?php echo $row['trial_tiempo_laborando_5'] ?></td>

        <?php 

                $consulta = "SELECT * FROM referencias_clientes WHERE id_cliente='". $row['id_cliente'] . "'";
                $res = $conexion->prepare($consulta);
                $res->execute();
                $referencias = $res->fetchAll();

                foreach($referencias as $ref){

        ?>


        <td data-label="NombreRef"><?php echo $ref['nombre'] ?></td>
        <td data-label="ParentescoRef"><?php echo $ref['trial_parentesco_3'] ?></td>
        <td data-label="TeléfonoRef"><?php echo $ref['telefono'] ?></td>
        <td data-label="DirecciónRef"><?php echo $ref['trial_direccion_4'] ?></td>
        
        <?php } ?>
        <td data-label="Observaciones"><?php echo $row['observaciones'] ?></td>

        <td data-label="Revisar">            
            <a href="<?php echo 'BuscarClientes.php?borrar=' . $row['id_cliente'] ?>" class="uBtn2">Eliminar </a>
        </td>
        <?php } ?>
        </tbody>
</table>
  
    
</div>
</div>


<div class="botones">  
<a class="btn-1" href="<?php echo "../class/imprimir_BuscarClientes.php?cliente=" . $palabra ?>">imprimir </a>

</div>



    </form>


</div>










</body>
</html>