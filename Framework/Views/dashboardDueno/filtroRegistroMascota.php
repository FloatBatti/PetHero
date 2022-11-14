<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elegir Mascota</title>

    <link href="../styles/dashboardDueño.css" rel="stylesheet">
    <link href="../styles/filstromascotas.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sa /head>
 

<body>
    <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../assets/img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
    <div class="contenedora-general">
        <div class="contenedora-section">
            <div class="contenedora-gral">

                <div class="contenedora-eleccion perro">
                  <div><h2>Perro</h2></div> 
                  <div><a href="../Mascotas/VerRegistroPerro"><img src="../assets/img/perrofiltro.png"></a></div>
                </div>
          
                <div class="contenedora-eleccion gato">
                  <div><h2>Gato</h2></div>
                  <div><a href="../Mascotas/VerRegistroGato"><img src="../assets/img/gatofiltro.png"></a></div>
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