<?php 

?>

<div class="">
<form action="<?php echo FRONT_ROOT ?> Guardianes/Add" method="post">
        <div class="datoregistro">
        <label for="disponibilidad">Disponibilidad</label><br>
            <input type="checkbox" name="dias[]" value= "Lunes" class="">Lunes<br>
            <input type="checkbox" name="dias[]" value= "Martes" class="">Martes<br>
            <input type="checkbox" name="dias[]" value= "Miércoles" class="">Miércoles<br>
            <input type="checkbox" name="dias[]" value= "Jueves" class="">Jueves<br>
            <input type="checkbox" name="dias[]" value= "Viernes" class="">Viernes<br>
            <input type="checkbox" name="dias[]" value= "Sábado" class="">Sábado<br>
            <input type="checkbox" name="dias[]" value= "Domingo" class="">Domingo<br>
    </div>
    <div class="datoregistro">
        <label for="horario">Horario Inicio</label><br>
            <input type="time" name="horarioInicio" class=""><br>
        <label for="horario">Horario Fin</label><br>
            <input type="time" name="horarioFin" class=""><br>
    </div>
    <div class="datoregistro">
        <label for="tamaño">Tamaño de mascotas aceptado</label><br>
            <input type="checkbox" name="sizes[]" value= "Pequeño" class="">Pequeños (hasta 12 kg)<br>
            <input type="checkbox" name="sizes[]" value= "Mediano" class="">Medianos (hasta 21 kg)<br>
            <input type="checkbox" name="sizes[]" value= "Grande" class="">Grandes (Mayor a 21 kg)<br>
            
    </div>
        <div class="datoregistro">    
        <label for="fotoEspacio">Foto del espacio(URL)</label>
            <input type="text" name="fotoUrl" class="" required><br>
    </div>
        <div class="datoregistro">
            <label for="descripcion">Descripcion del espacio ofrecido</label>
        <input type="text-area" name="descripcion" class="" required><br>
    </div>
    <div class="datoregistro">
        <button type="submit" class="">Completar Registro</button>
    </div>          
</form>
</div>