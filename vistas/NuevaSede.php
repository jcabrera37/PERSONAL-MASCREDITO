<?php require('dashboard.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/cr.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../images/img.ico"> 
   

    <title>Registrar Sede</title>
    <header>
 
    </header> 
</head>

<body>




<div class="container">
    <header>Nuevo Sede</header>

    <form action="../class/logic_NuevaSede.php" method="POST">
        <div class="primer-form">
                <div class="datos personales">
                    <span class="tittle">Datos Sede</span>
                
                <div class="fields">
                    <div class="input-fields">
                        <label for="">Nombre </label>
                        <input type="text" name="nombre" id="" placeholder="Nombre de la sede">


                    </div>
                    <div class="input-fields">
                        <label for="">Dirección</label>
                        <input type="text" name="direccion" id="" placeholder="Ingrese Direccion">


                    </div>

                    <div class="input-fields">
                        <label for="">Capital Disponible</label>
                        <input type="text" name="capital" id="" placeholder="Cuanto tendrá de capital disponible" >


                    </div>
                    <div class="input-fields">
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" id="" placeholder="Numero de telefono" >


                    </div>

                    
</div>


               
</div>
            



                    <div class="datos-  personales">
                    <span class="tittle">Observaciones</span>
                
                    <div class="fields">
                    <div class="input-fields">
                    
                    <label for="" class="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="" cols="30" rows="10" placeholder="Desea agregar algún comentario u observación del gasto"></textarea>
                     </div>
                    </div>

                    <button class="uBtn" submit><span class="btnText">Registrar Sede</span>
</button>
                    

                    </div>


                   

        </div>
    </form>


</div>


</body>
</html>