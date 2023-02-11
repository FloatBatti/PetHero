<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verPerfilGuardian.css" rel="stylesheet">

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
            <div class="plantilla-guardian">
                <div class="cont imagen">
                    <div class=" cont img-perfil">
                        <figure><img class="foto-perfil" src="../assets/FotosUsuarios/<?php echo $guardian->getFotoPerfil() ?>"></figure>
                    </div>
                    <div class=" cont nombre-perfil"><?php echo $guardian->getUsername(); ?></div>
                </div>
                <div class="cont calificacion">
                    <div class="cont solicitud calificacion">Valoración</div>
                    <div class="cont stars"><a href=""><img src="../assets/img/<?php echo $fotopuntaje; ?>"></a></div>
                </div>

                <div class="cont foto-espacio">
                    <div class="cont-foto">
                        <figure><img src="../assets/EspaciosGuardianes/<?php echo $guardian->getFotoEspacioURL() ?>" height="270"></figure>
                    </div>
                </div>

                <div class="cont descripcion">
                    <div class="cont dias">Dias de atencion:<br>Desde <?php echo $guardian->getFechaInicio() ?> hasta <?php echo $guardian->getFechaFin(); ?><br></div>

                    <div class="cont mascotas">Tipos de mascota permitidos:<br><?php foreach ($tamaños as $tipo) {
                                                                                    echo $tipo . " ";
                                                                                } ?><br></div>

                    <div class="cont costo">Precio por dia: $<?php echo $guardian->getCosto(); ?></div>

                    <div class="cont texto"><?php echo $guardian->getDescripcion(); ?></div>
                </div>
                <div class="botones">

                    <div class="cont reserva">
                        <a href="../Reservas/Iniciar?id=<?php echo $guardian->getId(); ?>"><img src="../assets/img/perro-mail.png" width="55px"></a>
                        Enviar solicitud
                    </div>

                    <div class="cont review">
                        <a href="../Duenos/VistaReviews?idGuardian=<?php echo $guardian->getId() ?>"><img src="../assets/img/reviews.png" width="72px"></a>
                        Reviews
                    </div>


                    <div class="cont letter">
                        <a href="../Mensaje/NuevoMensaje?id=<?php echo $guardian->getId(); ?>&nombre=<?php echo $guardian->getUsername(); ?>"><img src="../assets/img/icono-mensaje.png" width="62px"></a>
                        Enviar Mensaje
                    </div>



                </div>


            </div>

        </div>
        <aside>
            <?php require_once(VIEWS_PATH . "dashboardDueno/MenuDash.php"); ?>
        </aside>
    </div>
</body>

</html>