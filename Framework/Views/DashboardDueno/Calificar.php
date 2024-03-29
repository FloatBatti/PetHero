<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calificar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/calificacion.css" rel="stylesheet">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut" ?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-calificacion">
                <div class="datos-reserva">
                    <div class="dato"><h2><?php echo $guardian->getUsername() ?></h2></div><hr>
                    <div class="fechas"><div>Desde fecha<br><?php echo $reserva->getFechaInicio()?></div><div >Hasta fecha<br><?php echo $reserva->getFechaFin()?></div></div><hr>
                    <div class="dato"><h2><?php echo $mascota->getNombre() ?></h2></div>
                </div>
                <div class="contenedora-form">
                    <form action="<?php echo FRONT_ROOT?>Duenos/CrearReview" method="POST">
                        Valoracion 
                        <div class="estrellas">         
                            <div class=""><input class="puntuacion"type="number" name="calificacion" min="1" max="5" placeholder="5" required></div>
                            <div><img src="../assets/img/allstars.png" height="100"></div>
                        </div>
                        <div class="comentario">
                            <p class="consigna">Agregue un comentario de su experiencia con el guardian.</p>
                            <textarea name="comentario" class="caja" maxlength="150" placeholder="Máximo 150 caracteres." size="50" required></textarea> 
                        </div>
                        <input type="hidden" name="idGuardian" value="<?php echo $guardian->getId()?>">
                        <input type="hidden" name="idReserva" value="<?php echo $reserva->getId()?>">
                        <div class="boton">
                            <button type="submit" class="submit"><img src="../assets/img/dogboneEnviar.png">
                        </div>
                        
                    </form>
                </div>

            </div>

        </div>
        <aside>
        <?php require_once(VIEWS_PATH. "dashboardDueno/MenuDash.php");?>
        </aside>
    </div>

</body>

</html>