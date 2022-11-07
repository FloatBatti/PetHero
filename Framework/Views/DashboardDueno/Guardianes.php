<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardianes</title>
    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/verGuardianes.css" rel="stylesheet">
    
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
            <div class="conteiner-list">
                <form>
                <div class="filtro-fecha">
                    <div>Fecha Inicio</div>
                    <div><input type="date"></div>
                    <div>Fecha Fin</div>
                    <div><input type="date"></div>
                    <div><input type="text" placeholder="guardian"></div>
                    <div><a href=""><img src="../assets/img/lupa.png"></a></div>
                    
                </div>
                </form>
                    <div class="row encabezado-row">
                        <div class="col ">Foto Perfil</div>
                        <div class="col ">Nombre</div>
                        <div class="col ">Tipo mascota admitido</div>
                        <div class="col ">Descripcion espacio</div>
                        <div class="col ">Calificacion</div>
                        <div class="col ">Ver Perfil</div>
                        <div class="col ">Agregar Favorito</div>

                    </div>
                <div class="scrolleable">

                    <?php foreach ($listaGuardianes as $guardian) { ?>

                        <div class="row guardian-row">
                            <div class="col contendor-img">
                                <div class="img-ex">img</div>
                            </div>
                            <div class="col nombre-ex"><?php echo $guardian->getUsername() ?></div>
                            <div class="col tipo-ex"><?php
                                                        $lista=$DAOGuardianes->obtenerTamañosMascotas($guardian->getId());
                                                    
                                                        foreach ($lista as $tipo) {

                                                            echo $tipo . " ";
                                                        }

                                                        ?></div>
                            <div class="col descripcion-ex"><?php echo $guardian->getDescripcion() ?></div>
                            <div class="col calificacion-ex">***__</div>
                        <div class="col perfil-ex"><a href="../Guardianes/verPerfilGuardian?id=<?php echo $guardian->getId();?>"><img src="../assets/img/ojo_perfil.png" height="50"></a></div>
                        
                            <div class="col favoritos-ex"><a href="../Duenos/agregarFavorito?id=<?php echo $guardian->getId();?>"><img src="../assets/img/estrella_fav.png" height="50"></a></div>
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