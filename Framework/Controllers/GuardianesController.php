<?php

namespace Controllers;

use DAO\GuardianDAO as GuardianDAO;
use DAO\MascotaDAO;
use Models\Guardian as Guardian;
use DAO\UserDAO as UserDAO;
use Models\Alert as Alert;
use Exception;
use Models\Archivos;

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

    public function Add($inicio, $fin, $sizes, $costo,  $fotoEspacio, $descripcion)
    {

        $guardian =  unserialize($_SESSION["GuardTemp"]);

        unset($_SESSION["GuardTemp"]);

        $guardian->setFechaInicio($inicio);
        $guardian->setFechaFin($fin);

        foreach ($sizes as $size) {
            $guardian->pushTipoMascota($size);
        }

        $guardian->setCosto($costo);
        $guardian->setFotoEspacioURL($fotoEspacio);
        $guardian->setDescripcion($descripcion);


        if($this->UserDAO->AddGuardian($guardian)){

            Archivos::subirArch("fotoEspacio", $fotoEspacio, "EspaciosGuardianes/", $guardian->getUsername());
            header("location: ../Home");
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

        $guardian->setFotoPerfil($nameImg);

        Archivos::subirArch("fotoPerfil", $fotoPerfil, "FotosUsuarios/", $guardian->getUsername());

        if (!$this->UserDAO->checkUsuario($username, $dni, $mail)) {

            if ($password == $rePassword) {

                Archivos::subirArch("fotoPerfil", $fotoPerfil, "FotosUsuarios/", $guardian->getUsername());

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
    
    public function VerPerfilGuardian($idGuardian){
        
        if(isset($_SESSION["UserId"])){
            
            $guardian=$this->GuardianDAO->devolverGuardianPorId($idGuardian);
            $tamaños=$this->GuardianDAO->obtenerTamañosMascotas($guardian->getId());
            
            require_once(VIEWS_PATH . "DashboardDueno/PerfilGuardian.php");
        }
    }
    public function editarDisponibilidad(){
        try{
            $guardian=$this->GuardianDAO->devolverGuardianPorId($_SESSION["UserId"]);
            if($guardian){
            require_once(VIEWS_PATH . "/DashboardGuardian/EditarDisponibilidad.php");
            }throw new Exception("Error al cargar usuario");
        
        }catch(Exception $ex){
            $alert=new Alert($ex->getMessage(),"error");
            $this->vistaDashboard();
        }
    }
    public function actualizarDisponibilidad($fechaInicio,$fechaFin,$sizes,$costo,$fotoUrl,$descripcion){
        if($this->GuardianDAO->grabarDisponibilidad($fechaInicio,$fechaFin,$sizes,$costo,$fotoUrl,$descripcion)){
            header("location: ../Guardianes/vistaDashboard");
        }
        
    }
    public function EditarPerfil(){
        
        try{
            $usuario = $this->GuardianDAO->devolverGuardianPorId($_SESSION["UserId"]);
            if($usuario){
                require_once(VIEWS_PATH . "DashboardGuardian/EditarPerfil.php");
            }
            throw new Exception("error");
        }catch(Exception $ex){
            $alert=new Alert($ex->getMessage(),"error");
            $this->vistaDashboard();
        }   
    }
    public function vistaDashboard(){
        require_once(VIEWS_PATH . "DashboardGuardian/Dashboard.php");
    }
    public function vistaSolicitudes(){
        require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");
    }
    
}

