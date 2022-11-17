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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="conteiner-list">
                <form>
                </form>
                <div class="row encabezado-row">
                    <div class="col ">Guardian</div>
                    <div class="col ">Fecha inicio</div>
                    <div class="col ">Fecha Fin</div> 
                    <div class="col ">Mascota</div>
                    <div class="col ">Costo</div>
                    <div class="col ">Estado</div>
                    <div class="col ">Cancelar</div>

                </div>
                <div class="scrolleable">

                    <?php foreach ($listaReservas as $reserva) { ?>

                        <div class="row reserva-row">
                            <div class="col">
                                <?php
                                foreach ($listaGuardianes as $guardian) {

                                    if ($guardian->getId() == $reserva->getGuardianID()) {

                                        echo $guardian->getNombre();
                                    }
                                }
                                ?>
                            </div>

                            <div class="col "><?php echo $reserva->getFechaInicio(); ?></div>
                            <div class="col "><?php echo $reserva->getFechaFin(); ?></div>
                            <div class="col ">
                                <?php
                                foreach ($listaMascotas as $mascota) {

                                    if ($mascota->getId() == $reserva->getMascotaID()) {

                                        echo $mascota->getNombre();
                                    }
                                }
                                ?>
                            </div>
                            <div class="col"><?php echo $reserva->getCosto(); ?></div>
                            <div class="col"><?php echo $reserva->getEstado(); ?></div>
                            <div class="col"><a href=""><img src="../img/remove.png" height="45"></a></div>
                        </div>

                    <?php } ?>

                </div>
        </div>
    </div>
    <aside>
    <div class="contenedora-aside">
                <div class="icono perfil"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/EditarPerfil"?>">Editar Perfil</a></div>
                <div class="icono mascota"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaRegistroMascota" ?>">Registrar Mascota</a></div>
                <div class="icono vermascotas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaMascotas" ?>">Mis Mascotas</a></div>
                <div class="icono guardian"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaGuardianes" ?>">Guardianes</a></div>
                <div class="icono favoritos"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/vistaFavoritos" ?>">Favoritos</a></div>
                <div class="icono reservas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "" ?>">Reservas</a></div>                                       
            </div>
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