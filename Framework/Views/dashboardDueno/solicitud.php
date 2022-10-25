<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/solicitud.css" rel="stylesheet">

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
            <div class="contenedora-solicitud">
                <div class="contenedora-cabecera">
                    <div class="img-perfil"></div>
                    <div class="nombre-perfil">Nombre Guardian</div>
                </div>
                <div class="contenedora-fechas">
                    <form action="<?php echo FRONT_ROOT ?> Rerservas/Confirmar" method="POST">
                        <div class="contenedora-inputs">
                            <div class="cont">
                                <div><label for="fechaIn">Fecha Inicio</label></div>
                                <div></div><input type="date" name="fechaIn">
                            </div>
                            <div class="cont">
                                <div><label for="fechaOut">Fecha Fin</label></div>
                                <div><input type="date" name="fechaOut"></div>
                            </div>
                            <div class="cont">

                                <div><label for="Mascota">Mascota</label></div>

                                <div><select name="idMascota">

                                        <?php foreach ($listaMascotas as $mascota) { 
                                            
                                            foreach($dueño->getMascotas() as $mascotaId){
                                                
                                                if ($mascota->getId() == $mascotaId) {?>

                                            <option value="<?php echo $mascota->getId() ?>"><?php echo $mascota->getNombre() ?></option>

                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="boton">
                                    <button type="submit" class="submit"><a href=""><img src="../img/choque.png"></a></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <aside>
            <div class="contenedora-aside">
                <div class="icono perfil"></div>
                <div class="opcion">Editar Perfil</div>
                <div class="icono mascota"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/RegisterMascotaView" ?>">Registrar Mascota</a></div>
                <div class="icono vermascotas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/ListMascotasView" ?>">Mis Mascotas</a></div>
                <div class="icono guardian"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/ListGuardianesView" ?>">Guardianes</a></div>
                <div class="icono favoritos"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/ListFavoritosView" ?>">Favoritos</a></div>
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