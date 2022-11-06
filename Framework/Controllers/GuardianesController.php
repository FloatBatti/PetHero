<?php

namespace Controllers;

use DAO\GuardianDAO as GuardianDAO;
use Models\Guardian as Guardian;
use DAO\UserDAO as UserDAO;
use Exception;

class GuardianesController
{

    private $GuardianDAO;
    private $UserDAO;
    

    public function __construct()
    {
        $this->GuardianDAO = new GuardianDAO();
        $this->UserDAO = new UserDAO();
    }

    public function ListToDuenoView(){

        if(isset($_SESSION["DuenoId"])){

            $listaGuardianes = $this->GuardianesDAO->GetAll();

            require_once(VIEWS_PATH."DashboardDueno/Guardianes.php");

        }
    }

    public function VistaRegistro()
    {
        require_once(VIEWS_PATH . "RegistroGuardian.php");
    }

    public function RegistrarDisponibilidad()
    {

        require_once(VIEWS_PATH . "RegistroDisponibilidad.php");
    }

    public function RegistroTerminado(){

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "index.php");

    }

    public function Add($inicio, $fin, $sizes, $costo,  $fotoUrl, $descripcion)
    {


        $guardian =  unserialize($_SESSION["GuardTemp"]);

        unset($_SESSION["GuardTemp"]);

        $guardian->setFechaInicio($inicio);
        $guardian->setFechaFin($fin);

        foreach ($sizes as $size) {
            $guardian->pushTipoMascota($size);
        }

        $guardian->setCosto($costo);
        $guardian->setFotoEspacioURL($fotoUrl);
        $guardian->setDescripcion($descripcion);


        if($this->UserDAO->AddGuardian($guardian)){

            header("location: ../Views/index.php");
        }
        
        throw new Exception("El guardian no pudo registrarse"); //Mensaje que funciona como alert
        
    }

    public function Registro($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword, $fotoPerfil)
    {


        $guardian = new Guardian();
        $guardian->setUsername($username);
        $guardian->setDni($dni);
        $guardian->setNombre($nombre);
        $guardian->setApellido($apellido);
        $guardian->setCorreoelectronico($mail);
        $guardian->setTelefono($telefono);
        $guardian->setDireccion($direccion);

        $nameImg = $guardian->getUsername() ."-". $fotoPerfil["name"];
        $temp_name = $fotoPerfil["tmp_name"];
        $error = $fotoPerfil["error"];
        $size = $fotoPerfil["size"];
        $type = $fotoPerfil["type"];


        
        if(!$error){

            $rutaImagen = VIEWS_PATH. "FotoUsuarios/". $nameImg;
            move_uploaded_file($temp_name, $rutaImagen);

            $guardian->setFotoPerfil($nameImg);

        }

        if (!$this->UserDAO->checkUsuario($username, $dni, $mail)) {

            if ($password == $rePassword) {

                $guardian->setPassword($password);

                $_SESSION["GuardTemp"] = serialize($guardian);

                $this->RegistrarDisponibilidad();

            } else {

                echo "<script> if(confirm('Las contraseñas no coinciden')); </script>";

                $this->vistaRegistro();
            }

        } else {

            echo "<script> if(confirm('El usuario ya existe')); </script>";

            $this->vistaRegistro();
        }
        
    }
    
    public function VerPerfilGuardian($id){
        if(isset($_SESSION["DuenoId"])){
            $idInt = (int) $id;
            $guardian=$this->GuardianesDAO->encontrarGuardian($idInt);
            require_once(VIEWS_PATH . "DashboardDueno/PerfilGuardian.php");
        }
    }

}
