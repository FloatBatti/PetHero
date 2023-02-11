<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Mascota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/registroMascota.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

    
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-mascota">
                <form action="<?php echo FRONT_ROOT ?>Mascotas/AddGato" method="post" enctype="multipart/form-data">
                    <div class="contenedora-inputs">
                        <div class="dato-registro">
                            <label for="nombre">Nombre de la mascota</label>
                            <input type="text" name="nombre" class="" required><br>
                        </div>
                        <div class="dato-registro">
                            <label for="raza">Raza</label>
                            <select name="raza">

                                <?php
                                foreach ($listaRazas as $raza) { ?>

                                    <option value="<?php echo $raza ?>"><?php echo $raza ?></option>

                                <?php } ?>

                            </select>
                        </div>
                        <div class="TT">
                            <div></div>
                            <label for="P"><input type="radio" id="P" name="tamano" value="Pequeño" class="radio">Pequeño</label>
                            <label for="M"><input type="radio" id="M" name="tamano" value="Mediano" class="radio" checked>Mediano</label>
                            <label for="G"><input type="radio" id="G" name="tamano" value="Grande" class="radio">Grande</label>
                        </div>
                        <div class="dato-registro">
                            <label style="margin-top: 15px;" for="fotoPerro">Foto de la Mascota</label>
                            <input type="file" name="fotoGato" class="" required><br>
                        </div>
                        <div class="dato-registro">
                            <label style="margin-top: 15px;" for="fotoPlan">Foto del Plan de Vacunacion</label>
                            <input type="file" name="fotoPlan" class="" required><br>
                        </div>
                        <div class="dato-registro">
                            <label style="margin-top: 15px;" for="video">Video opcional (YouTube)</label>
                            <input type="url" name="videoUrl" class=""><br>
                        </div>
                        <div class="boton">
                            <button type="submit" class="submit"><a href=""><img src="../assets/img/dogboneEdit.png"></a></button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>

</body>

</html>