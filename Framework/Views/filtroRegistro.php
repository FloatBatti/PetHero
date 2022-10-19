<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    
    <link href="../styles/filtroRegistro.css" rel="stylesheet" >

   
  </head>
  <body>
    <div class="logo contorno">PET HERO</div>
    <div class="contenedora-registro-filtro contorno">
        <div class="contenedora-eleccion dueño">
            <div class="interno contorno">
                <div class="titulo contorno"><h2>Dueño</h2></div>
                <div class="contorno"><p>Deberas brindar datos personales y de contacto. Podras registrar las mascotas que desees. Una vez hecho ya podras usar los servicios de la web.</p></div>
                <div class="contorno">DIBUJO IMG</div>
                <div class="contorno"><a href="<?php echo FRONT_ROOT . "Duenos/RegisterView"?>">Registrarme</a></div>
            </div>
        </div>

        <div class="contenedora-eleccion guardian">
            <div class="interno contorno">
                <div class="titulo contorno"><h2>Guardian</h2></div>
                <div class="contorno"><p>Deberas brindar datos personales y de contacto. Sera necesario agregar informacion acerca del espacio brindado para el cuidado de las mascotas como asi mismo una descripcion del servicio ofrecido y registrar la disponibilidad con la que lo haras.</p></div>            
                <div class="contorno">DIBUJO IMG</div>
                <div class="contorno"><a href="<?php echo FRONT_ROOT . "Guardianes/FirstRegisterView"?>">Registrarme</a> </div>   
            </div>   
        </div>
    </div>
    <div id="separador" class="contorno">ACA va el footer</div>
  </body>
<footer>
</footer>
</html>
