
<style>
body{
        background-image:url("../styles/salchipeludo.jpeg");
        background-repeat:no-repeat;
        
}
.contenedor-registro{
        
        width: 50%;
        color: black;
        font-size:30px;
        border-radius: 10%;
        border : 1px;
        opacity: 70%;
        background-color: green;
        display: flex;
        flex-direction: column;
        justify-content:center;
        align-items: center;
        margin: ;
        position: absolute;
        left: 50%;
        top: 20%;
    
    
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

<?php
var_dump(FRONT_ROOT);
?>
<div class="contenedor-registro">
        <h2>Registro</h2>
<form action="<?php echo FRONT_ROOT ?>Dueños/add" method="post">
    <div class="datoregistro">
    <label for="usuario"></label>
        <input type="text" placeholder="Usuario" name="usuario" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="nombre"></label>
        <input type="text" placeholder="Nombre" name="nombre" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="apellido"></label>
            <input type="text" placeholder="Apellido" name="apellido" class="" required><br>
</div>
        <div class="datoregistro">    
        <label for="dni"></label>
            <input type="text" placeholder="DNI" name="dni" class="" required><br>
</div>
        <div class="datoregistro">
            <label for="mail"></label>
        <input type="email" placeholder="Correo Electronico" name="mail" class="" required><br>
</div>
        <div class="datoregistro">    
        <label for="telefono"></label>
            <input type="text" placeholder="Telefono celular(sin guiones)" name="telefono" class="" required><br>
</div>
        <div class="datoregistro">
            <label for="direccion"></label>
        <input type="text" placeholder="Direccion" name="direccion" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="pass"></label>
        <input type="password" placeholder="Contraseña" name="pass" class="" required><br>
</div>
        <div class="datoregistro">
        <label for="re-pass"></label>
        <input type="password" placeholder="Repetir Contraseña" name="re-pass" class="" required><br>
</div>
        
    <button type="submit" name="" class="">Guardar</button>
    
</div>  
        
</form>
</div> 
</body>
</html>


