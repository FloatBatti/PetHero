<div class="">
<form action="" method="post">
        <div class="datoregistro">
        <label for="disponibilidad">Disponibilidad</label><br>
            <input type="checkbox" name="lunes" class="">Lunes<br>
            <input type="checkbox" name="lunes" class="">Martes<br>
            <input type="checkbox" name="lunes" class="">Miercoles<br>
            <input type="checkbox" name="lunes" class="">Jueves<br>
            <input type="checkbox" name="lunes" class="">Viernes<br>
    </div>
    <div class="datoregistro">
        <label for="horario">Horario Inicio</label><br>
            <input type="time" name="" class=""><br>
        <label for="horario">Horario Fin</label><br>
            <input type="time" name="" class=""><br>
    </div>
    <div class="datoregistro">
        <label for="raza">Tamaño de mascotas aceptado</label>
            <select name="tamaño">
                <option value="value1">Pequeños(0-5 kg)</option>
                <option value="value2" selected>Medianos(5-10)</option>
                <option value="value3">Mayor a 20</option>
            </select>
    </div>
        <div class="datoregistro">    
        <label for="fotoEspacio">Foto del espacio(URL).</label>
            <input type="text" name="fotoUrl" class="" required><br>
    </div>
        <div class="datoregistro">
            <label for="descripcion">Descripcion del espacio ofrecido</label>
        <input type="text-area" name="descripcion" class="" required><br>
    </div>
    <div class="datoregistro">
        <button type="submit" name="button" class="">Cargar Datos</button>
    </div>  
        
</form>
</div>