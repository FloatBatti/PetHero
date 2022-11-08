<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/listaSolicitudes.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" alt="Logo PetHero" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
           
            <div class="listasolicitudes">
                <div class="titulo"><h2>Solicitudes Pendientes</h2></div>
                <div class="rotulo">
                    <div class="campo Nombre">nombre</div>
                    <div class="campo Mascota">Mascota</div>
                    <div class="campo fecha">fecha inicio</div>
                    <div class="campo fecha">fecha fin</div>
                    <div class="campo costo">Costo</div>
                    <div class="campo aceptar">Aceptar</div>
                    <div class="campo rechazar">Rechazar</div>
                </div>
                <div class="scrolleable">
                <div class="solicitud">
                    <div class="campo Nombre">Agustin</div>
                    <div class="campo Mascota"><a href="">Piqui</a></div>
                    <div class="campo fecha">20-11-2022</div>
                    <div class="campo fecha">22-11-2022</div>
                    <div class="campo costo">$1200</div>
                    <div class="campo aceptar"><a href=""><img src="../assets/img/ok.png" alt="Aceptar"></a></div>
                    <div class="campo rechazar"><a href=""><img src="../assets/img/rechaza.png" alt="Rechazar"></a></div>
                </div>
                
            </div>
            </div>
            
        </div>
        
        <aside>
            <div class="contenedora-aside">
            <div class="icono perfil"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT."Guardianes/EditarPerfil"?>">Editar Perfil</a></div>
                <div class="icono mascota"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT. "Guardianes/editarDisponibilidad"?>">Establecer disponibilidad</a></div>
                <div class="icono vermascotas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT."Guardianes/vistaSolicitudes"?>">Solicitudes</a></div>
                <div class="icono reservas"></div>
                <div class="opcion"><a href="<?php echo FRONT_ROOT?>">Reservas</a></div>
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