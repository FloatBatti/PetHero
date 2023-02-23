<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Disponibilidad</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/regDisponibilidad.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">

</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut" ?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>

    <div class="contenedora">

        <form action="<?php echo FRONT_ROOT ?> Guardianes/Add" method="post" enctype="multipart/form-data">
            <div class="ultimos">
                <h4>Disponibilidad</h4>
                <div class="datoregistro">
                    <div id="fecha">Desde<input type="date" name="inicio" min="<?php echo date("Y-m-d"); ?>"></div>
                    <div id="fecha">Hasta<input type="date" name="fin" min="<?php echo date("Y-m-d"); ?>"></div>
                </div>
                <p>Precio por día</p>
                <div class="datoregistro">
                    <input type="number" name="costo" class="" min="0" required><br>
                </div>

                <p>Foto del espacio</p>
                <div class="datoregistro">
                    <input type="file" name="fotoEspacio" class="" required><br>
                </div>

                <p>Descripción del espacio ofrecido</p>
                <div class="datoregistro">
                    <input type="text" name="descripcion" class="descripcion" required><br>
                </div>

                <p>Tamaño de mascotas aceptado</p>
                <div class="tipo">
                    <div><input type="checkbox" name="sizes[]" value="Pequeño" class="" checked>Pequeños.</div>
                    <div><input type="checkbox" name="sizes[]" value="Mediano" class="">Medianos.</div>
                    <div><input type="checkbox" name="sizes[]" value="Grande" class="">Grandes.</div>
                </div>

                <div class="boton">
                    <button type="submit" class="submit"><a href=""><img src="../assets/img/dogboneEnviar.png"></a></button>
                </div>

                <?php if (isset($alert)) { ?>
                    <div class="alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
                <?php } ?>

            </div>

        </form>
    </div>

</body>

</html>