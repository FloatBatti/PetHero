<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud</title>

    <link href="../../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../../styles/solicitud.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../../img/PetHeroLogo.png" height="100"></a>
        </div>
        <div>Faqs</div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-solicitud">
                
                <div class="contenedora-fechas">
                    <div>
                        <form>
                            <div>
                                <label for="Guardian">Guardian</label>
                            </div>
                            <div>
                                <input type="text" name="fechaIn" placeholder="guardian q se eligio" disabled>
                            </div>
                            <div>
                                <label for="fechaIn">Fecha Inicio</label>
                            </div>
                            <div>
                                <input type="date" name="fechaIn" placeholder="fecha inicio" disabled>
                            </div>
                            <div>
                                <label for="fechaIn">Fecha Fin</label>
                            </div>
                            <div>
                                <input type="date" name="fechaOut" placeholder="fecha de fin" disabled>
                            </div>
                            <div>
                                <label for="costo">Costo($)</label>
                            </div>
                            <div><input type="number" name="costo" placeholder="1" disabled>
                            </div>
                            <div>
                                <label for="pet">Mascota</label>    
                            </div>
                            <div>
                                <input type="text" name="pet" placeholder="Lula" disabled>
                            </div>
                            <div class="boton">
                                <button type="submit" class="submit"><a href=""><img src="../../img/dogboneEnviar.png"></a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <aside>
            <div class="contenedora-aside">
            <div class="icono perfil"></div>
            <div class="opcion"><a href="<?php echo FRONT_ROOT . "Duenos/EditarPerfil"?>">Editar Perfil</a></div>
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