<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>

  <link href="../styles/filtroRegistro.css" rel="stylesheet">
  <link href="../styles/alert.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

</head>

<body>

  <div class="cabecera">
    <!--contenedora para el logo en el top + faqs, etc -->
    <div class="logo"><a href='../index.php'><img src="../assets/img/volver.png"></a></div>
  </div>
  <div class="contenedora-gral">


    <!--aca esta el contenedor q contiene las 2 opciones -->

    <div class="contenedora-eleccion dueño">
      <!--contenedora para eleccion de dueño -->

      <div class="contenedora-titulo">
        <img src="../assets/img/dueño.png" width="150px">
      </div>
      <div class="superheroicon"><img src="../assets/img/collarReg.png" width="80px"></div>
      <div class="contenedora-texto">
        <div class="texto">
          <p>
            Podrás registrar las mascotas que desees, buscar el guardián ideal y gestionar tus reservas.<br>
          </p>
        </div>
      </div>

      <div class="contenedora-boton">
        <a href="<?php echo FRONT_ROOT . "Duenos/VistaRegistro" ?>"><img src="../assets/img/registrarme.png" height="50"></a>
      </div>

    </div>

    <div class="contenedora-eleccion guardian">
      <!--acontenedora para eleccion de guardian -->

      <div class="contenedora-titulo">
        <img src="../assets/img/titGuardian.png" width="250px">
      </div>
      <div class="superheroicon"><img src="../assets/img/casita.png" width="90px"> </div>

      <div class="contenedora-texto">
        <div class="texto">Podrás ofrecer tu servicio de cuidado, elegiendo la disponibilidad que gustes. Podras ver y gestionar comodamente las solicitudes de reservas.</div>
      </div>

      <div class="contenedora-boton">
        <a href="<?php echo FRONT_ROOT . "Guardianes/VistaRegistro" ?>"><img src="../assets/img/registrarme.png" height="50"></a>
      </div>
    </div>

  </div>
  <div class="top-footer"></div>
  <!--ofrece un margen inferior por encima del footer -->


  <!--
  <footer>
    <div>Copyright &#169 2022 Pet Hero S.A. es una empresa del grupo Batti's System CO.</div>
    <div><a href="">Terminos y Condiciones</a></div>
    <div><a href="">Aviso de privacidad</a></div>
  </footer>
  -->

</html>