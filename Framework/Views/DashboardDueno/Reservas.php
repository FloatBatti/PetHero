<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardianes</title>
    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verReservas.css" rel="stylesheet">
    <link href="../styles/alert.css" rel="stylesheet">

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
            <div class="conteiner-list">
                <form>
                </form>
                <div class="row encabezado-row">
                    <div class="col ">Guardian</div>
                    <div class="col ">Petición</div>
                    <div class="col ">Inicio</div>
                    <div class="col ">Fin</div>
                    <div class="col ">Mascota</div>
                    <div class="col ">Costo Total</div>
                    <div class="col ">Estado</div>
                    <div class="col ">Cancelar</div>
                    <div class="col ">Pagar</div>
                    <div class="col ">Calificar</div>

                   
                </div>
                <div class="scrolleable">

                    <?php foreach ($listaReservas as $reserva) { ?>

                        <div class="row reserva-row">
                            <div class="col">
                                <?php echo $reserva->getGuardian();?>
                            </div>
                            <div class="col "><?php echo $reserva->getFecha(); ?></div>
                            <div class="col "><?php echo $reserva->getFechaInicio(); ?></div>
                            <div class="col "><?php echo $reserva->getFechaFin(); ?></div>
                            <div class="col ">
                                <?php echo $reserva->getMascota();?>
                            </div>
                            <div class="col"><?php echo "$".$reserva->getCosto(); ?></div>
                            <div class="col"><?php echo $reserva->getEstado(); ?></div>

                            <div class="col"><a href="../Reservas/CancelarSolicitud?idReserva=<?php echo $reserva->getId();?>"><img src="../assets/img/remove.png" height="35"></a></div>

                            <div class="col"><a href="../Reservas/VerAuthPago?idReserva=<?php echo $reserva->getId();?>"><img src="../assets/img/pay.png" height="35"></a></div>

                            <div class="col"><a href="../Reservas/VistaGenerarReview?idReserva=<?php echo $reserva->getId()?>"><img src="../assets/img/reviews.png" height="35"></a></div>
                        </div>

                    <?php } ?>

                </div>

                <?php if (isset($alert)) { ?>
                     <div class="alert-<?php echo $alert->getType()?>"><?php echo $alert->getMessage()?></div>
                 <?php } ?>
        </div>
    </div>
    <aside>
    <?php require_once(VIEWS_PATH. "dashboardDueno/MenuDash.php");?>
    </aside>
    </div>


</body>

</html>