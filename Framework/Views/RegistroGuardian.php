<!doctype html>
<html lang="es">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrar Guardian</title>
        <link href="../styles/regGuardian.css" rel="stylesheet">
        <link href="../styles/alert.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
        <div class="cabecera">
                <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/Eleccion" ?>'><img src="../assets/img/volver.png"></a></div>
        </div>

        <form action="<?php echo FRONT_ROOT ?>Guardianes/Registro" method="post" enctype="multipart/form-data">

                <div class="contenedora-form">

                        <p>Conviertase en un guardián &#128170</p>

                        <div class="datoregistro">
                                <input type="text" placeholder="Nombre Usuario" name="username" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="text" placeholder="Nombre" name="nombre" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="text" placeholder="Apellido" name="apellido" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="text" placeholder="Documento" name="dni" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="email" placeholder="Correo Electrónico"" name=" mail" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="text" placeholder="Teléfono (sin guiones)" name="telefono" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="text" placeholder="Dirección" name="direccion" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="password" placeholder="Contraseña" name="password" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <input type="password" placeholder="Repetir contraseña" name="rePassword" class="" required><br>
                        </div>
                        <div class="datoregistro">
                                <label for="fotoPerfil">Foto Perfil</label>
                                <input type="file" placeholder="Foto de perfil" name="fotoPerfil" class=""><br>
                        </div>
                        <div class="boton">
                                <button type="submit" class="submit"><a href=""><img src="../assets/img/choque.png"></a></button>
                        </div>
                </div>

                <?php if (isset($alert)) { ?>
                        <div class="alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
                <?php } ?>

        </form>
</body>

</html>