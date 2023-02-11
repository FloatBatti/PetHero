<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/solicitud.css" rel="stylesheet">

</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='<?php echo FRONT_ROOT . "Home/LogOut"?>'><img src="../assets/img/PetHeroLogo.png" height="50"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-solicitud">
                
                <div class="contenedora-datos">

                    <div class="contendora-confirmacion">

                    <p class="cabecera-dato">Guardian</p>   
                            <div class="dato-confirmacion">
                                <?php echo $guardian->getUsername();?>
                            </div>
                            <p class="cabecera-dato">Fecha inicio</p>
                            <div class="dato-confirmacion">   
                                <?php echo $reserva->getFechaInicio(); ?>
                            </div>
                            <p class="cabecera-dato">Fecha Fin</p>
                            <div class="dato-confirmacion">                           
                                <?php echo $reserva->getFechaFin(); ?>
                            </div>
                            <p class="cabecera-dato">Mascota</p>
                            <div class="dato-confirmacion">
                                <?php 
                                    echo $mascota->getNombre();
                                ?>
                            </div>
                            <p class="cabecera-dato">Costo</p>
                            <div class="dato-confirmacion">                                
                                <?php echo $reserva->getCosto(); ?>
                            </div>
                            
                            <div class="boton">
                                <button type="submit" class="submit"><a href="<?php echo FRONT_ROOT?>Reservas/Add"><img src="../assets/img/dogboneEnviar.png"></a></button>
                            </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <aside>
        <?php require_once(VIEWS_PATH. "dashboardDueno/MenuDash.php");?>
        </aside>
    </div>

</body>

</html>