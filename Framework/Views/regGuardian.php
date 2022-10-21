<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Guardian</title>
    <link href="../styles/regGuardian.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    </head>
  <body>
        <div class="contenedora-registro">
        <h2>Registro</h2>
        
        <form action="<?php echo FRONT_ROOT ?>Guardianes/RegisterUser" method="post">
                <div class="contenedora-form">
                <div class="datoregistro">
                        <label for="usuario"></label>
                        <input type="text" placeholder="Nombre Usuario" name="username" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="nombre"></label>
                        <input type="text" placeholder="Nombre" name="nombre" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="apellido"></label>
                        <input type="text" placeholder="Apellido" name="apellido" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="dni"></label>
                        <input type="text" placeholder="DNI" name="dni" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="mail"></label>
                        <input type="email" placeholder="Correo Electronico" name="mail" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="telefono"></label>
                        <input type="text" placeholder="Telefono celular(sin guiones)" name="telefono" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="direccion"></label>
                        <input type="text" placeholder="Direccion" name="direccion" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="pass"></label>
                        <input type="password" placeholder="Contraseña" name="password" class="" required><br>
                </div>
                <div class="datoregistro">
                        <label for="re-pass"></label>
                        <input type="password" placeholder="Repetir Contraseña" name="rePassword" class="" required><br>
                </div>

                <div>
                        <button type="submit" class="">Siguiente</button>   
                </div>
                </div>
        </form>


</div>
        
</body>
</html>