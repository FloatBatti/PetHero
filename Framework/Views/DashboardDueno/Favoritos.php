<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Favoritos</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verFavoritos.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">

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
            <div class="conteiner-list">
                <div class="row encabezado-row">
                    <div class="col">Nombre Guardián</div>
                    <div class="col">Tipo mascota admitido</div>
                    <div class="col">Descripcion espacio</div>
                    <div class="col">Ver Perfil</div>
                    <div class="col">Borrar Favorito</div>

                </div>
                <div class="scrolleable">
                    <?php foreach ($listaGuardianes as $guardian) { ?>

                        <div class="row guardian-row">

                            <div class="col nombre-ex"><?php echo $guardian->getUsername() ?></div>
                            <div class="col tipo-ex"><?php

                                                        foreach ($guardian->getTipoMascota() as $tipo) {

                                                            echo $tipo . " ";
                                                        }

                                                        ?></div>
                            <div class="col descripcion-ex"><?php echo $guardian->getDescripcion() ?></div>
                            <div class="col perfil-ex"><a style="margin-left: 4px;" href="../Duenos/VerPerfilGuardian?id=<?php echo $guardian->getId(); ?>"><img src="../assets/img/verperfil.png" height="40"></a></div>
                            <div class="col favoritos-ex"><a style="margin-left: 25px;" href="../Duenos/BorrarFavorito?idGuardian=<?php echo $guardian->getId(); ?> "><img src="../assets/img/delete.png" height="40"></a></div>
                        </div>

                    <?php } ?>


                </div>

                <?php if (isset($alert)) { ?>
                    <div  style="margin-top: 2px;" class="alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
                <?php } ?>
            </div>

        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>

</body>

</html>