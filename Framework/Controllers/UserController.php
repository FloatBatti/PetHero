<?php
if($_POST){

    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $mail=$_POST['mail'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $eleccion=$_POST['eleccion'];
    $pass=$_POST['pass'];
    $re_pass=$_POST['re-pass'];
    
    if($pass != $re_pass){
        header("location: ../Views/regUsuario.php");
        
    }
    else{
        if($eleccion=="Dueño"){
            header("location:../Views/regMascota.php");   
        }
    }


    



}
?>