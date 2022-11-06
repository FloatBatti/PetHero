<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calificar</title>

    <link href="../../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../../styles/calificacion.css" rel="stylesheet">
    

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
            <div class="contenedora-calificacion">
                <div class="datos-reserva">
                    <div class="dato"><div>guardian</div></div><hr>
                    <div class="fechas"><div >Desde fecha<br>10/10/2022</div><div >Hasta fecha<br>12/10/2022</div></div><hr>
                    <div class="dato"><div>mascota</div></div>
                </div>
                <div class="contenedora-form">
                    <form action="" method="POST">
                        Valoracion 
                        <div class="estrellas">
                            
                            <div class=""><input type="number" name="estrellas" min="1" max="5" placeholder="5" required></div>
                            <div><img src="../../img/allstars.png" height="100"></div>
                        </div>
                        <div class="comentario">
                            <div>Agregue un comentario de su experiencia con el guardian.</div>
                            <textarea name="comentario" class="caja" maxlength="50" placeholder="max 50 caracteres" size="50" required></textarea> 
                        </div>
                        <div class="boton">
                            <button type="submit" class="submit"><img src="../../img/dogboneEnviar.png">
                        </div>
                        
                    </form>
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