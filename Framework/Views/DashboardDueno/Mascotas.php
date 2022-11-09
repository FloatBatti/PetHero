<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Mascotas</title>

    

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verMascota.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="drop-Mascota">
                <div class="header-Mascotas"><img src="../assets/img/tituloMascotas.png"></div>

                <div class="conteiner-list">

                    <?php foreach ($listaMascotas as $mascota) {?>

                            <div class="row mascotita">
                                <div class="col contendor-img">
                                    <div class="img-Mascota"><a href=""><img src="../assets/Mascotas/FotosMascotas/<?php echo $mascota->getFotoURL()?>" height="50"></a></div>
                                </div>
                                <div class="col nombre"><?php
                                                        echo $mascota->getNombre() ?></div>
                                <div class="col editar"><a href=""><img src="../assets/img/edit.png"></a></div>
                                <div class="col borrar"><a href=""><img src="../assets/img/remove.png"></a></div>
                            </div>         
                    <?php } ?>

                </div>

            </div>
        </div>
        <aside>
        <?php require_once(VIEWS_PATH . "dashboardDueno/menuDash.php"); ?>
        </aside>
    </div>

    <div class="footer-separador"></div>
    <footer>
        <div>Copyright &#169 2022 Pet Hero S.A. es una empresa del grupo Batti's System CO.</div>
        <div><a href="">Terminos y Condiciones</a></div>
        <div><a href="">Aviso de privacidad</a></div>
    </footer>

</body>

</html>