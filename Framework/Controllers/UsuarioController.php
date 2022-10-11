<?php
namespace Controllers;

class UsuarioController{

}

if($_POST){
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['password'];
    var_dump($usuario);
    
    $usuarioLogin = $guardianes->encontrarGuardianUser($usuario);
    
    if($usuarioLogin==null){
        $usuarioLogin=$dueños->encontrarDueño($usuario);
        var_dump($usuarioLogin);
    }
    else{

        //header("location: ../Views/regDisponibilidad.php");
             
        }
    }
    /*
    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $mail=$_POST['mail'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $eleccion=$_POST['eleccion'];
    $pass=$_POST['pass'];
    $re_pass=$_POST['re-pass'];*/
    
?>



