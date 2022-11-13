<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verPerfilGuardian.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="plantilla-guardian">
                <div class="cont imagen">
                    <div class=" cont img-perfil"><figure><img src="../assets/FotosUsuarios/<?php echo $guardian->getFotoPerfil()?>"></figure></div>
                    <div class=" cont nombre-perfil"><?php echo $guardian->getUsername();?></div>
                </div>
                <div class="cont calificacion"><div class="cont solicitud calificacion">Valoracion</div><div class="cont stars"><a href=""><img src="../assets/img/3_stars.png"></a></div></div>
                
                <div class="cont foto-espacio"><div class="cont-foto"><figure><img src="../assets/EspaciosGuardianes/<?php echo $guardian->getFotoEspacioURL()?>" height="270"></figure></div></div>
                
                <div class="cont descripcion">
                    <div class="cont dias">Dias de atencion:<br>Desde<?php echo $guardian->getFechaInicio()?> hasta <?php echo $guardian->getFechaFin();?><br></div>
                    <hr>
                    <div class="cont mascotas">Tipos de mascota permitidos: <hr><br><?php foreach($tamaños as $tipo){echo $tipo." ";}?><br></div>
                    <hr>
                    <div class="cont costo">Precio por dia: $<?php echo $guardian->getCosto();?></div>
                    <hr>
                    <div class="cont texto"><?php echo $guardian->getDescripcion();?></div>
                </div>
                <div class="botones">
                    <div class="cont solicitud">
                        <div class="boton">
                            <a href="../Reservas/Iniciar?id=<?php echo $guardian->getId();?>"><img src="../assets/img/perro-mail.png"></a>
                        </div>  
                        <div class="cont">Enviar solicitud</div>
                    </div>

                        <div class="cont solicitud">
                            <div class="cont"><a href=""><img src="../assets/img/reviews.png"></a></div><div class="cont"></div>Reviews
                        </div>
                    <div>
                        <div class="cont letter"><a href="../Mensaje/vistaChat?id=<?php echo $guardian->getId();?>"><img src="../assets/img/icono-mensaje.png"></a></div><div>Enviar Mensaje</div>
                    </div>
                
                </div>


            </div>
                
        </div>
        <aside>
        <?php require_once(VIEWS_PATH. "dashboardDueno/menuDash.php");?>
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