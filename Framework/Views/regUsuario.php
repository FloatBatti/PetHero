
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
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
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
        <label for="telefono">Telefono celular(sin guiones)</label>
            <input type="text" name="telefono" class="" required><br>
</div>
        <div class="datoregistro">
            <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class="" required><br>
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
</body>
</html>


