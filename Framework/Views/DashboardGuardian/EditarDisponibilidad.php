<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar disponibilidad</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/editarDisponibilidad.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
    <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut" ?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="setDispo">
                <form action="<?php echo FRONT_ROOT ?> Guardianes/actualizarDisponibilidad" method="post">

                    <h3 class="title">Seleccione su nueva disponiblidad</h3>
                    <div class="disponibilidad">
                        <div>Fecha inicio<input type="date" value="<?php echo date($guardian->getFechaInicio()); ?>" name="fechaInicio" min="<?php echo date("Y-m-d"); ?>"></div>
                        <div>Fecha Fin<input type="date" value="<?php echo date($guardian->getFechaFin()); ?>" name="fechaFin" min="<?php echo date("Y-m-d"); ?>"></div>
                    </div>

                    <div class="ultimos">
                        <div><label for="costo">Precio por día</label></div>
                        <div class="datoregistro">
                            <input type="number" name="costo" class="" value="<?php echo $guardian->getCosto(); ?>">
                        </div>
                        <div><label for="descripcion">Descripción del espacio ofrecido</label></div>
                        <div class="datoregistro">
                            <input type="text" name="descripcion" class="descripcion" value="<?php echo $guardian->getDescripcion(); ?>" required><br>
                        </div>
                        <div><label style="margin-top: 5px; margin-bottom: 5px;">Tamaño de mascotas aceptado</label></div>
                        <div class="tipo">
                        <div><input type="checkbox" name="sizes[]" value="Pequeño"><p class="check">Pequeños</p></div>
                        <div><input type="checkbox" name="sizes[]" value="Mediano"><p class="check">Medianos</p></div>
                        <div><input type="checkbox" name="sizes[]" value="Grande"><p  class="check">Grandes</p></div>
                    </div>
                        <div class="boton">
                            <button type="submit" class="submit"><a href=""><img src="../assets/img/dogboneEnviar.png" alt="Enviar"></a></button>
                        </div>
                    </div>

                    <?php if (isset($alert)) { ?>
                     <div class="alert-<?php echo $alert->getType()?>"><?php echo $alert->getMessage()?></div>
                 <?php } ?>
                </form>

            </div>

        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "dashboardGuardian/MenuDash.php"); ?>
        </aside>
    </div>

</body>

</html>