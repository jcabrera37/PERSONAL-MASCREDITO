
<?php require('dashboard.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/cr.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../images/img.ico"> 
   

    <title>Registrar Gastos</title>
    <header>
 
    </header> 
</head>

<body>




<div class="container">
    <header>Nuevo Gasto</header>

    <form action="../class/logic_RegistrarGasto.php" method="POST">
        <div class="primer-form">
               
                


                <div class="datos personales">
                    <span class="tittle">Datos del gasto a registrar</span>
                
                <div class="fields">
                    <div class="input-fields">
                        <label for="">Nombre del gasto</label>
                        <input type="text" name="nombre" id="" placeholder="Nombre del gasto">


                    </div>
                    <div class="input-fields">
                        <label for="">Tipo de gasto</label>
                        <input type="text" name="tipo" id="" placeholder="Ingrese que tipo de gasto es">


                    </div>
                    <div class="input-fields">
                        <label for="">Fecha del gasto</label>
                        <input type="date" name="fecha" id="" >


                    </div>

                    <div class="input-fields">
                        <label for="">Catidad del gasto</label>
                        <input type="text" name="cantidad" id="" placeholder="Cantidad del gasto">


                    </div>
                    <div class="input-fields">
                        <label for="">Observación</label>
                        <input type="text" name="rubro" id="" placeholder="Tipo de rubro">


                    </div>
</div>


               
</div>
            



                    <div class="datos personales">

                    <button class="uBtn" type="submit"><span class="btnText">Registrar Gasto</span>
</button>
                    

                    </div>


                   

        </div>
    </form>


</div>


</body>
</html>