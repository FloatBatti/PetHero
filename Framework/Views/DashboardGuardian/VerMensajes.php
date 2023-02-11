<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verMensajes.css" rel="stylesheet">
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
            <div class="contenedora-msjs aesthetic">
                <div>
                    <h2 class="title">Mensajes de Dueños</h2>
                </div>
                <div class="bandeja-entrada aesthetic">
                    <?php foreach ($bandeja as $inbox) { ?>

                        <div class="row inbox aesthetic">
                            <div class="col user"><?php echo $inbox->getNombre(); ?></div>
                            <div class="col abrir"><a href="../Mensaje/VistaChat?id=<?php echo $inbox->getId(); ?>"><img src="../assets/img/open.png"></a></div>
                        </div>
                    <?php }

                    ?>
                </div>

            </div>

        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "DashboardGuardian/MenuDash.php"); ?>
        </aside>
    </div>
</body>

</html>