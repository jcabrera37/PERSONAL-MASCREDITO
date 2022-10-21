<?php require('dashboard.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/nclientes.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>

<div >
<div class="tncli"><h1>Nuevo Cliente</h1><h5>Formulario para nuevo expediente</h5></label>
</div>
  

<form action="" method="post" class="form">


<div >
    <h2>Datos Personales</h2                                                                                                                                                                                                                                                                >

<div class="field">
    <label for="name" class="l1">Primer nombre</label>
   
    <input type="text" id="name" placeholder="Ingrese el primer nombre del cliente" class="nclp">

    </div>

    <div class="field">
    <label for="name" class="l2">Segundo nombre</label>
    <input type="text" id="name2" placeholder="Ingrese el segundo nombre del cliente" class="ncl2">
</div>

<div class="field">
    <label for="name" class="apellido">Primer Apellido</label>
    <input type="text" id="name" placeholder="Ingrese el primer apellido del cliente" class="apc1" maxlength ="100" >

</div>

<div class="field">
    <label for="name" class="apellido2">Segundo Apellido</label>
    <input type="text" id="name" placeholder="Ingrese el segundo apellido del cliente" class="apc1">    

</div>

<div class="field">
    <label for="" class="dpi" placeholder="">DPI</label>
    
 
    <input type="number" name="dpi" id="dpi" placeholder="Número de DPI">


<label for="" class="dpi" placeholder="">Extendido en</label>
    
    <input type="text" name="extensión" id="extensión" placeholder="Extendido en...">
</div>

<div class="field">
    <label for="" class="dpi" placeholder="">Estado Civil</label>
    <select name="estado_civil" id="">
    
    <option value="1">Soltero(a)</option>
    <option value="2">Casado(a)</option>
    <option value="3">Viudo(a)</option>

    </select>
</div>

<div  class="field">
    <label for="" class="profesión" placeholder="Profesión u oficio">Profesión u oficio</label>
  
   <input type="text" name="profesion" id="profesion" placeholder="Profesión u oficio">
</div>



<div class="genero">
   <label for="" class="genero" placeholder="">Genero</label>

 
   <input type="radio" name="sexo" id=""  value="1" required autocomplete>Masculino
   <input type="radio" name="sexo" id=""  value="2" required autocomplete> Femenino
</div>


<div  class="field">
    <label for="" class="fechan">Fecha de nacimiento</label>

<input type="date" name="fecha_nacimiento" id="fecha_nacimiento">

</div>
<div class="field">
    <label for="" class="telefono">Número Telefónico</label>

<input type="tel" name="telefono" id="" placeholder="numero telefonico">

</div>

<div class="field">
    <label for="" class="fechan">Departamento - Municipio</label>

    <select name="departamento" id="depto">

    <option value="">Alta Verapaz</option>
    <option value="">Baja Verapaz</option>
    <option value="">Chimaltenago</option>
    <option value="">Chiquimula</option>
    <option value="">Guatemala</option>
    <option value="">El Progreso</option>
    <option value="">Escuintla</option>
    <option value="">Huehuetenango</option>
    <option value="">Izabal</option>
    <option value="">Jalapa</option>
    <option value="">Jutiapa</option>
    <option value="">Petén</option>
    <option value="">Quetzaltenango</option>
    <option value="">Quiché</option>
    <option value="">Retalhuleu</option>
    <option value="">Sacatepequez</option>
    <option value="">San Marcos</option>
    <option value="">Santa Rosa</option>
    <option value="">Sololá</option>
    <option value="">Suchitepequez</option>
    <option value="">Totonicapán</option>
    <option value="">Zacapa</option>
    

    </select>
    <select name="municipio" id="municipio">

<option value="">Cobán</option>
<option value="">Santa Cruz Verapaz</option>
<option value="">San Cristobal Verapaz</option>
<option value="">Tactíc</option>
<option value="">Tamahú</option>
<option value="">San Miguel Tucurú</option>
<option value="">Panzos</option>
<option value="">Senahú</option>
<option value="">San Pedro Carchá</option>
<option value="">San Juan Chamelco</option>
<option value="">Lanquín</option>
<option value="">Santa María Cahabón</option>
<option value="">Chisec</option>
<option value="">Chahal</option>
<option value="">Fray Bartolomé de las Casas</option>
<option value="">Santa Catarina La Tinta</option>
<option value="">Salamá</option>
<option value="">San Miguel Chicaj</option>
<option value="">Rabinal</option>
<option value="">Cubulco</option>
<option value="">Granados</option>
<option value="">Santa Cruz El Chol</option>
<option value="">San Jerónimo</option>
<option value="">Purulhá</option>


</select>



<select name="aldea" id="">

<option value="">seleccione un dato</option>
</select>
</div>

<div class="vivienda">
<label for="" class="vivienda" placeholder="">Vive en:</label>
   <input type="radio" name="vivienda" id=""  value="1" required autocomplete >Casa Propia
   <input type="radio" name="vivienda" id=""  value="2" required autocomplete> Alquiler
   </div>
<div class="field">
<label for="" class="NIS:"> NIS</label>
<input type="text" name="nis" id="nis" placeholder ="NIS">
</div>

</div>


<br>
<br>
<br>
<br>

<div>


<h2 class="">Datos del negocio</h2>


<div class="field">

    <label for=""class="nombrene">Nombre del negocio</label>
    <input type="text" name="nombrene" id="" placeholder="Empresa o lugar de trabajo">
</div>


<div class="field">
    <label for="" class="direccion">Dirección del negocio</label>
    <input type="text" name="telefonotrabajo" id="" placeholder="Dirección o ubicación del trabajo">
</div>

    <div class="field">
        <label for=""class="telneg">Teléfono del negocio</label>
        <input type="text" name="telneg" id="" placeholder="Teléfono del trabajo o negocio">

</div>

<div class="field">
        <label for="" class="direccion">Tiempo de laborar en el negocio</label>
        <input type="text" name="tiempola" id="" placeholder="Meses o años de laborar en la empresa o negocio">
    </div>


    <div class="textbox">
        <label for="" class="observaciones">Observaciones</label>
        <textarea name="observaciones" id="" cols="30" rows="10" placeholder="Desea agregar algún comentario u observación del cliente?(Opcional)"></textarea>
</div>
</div>

<div>

<div >
        <h4>Referencias Personales</h4>
</div>
        <div class="field">
        <label for="" class="nombrere">Nombre</label>
        <input type="text" name="nombrereferencia" id="">
        </div>


        <div class="field">
        <label for="" class="parentesco">Parentesco</label>
        <input type="text" name="parentesco" id="">
        </div>

        <div class="field">
        <label for="" class="direccionref">Dirección</label>
        <input type="text" name="parentesco" id="">
        </div>
        

        <div class="field">
        <label for="" class="Telref">Teléfono</label>
        <input type="tel" name="telref" id="">
</div>

        <br/>
        <br/>
        <div class="field">
        <label for="" class="nombrere">Nombre</label>
        <input type="text" name="nombrereferencia" id="">
</div>

<div class="field">
        <label for="" class="parentesco">Parentesco</label>
        <input type="text" name="parentesco" id="">

        </div>

        <div class="field">
        <label for="" class="direccionref">Dirección</label>
        <input type="text" name="parentesco" id="">

        </div>

        <div class="field">
        <label for="" class="Telref">Teléfono</label>
        <input type="tel" name="telref" id="">
        </div>


        <br/>
        <br/>
        <div class="field">
        <label for="" class="nombrere">Nombre</label>
        <input type="text" name="nombrereferencia" id="">
</div>
        <div class="field">
        <label for="" class="parentesco">Parentesco</label>
        <input type="text" name="parentesco" id="">
        </div>

        <div class="field">
        <label for="" class="direccionref">Dirección</label>
        <input type="text" name="parentesco" id="">
        </div>
        <div class="field">
        <label for="" class="Telref">Teléfono</label>
        <input type="tel" name="telref" id="">
        </div>


</div>

<div>
<input type="submit" value="Registrar cliente" class="enviar">


</div>
</div>
</form>




</body>
</html>