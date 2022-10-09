
<style>
.contenedor-registro{
        background-image:url("/salchipeludo.jpeg");
        width: 50%;
        color: black;
        font-size:30px;
        border-radius: 10%;
        border : 1px;
        opacity: 20%;
        background-color: pink;
        display: flex;
        flex-direction: column;
        justify-content:center;
        align-items: center;
        margin: 10vh 10vw;
}
.datoregistro{
        margin: 5px;
        padding: 2px;
        
}
button{
        width: 10vw;
        border: 1px solid black;
        font-size: 30px;
        border-radius: 15%;
        margin: 5px;
        padding: 4px;
        background-color: red;
}
input{
        width:15vw;
        height:5vh;
}
.botones{
        margin: 10px;
        padding: 10px;
        display:flex;
        flex-direction: row-reverse;

}

</style>
<div class="contenedor-registro">
        <h2>Registro</h2>
<form action="" method="post">
    <div class="datoregistro">
    <label for="usuario">Usuario</label>
        <input type="text" name="usuario" class="" required><br>
</div>
        <div class="datoregistro">
    <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="" required><br>
</div>
        <div class="datoregistro">    
        <label for="dni">DNI</label>
            <input type="text" name="dni" class="" required><br>
</div>
        <div class="datoregistro">
            <label for="mail">Correo Electronico</label>
        <input type="text" name="mail" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="re-pass">Repetir Contraseña</label>
        <input type="password" name="re-pass" class="" required><br>
</div>
    <div class="botones">
    <button type="submit" name="button" class="">Dueño</button>
    <button type="submit" name="button" class="">Guardian</button>
</div>  
        
</form>
</div>

