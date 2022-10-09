
<style>
.contenedor-registro{
        
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

</style>
<div class="contenedor-registro">
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
    <div class="datoregistro">
    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Registrarme</button>
</div>  
        
</form>
</div>

