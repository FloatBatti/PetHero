<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Disponibilidad</title>
    
    <link href="../styles/regDisponibilidad.css" rel="stylesheet" >

  </head>
  <body>
  <div class="cabecera">
        <div class="logo"><a href='../index.php'><img src="../img/PetHeroLogo.png" height="100"></a>
        </div>
        <div><a href="<?php echo FRONT_ROOT . "Home/LogOut"?>">LOG OUT</a></div>
    </div>
<div class="contenedora">

<form action="<?php echo FRONT_ROOT ?> Guardianes/Add" method="post">
        
        <label for="disponibilidad">Disponibilidad</label><br>
        <div class="disponibilidad">
        <div><input type="checkbox" name="dias[]" value= "Lunes" class="">Lunes</div>
        <div><input type="checkbox" name="dias[]" value= "Martes" class="">Martes</div>
        <div><input type="checkbox" name="dias[]" value= "Miércoles" class="">Miércoles</div>
        <div><input type="checkbox" name="dias[]" value= "Jueves" class="">Jueves</div>
        <div><input type="checkbox" name="dias[]" value= "Viernes" class="">Viernes</div>
        <div><input type="checkbox" name="dias[]" value= "Sábado" class="">Sábado</div>
        <div class="domingo" ><input type="checkbox" name="dias[]" value= "Domingo" class="">Domingo</div>
        </div>
    <div class="horarios">
        <div><label for="horarioInicio">Horario Inicio</label><br>
            <input type="time" name="horarioInicio" class=""><br></div>
        <div><label for="horarioFin">Horario Fin</label><br>
            <input type="time" name="horarioFin" class=""><br></div>   
    </div>
    <div><label for="tamaño">Tamaño de mascotas aceptado</label></div>
    <div class="tipo">
          <div><input type="checkbox" name="sizes[]" value= "Pequeño" class="">Pequeños.<br>(hasta 12 kg)</div>
          <div><input type="checkbox" name="sizes[]" value= "Mediano" class="">Medianos.<br> (hasta 21 kg)</div>
          <div><input type="checkbox" name="sizes[]" value= "Grande" class="">Grandes.<br> (Mayor a 21 kg)</div>          
    </div>
    <div class="ultimos">
        <div><label for="costo">Precio por dia</label></div>
        <div class="datoregistro">
            <input type="number" name="costo" class=""><br>
        </div>
        
        <div><label for="fotoEspacio">Foto del espacio(URL)</label></div>
            <div class="datoregistro">    
                <input type="text" name="fotoUrl" class="" required><br>
            </div>
            <div><label for="descripcion">Descripcion del espacio ofrecido</label></div>
            <div class="datoregistro">    
            <input type="text" name="descripcion" class="descripcion" required><br>
        </div>
        <div class="boton">
            <button type="submit" class="submit"><a href=""><img src="../img/dogboneEnviar.png"></a></button>
        </div>  
    </div>        
</form>
</div>
<div class="separador"></div>
    <footer><div>Copyright &#169 2022 Pet Hero S.A. es una empresa del grupo Batti's System CO.</div>
        <div><a href="">Terminos y Condiciones</a></div>
        <div><a href="">Aviso de privacidad</a></div>
    </footer>
</body>
</html>