
<?php require('dashboard.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/cr.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../images/img.ico"> 
   

    <title>Registro Clientes</title>
    <header>
 
    </header> 
</head>

<body>




<div class="container">
    <header>Nuevo Cliente</header>

    <form action="../class/logic_clienteregistro.php" method="POST">
        <div class="primer-form">
                <div class="datos personales">
                    <span class="tittle">Datos Personales</span>
                
                <div class="fields">
                    <div class="input-fields">
                        <label for="">Primer Nombre</label>
                        <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Ingrese su primer nombre" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Segundo Nombre</label>
                        <input type="text" name="trial_segundo_nombre_3" id="trial_segundo_nombre_3" placeholder="Ingrese su segundo nombre" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Primer Apellido</label>
                        <input type="text" name="trial_primer_apellido_4" id="trial_primer_apellido_4" placeholder="Ingrese su primer apellido" required>


                    </div>

                    <div class="input-fields">
                        <label for="">Segundo Apellido</label>
                        <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Ingrese su segundo apellido" required>


                    </div>

                    <div class="input-fields">
                        <label for="">DPI</label>
                        <input type="text" name="dpi" id="dpi" placeholder="Número de DPI" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Lugar de Extendido</label>
                        <input type="text" name="" id="" placeholder="Extendido en" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Estado Civil</label>
                        <select name="estado_civil" id="estado_civil">

                        <option value="1">Seleccione </option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="Viudo">Viudo</option>
                        <option value="soltera">Soltera</option>
                        <option value="casada">Casada</option>
                        <option value="Viuda">Viuda</option>

                        </select>

                    </div>


                    <div class="input-fields">
                        <label for="">Profesión u oficio</label>
                        <input type="text" name="profesion_oficio" id="profesion_oficio" placeholder="Profesión u oficio" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Edad</label>
                        <input type="text" name="edad" id="edad" placeholder="Edad" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Género</label>
                        <select name="genero" id="genero">

                        <option value="1">Seleccione un genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        

                        </select>
                    </div>
                    <div class="input-fields">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="trial_fecha_nacimiento_10" id="trial_fecha_nacimiento_10"  required>


                    </div>

                    <div class="input-fields">
                        <label for="">Número Telefónico</label>
                        <input type="number" name="trial_telefono_11" id="trial_telefono_11" placeholder="Número Telefónico" required>


                    </div>

                    <div class="input-fields">
                        <label for="">Departamento</label>
                        <input type="text" name="departamento" id="departamento" placeholder="Departamento" required>


                    </div>

                    <div class="input-fields">
                        <label for="">Municipio</label>
                        <input type="text" name="municipio" id="municipio" placeholder="Municipio" required>


                    </div>
                    
                    <div class="input-fields">
                        <label for="">Barrio,aldea,colonia, etc.</label>
                        <input type="text" name="trial_domicilio_14" id="trial_domicilio_14" placeholder="Barrio,aldea,colonia, etc." required>


                    </div>

                    <div class="input-fields">
                        <label for="">NIS</label>
                        <input type="text" name="nis" id="nis" placeholder="Domicilio" required>


                    </div>

                    <div class="input-fields">
                        <label for="">Vive en:</label>
                        <select name="propiedad" id="propiedad">
                        <option value="1">Seleccione un tipo de vivienda</option>
                        <option value="1">Casa Propia</option>
                        <option value="2">Alquiler</option>
                        
                                                
                        </select>

                        
                </div>
                </div>
                </div>
                


                <div class="datos personales">
                    <span class="tittle">Datos del negocio</span>
                
                <div class="fields">
                    <div class="input-fields">
                        <label for="">Nombre del negocio</label>
                        <input type="text" name="nombre_negocio" id="nombre_negocio" placeholder="Empresa o lugar de trabajo" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Direccion del negocio</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Dirección ubicación del trabajo" required>


                    </div>
                    <div class="input-fields">
                        <label for="">Teléfono del trabajo o negocio</label>
                        <input type="text" name="trial_telefono_4" id="trial_telefono_4" placeholder="Tiempo de laborar en el negocio" required>


                    </div>

                    <div class="input-fields">
                        <label for="">Tiempo de laborar en el negocio</label>
                        <input type="text" name="trial_tiempo_laborando_5" id="trial_tiempo_laborando_5" placeholder="Meses o años de trabajar en la empresa o negocio" required>


                    </div>
</div>


               
</div>
            

                <div class="datos personales">
                    <span class="tittle">Referencias Personales</span>
                
                <div class="fields">
                    <div class="input-fields2">
                        <label for="">Nombre </label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Ingrese el nombre" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Parentesco</label>
                        <input type="text" name="trial_parentesco_1" id="trial_parentesco_1" placeholder="Que parentesco tiene" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Dirección</label>
                        <input type="text" name="trial_direccion_1" id="trial_direccion_1" placeholder="Ingrese la dirección" required>


                    </div>

                    <div class="input-fields2">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_1" id="" placeholder="Teléfono" required>


                    </div>




                    <div class="input-fields2">
                        <label for="">Nombre </label>
                        <input type="text" name="nombre_cliente_2" id="nombre_cliente_2" placeholder="Ingrese el nombre" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Parentesco</label>
                        <input type="text" name="trial_parentesco_2" id="trial_parentesco_2" placeholder="Que parentesco tiene" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Dirección</label>
                        <input type="text" name="trial_direccion_2" id="trial_direccion_2" placeholder="Ingrese la dirección" required>


                    </div>

                    <div class="input-fields2">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_2" id="" placeholder="Teléfono" required>


                    </div>





                    <div class="input-fields2">
                        <label for="">Nombre </label>
                        <input type="text" name="nombre_cliente_3" id="nombre_cliente_3" placeholder="Ingrese el nombre" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Parentesco</label>
                        <input type="text" name="trial_parentesco_3" id="trial_parentesco_3" placeholder="Que parentesco tiene" required>


                    </div>
                    <div class="input-fields2">
                        <label for="">Dirección</label>
                        <input type="text" name="trial_direccion_3" id="trial_direccion_3" placeholder="Ingrese la dirección" required>


                    </div>

                    <div class="input-fields2">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_3" id="" placeholder="Teléfono" required>


                    </div>
                    </div>
                    </div>



                    <div class="datos personales">
                    <span class="tittle">Observaciones</span>
                
                    <div class="fields">
                    <div class="input-fields">
                    
                    <label for="" class="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" cols="30" rows="10" placeholder="Desea agregar algún comentario u observación del cliente?(Opcional)"></textarea>
                     </div>
                    </div>

                    <button class="uBtn" type="submit"><span class="btnText">Registrar Usuario</span>
</button>
                    

                    </div>


                   

        </div>
    </form>


</div>


</body>
</html>