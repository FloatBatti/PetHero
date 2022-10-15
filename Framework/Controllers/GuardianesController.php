<?php
namespace Controllers;

use jsonDAO\GuardianesDAO as GuardianesDAO;
use Models\Guardian as Guardian;
use Models\Usuario as Usuario;

class GuardianesController{
    
    private $GuardianesDAO;

    public function __construct(){

        $this->GuardianesDAO = new GuardianesDAO();
    }


    public function FirstRegisterView(){

        require_once(VIEWS_PATH . "regGuardian.php");
    }

    public function SecondRegisterView(){

        require_once(VIEWS_PATH . "regDisponibilidad.php");

    }
    
    public function Add($dias, $horarioInicio, $sizes, $horarioFin, $fotoUrl, $descripcion){

        $user =  unserialize($_SESSION["UserTemp"]);

        unset($_SESSION["UserTemp"]);

        echo "<pre>";
        var_dump($user);
        echo "</pre>";
        echo "<br>";
        echo "<br>";

        $guardian = new Guardian();
    
        //Datos generales
        $guardian->setId($user->getId());
        $guardian->setUsername($user->getUsername());
        $guardian->setPassword($user->getPassword());
        $guardian->setDni($user->getDireccion());
        $guardian->setNombre($user->getNombre());
        $guardian->setApellido($user->getApellido());
        $guardian->setCorreoelectronico($user->getCorreoelectronico());
        $guardian->setTelefono($user->getTelefono());
        $guardian->setDireccion($user->getDireccion());

        //Datos especificos
        foreach($dias as $dia){
            $guardian->pushDisponibilidad($dia);
        }
        
        $guardian->setHorarioIncio($horarioInicio);
        $guardian->setHorarioFin($horarioFin);
        
        foreach($sizes as $size){
            echo "iteracion";
            $guardian->pushTipoMascota($size);
        }
        
        $guardian->setFotoEspacioURL($fotoUrl);
        $guardian->setDescripcion($descripcion);

        $this->GuardianesDAO->Add($guardian);

        echo "<pre>";
        var_dump($guardian);
        echo "</pre>";
    }

    public function RegisterUser($username, $dni, $nombre, $apellido, $mail, $password, $rePassword, $telefono, $direccion)
        {
            $user = new Usuario();
            $user->setId($this->GuardianesDAO->returnIdPlus());
            $user->setUsername($username);
            $user->setDni($dni);
            $user->setNombre($nombre);
            $user->setApellido($apellido);
            $user->setCorreoelectronico($mail);
            $user->setTelefono($telefono);
            $user->setDireccion($direccion);

            if($password == $rePassword){

                $user->setPassword($password);

                $_SESSION["UserTemp"] = serialize($user);
                $this->SecondRegisterView();
            }
            else{

                echo'<script type="text/javascript">
                    alert("Tarea Guardada");
                    window.location.href="index.php";
                    </script>';

                $this->FirstRegisterView();
            }
            


        }
} 