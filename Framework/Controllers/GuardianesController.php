<?php

namespace Controllers;

use jsonDAO\GuardianesDAO as GuardianesDAO;
use Models\Guardian as Guardian;
use Models\Usuario as Usuario;

class GuardianesController
{

    private $GuardianesDAO;

    public function __construct()
    {
        $this->GuardianesDAO = new GuardianesDAO();
    }

    public function ListToDuenoView(){

        if(isset($_SESSION["DuenoId"])){

            $listaGuardianes = $this->GuardianesDAO->GetAll();

            require_once(VIEWS_PATH."DashboardDueno/Guardianes.php");

        }
    }

    public function vistaRegistro()
    {

        require_once(VIEWS_PATH . "RegistroGuardian.php");
    }

    public function RegistrarDisponibilidad()
    {

        require_once(VIEWS_PATH . "RegistroDisponibilidad.php");
    }

    public function registroTerminado(){

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "index.php");

    }

    public function Add($dias, $horarioInicio,$horarioFin, $sizes, $costo,  $fotoUrl, $descripcion)
    {

        if ($_POST) {

            $guardian =  unserialize($_SESSION["GuardTemp"]);

            unset($_SESSION["GuardTemp"]);

            foreach ($dias as $dia) {
                $guardian->pushDisponibilidad($dia);
            }

            $guardian->setHorarioIncio($horarioInicio);
            $guardian->setHorarioFin($horarioFin);

            foreach ($sizes as $size) {
                $guardian->pushTipoMascota($size);
            }

            $guardian->setCosto($costo);
            $guardian->setFotoEspacioURL($fotoUrl);
            $guardian->setDescripcion($descripcion);

            $this->GuardianesDAO->Add($guardian);

            echo "<script> if(confirm('Perfil creado con exito')); </script>";

            $this->registroTerminado();
        }
    }

    public function Registro($username,  $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword)
    {

        if ($_POST) {

            $guardian = new Guardian();
            $guardian->setId($this->GuardianesDAO->returnIdPlus());
            $guardian->setUsername($username);
            $guardian->setDni($dni);
            $guardian->setNombre($nombre);
            $guardian->setApellido($apellido);
            $guardian->setCorreoelectronico($mail);
            $guardian->setTelefono($telefono);
            $guardian->setDireccion($direccion);


            if (!$this->GuardianesDAO->checkGuardian($dni, $mail)) {


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
    public function verPerfilGuardian($id){
        if(isset($_SESSION["DuenoId"])){
            $idInt = (int) $id;
            $guardian=$this->GuardianesDAO->encontrarGuardian($idInt);
            require_once(VIEWS_PATH . "DashboardDueno/PerfilGuardian.php");
        }
    }

}
