<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    
    <link href="../styles/filtroRegistro.css" rel="stylesheet" >

   
  </head>
  <body>
    <div class="cabecera"><!--contenedora para el logo en el top + faqs, etc -->  
      <img src="../img/PetHeroLogo.png">
    </div>

    <div class="contenedora-gral"><!--aca esta el contenedor q contiene las 2 opciones -->

      <div class="contenedora-eleccion dueño"><!--contenedora para eleccion de dueño -->
       
        <div class="contenedora-titulo">
          <img src="../img/icono-Dueño.png" height="400" widht="450">
        </div>
        
        <div class="contenedora-texto">
          <div class="texto">
              <ul>
                <li>Deberás brindar datos personales y de contacto.</li>
                <li>Podrás registrar las mascotas que desees.</li>
                <li>Una vez hecho ya podras usar los servicios de la web..</li>
            </ul>
          </div>
        </div>
        
        <div class="contenedora-boton">
        <a href="<?php echo FRONT_ROOT . "Duenos/RegisterView"?>"><img src="../img/RegistrarmeResized.png" height="70"></a>
        </div>

      </div>

      <div class="contenedora-eleccion guardian"><!--acontenedora para eleccion de guardian -->
      
        <div class="contenedora-titulo">
        <img src="../img/My Project-1.png" >
        </div>

        <div class="contenedora-texto">
          <div class="texto">Deberas brindar datos personales y de contacto.<br> Será necesario agregar informacion acerca del espacio brindado<br> para el cuidado de las mascotas como asi mismo <br>una descripcion del servicio ofrecido <br>y registrar la disponibilidad con la que lo haras</div>
        </div>

        <div class="contenedora-boton">
        <a href="<?php echo FRONT_ROOT . "Guardianes/FirstRegisterView"?>"><img src="../img/RegistrarmeResized.png" height="70"></a>
      </div>

      </div>
    </div>
    <div class="top-footer"></div><!--ofrece un margen inferior por encima del footer -->

    
<footer>
<div>Copyright &#169 2022 Pet Hero S.A. es una empresa del grupo Batti's System CO.</div>
<div><a href="">Terminos y Condiciones</a></div>
<div><a href="">Aviso de privacidad</a></div>
</footer>
</html>
