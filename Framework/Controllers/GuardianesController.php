<?php

namespace Controllers;

use DAO\GuardianDAO as GuardianDAO;
use Models\Guardian as Guardian;
use DAO\UserDAO as UserDAO;

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

        if ($_POST) {

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

            $this->UserDAO->Add($guardian, "G");
            $this->GuardianDAO->Add($guardian);

            echo "<script> if(confirm('Perfil creado con exito')); </script>";

            $this->registroTerminado();
        }
    }

    public function Registro($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword)
    {

        if ($_POST) {

            $guardian = new Guardian();
            $guardian->setUsername($username);
            $guardian->setDni($dni);
            $guardian->setNombre($nombre);
            $guardian->setApellido($apellido);
            $guardian->setCorreoelectronico($mail);
            $guardian->setTelefono($telefono);
            $guardian->setDireccion($direccion);


            if (!$this->UserDAO->checkUsuario($username, $dni, $mail)) {

                if ($password == $rePassword) {

                    $guardian->setPassword($password);

                    $_SESSION["GuardTemp"] = serialize($guardian);

                    $this->RegistrarDisponibilidad();

                } else {

                    echo "<script> if(confirm('La contraseña ya existe')); </script>";

                    $this->vistaRegistro();
                }

            } else {

                echo "<script> if(confirm('El usuario ya existe')); </script>";

                $this->vistaRegistro();
            }
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
