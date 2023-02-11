<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/listaSolicitudes.css" rel="stylesheet">
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

            <div class="listasolicitudes">
                <div class="titulo">
                    <h2>Solicitudes Pendientes</h2>
                </div>
                <div class="row rotulo">
                    <div class="col">Usuario</div>
                    <div class="col">Mascota</div>
                    <div class="col">Inicio</div>
                    <div class="col">Fin</div>
                    <div class="col">Costo</div>
                    <div class="col">Aceptar</div>
                    <div class="col">Rechazar</div>
                </div>
                <div class="scrolleable">
                    <?php foreach ($listaSolicitudes as $solicitud) { ?>
                        <div class="row solicitud">
                            <div class="col"><?php echo $solicitud->getDueño() ?></div>
                            <div class="col"><?php echo $solicitud->getMascota() ?></div>
                            <div class="col"><?php echo $solicitud->getFechaInicio() ?></div>
                            <div class="col"><?php echo $solicitud->getFechaFin() ?></div>
                            <div class="col"><?php echo "$".$solicitud->getCosto() ?></div>

                            <div class="col"><a href="../Reservas/AceptarSolicitud?idReserva=<?php echo $solicitud->getId() ?>"><img src="../assets/img/ok.png" alt="Aceptar" width="50px"></a></div>

                            <div class="col"><a href="../Reservas/RechazarSolicitud?idReserva=<?php echo $solicitud->getId() ?>"><img src="../assets/img/rechaza.png" alt="Rechazar" width="50px"></a></div>
                        </div>
                    <?php } ?>
                </div>

                <?php if (isset($alert)) { ?>
                    <div class="alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
                <?php } ?>
                
            </div>

        </div>

        <aside>
            <?php require_once(VIEWS_PATH . "dashboardGuardian/MenuDash.php"); ?>
        </aside>
    </div>

</body>

</html>