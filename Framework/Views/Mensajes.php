<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/mensajes.css" rel="stylesheet">
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
            <div class="contendora-chat">
                <div class="lista-mensajes">
                    <?php
                    foreach($listaMensajes as $mensaje){
                        if($mensaje->getEmisor()==$_SESSION["UserId"]){
                            ?>
                        <div class="contenedora-mensaje izquierda"><div class="autor-mensaje">Yo</div><div class="mensaje"><?php echo $mensaje->getContenido();?></div></div>
                    <?php    
                    }else{
                        ?>
                        <div class="contenedora-mensaje derecha"><div class="mensaje"><?php echo $mensaje->getContenido();?></div><div class="autor-mensaje"><?php echo $usuario->getUsername();?></div></div>
                    <?php
                    }
                    ?>
                    <!--<div class="contenedora-mensaje emisor"><div class="autor-mensaje"></div><div class="mensaje"></div></div>
                    <div class="contenedora-mensaje receptor"><div class="mensaje"></div><div class="autor-mensaje">Receptor</div></div>-->
                    
                    
                </div>
                <hr>
                <form class="contenedora-reply" action="../Mensaje/Add?id=<?php echo $usuario->getId();?>" method="post">
                <textarea name="chat" class="reply" maxlength="50" placeholder="max 50 caracteres" size="50" required></textarea> 
                <input type="submit" class="Go"><img src="../assets/img/send.png">
            </form>
            <hr>
            </div>
            
        </div>
        <aside>
            <div class="contenedora-aside">
                <div class="icono perfil"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/EditarPerfil"?>">Editar Perfil</a></div>
                <div class="icono mascota"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Mascotas/VistaRegistroMascota" ?>">Registrar Mascota</a></div>
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