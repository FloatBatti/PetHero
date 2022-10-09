<style>
.contenedorMascota{
    background-image: url("salchipeludo.jpeg");

}
</style>
<div class="contenedorMascota">
<form action="" method="post">
    <div class="datoregistro">
        <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="" required><br>
    </div>
    <div class="datoregistro">
        <label for="raza">Raza</label>
            <select name="raza">
                <option value="Caniche">Caniche</option>
                <option value="Pequines" selected>Pequines</option>
                <option value="Labrador retriever">Labrador retriever</option>
                <option value="Bulldog francés">Bulldog francés</option>
                <option value="Golden retriever">Golden retriever</option>
                <option value="Pastor alemán">Pastor alemán</option>
                <option value="Bulldog">Bulldog</option>
                <option value="Beagle">Beagle</option>
                <option value="Rottweiler">Rottweiler</option>
                <option value="Braco alemán de pelo corto">Braco alemán de pelo corto</option>
                <option value="Dachshund(mini Salchicha)">Dachshund(mini Salchicha)</option>
                <option value="Sin raza">Sin raza</option>
            </select>
    </div>
    <div class="datoregistro">
        <label for="peso">Peso en kgs</label>
            <input type="number" name="peso"><br>
    </div>
        <div class="datoregistro">    
        <label for="dni">Foto URL</label>
            <input type="text" name="fotoUrl" class="" required><br>
    </div>
        <div class="datoregistro">
            <label for="vacunacion">Foto Plan de Vacunacion</label>
        <input type="text" name="urlvacunacion" class="" required><br>
    </div>
    <div class="datoregistro">
        <button type="submit" name="button" class="">Cargar Mascota</button>
    </div>  
        
</form>
</div>




