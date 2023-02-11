<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elegir Mascota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/filtromascotas.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">


<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-gral">

                <div class="contenedora-eleccion perro">
                  <div class="titulo"><h2>Perro</h2></div> 
                  <div><a href="../Mascotas/VerRegistroPerro"><img src="../assets/img/perrofiltro.png"></a></div>
                </div>

                <div class="contenedora-eleccion gato">
                  <div class="titulo"><h2>Gato</h2></div>
                  <div><a href="../Mascotas/VerRegistroGato"><img src="../assets/img/gatofiltro.png"></a></div>
                </div>
            </div>
            <?php if (isset($alert)) { ?>
                <div class="alert-danger"><?php echo $alert ?></div>
            <?php } ?>
        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>
</body>

</html>