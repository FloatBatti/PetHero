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

    public function FirstRegisterView()
    {

        require_once(VIEWS_PATH . "regGuardian.php");
    }

    public function SecondRegisterView()
    {

        require_once(VIEWS_PATH . "regDisponibilidad.php");
    }

    public function Add($dias, $horarioInicio, $sizes, $horarioFin, $fotoUrl, $descripcion)
    {

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

        $guardian->setFotoEspacioURL($fotoUrl);
        $guardian->setDescripcion($descripcion);

        $this->GuardianesDAO->Add($guardian);

    }

    public function RegisterUser($username, $dni, $nombre, $apellido, $mail, $password, $rePassword, $telefono, $direccion)
    {
        $guardian = new Guardian();
        $guardian->setId($this->GuardianesDAO->returnIdPlus());
        $guardian->setUsername($username);
        $guardian->setDni($dni);
        $guardian->setNombre($nombre);
        $guardian->setApellido($apellido);
        $guardian->setCorreoelectronico($mail);
        $guardian->setTelefono($telefono);
        $guardian->setDireccion($direccion);

        if ($password == $rePassword) {

            $guardian->setPassword($password);

            $_SESSION["GuardTemp"] = serialize($guardian);
            $this->SecondRegisterView();
        } else {

            echo "<script> if(confirm('La contraseña ya existe')); </script>";

            $this->FirstRegisterView();
        }
    }
}
