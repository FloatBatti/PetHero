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
                    <div class=" cont img-perfil"></div>
                    <div class=" cont nombre-perfil"><?php echo $guardian->getUsername();?></div>
                </div>
                <div class="cont calificacion"><div class="cont solicitud calificacion"></div><div class="cont stars"><a href=""><img src="../assets/img/3_stars.png"></a></div></div>
                <div class="cont foto-espacio"><div class="cont foto"></div></div>
                <div class="cont descripcion">
                    <div class="cont dias">Dias de atencion:<br>Desde<?php echo $guardian->getFechaInicio()?> hasta <?php echo $guardian->getFechaFin();?><br></div>
                    <div class="cont mascotas">Tipos de mascota permitidos:<br><?php foreach($tamaños as $tipo){echo $tipo." ";}?><br></div>
                
                    <div class="cont costo">Precio por dia: $<?php echo $guardian->getCosto();?></div>
                    <div class="cont texto"><?php echo $guardian->getDescripcion();?></div>
                </div>
                <div class="cont solicitud">

                    <div class="boton">
                        <a href="../Reservas/Iniciar?id=<?php echo $guardian->getId();?>"><img src="../img/perro-mail.png"></a>
                    </div>  

                <div class="cont">Enviar solicitud</div></div>
                <div class="cont solicitud"><div class="cont"><a href=""><img src="../assets/img/reviews.png"></a></div><div class="cont"></div>Reviews</div>
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
                <div class="icono mensajes"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "" ?>">Mensajes</a></div>                                       
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