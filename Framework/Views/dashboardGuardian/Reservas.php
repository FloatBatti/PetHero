<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/listaSolicitudes.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" alt="Logo PetHero" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">

            <div class="listasolicitudes">
                <div class="titulo">
                    <h2>Reservas Aceptadas</h2>
                </div>
                <div class="row rotulo">
                    <div class="col campo Nombre">Nombre</div>
                    <div class="col campo Nombre">Apellido</div>
                    <div class="col campo Mascota">Mascota</div>
                    <div class="col campo fecha">fecha inicio</div>
                    <div class="col campo fecha">fecha fin</div>
                    <div class="col campo costo">Costo</div>
                </div>
                <div class="scrolleable">
                <?php foreach ($listaReservas as $reserva){?>
                <div class="row solicitud">
                    <div class="col campo Nombre"><?php echo $reserva->getDueño()->getUsername()?></div>
                    <div class="col campo Mascota"><a href=""><?php echo $reserva->getMascota()->getNombre()?></a></div>
                    <div class="col campo fecha"><?php echo $reserva->getFechaInicio()?></div>
                    <div class="col campo fecha"><?php echo $reserva->getFechaFin()?></div>
                    <div class="col campo costo"><?php echo $reserva->getCosto()?></div>
                    </div>
                    <?php }?>
                </div>
            </div>

        </div>

        <aside>
            <?php require_once(VIEWS_PATH . "dashboardGuardian/menuDash.php"); ?>
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