<?php
namespace Controllers;

use jsonDAO\DueñosDAO as DueñosDAO;
use jsonDAO\MascotasDAO;
use Models\Dueño as Dueño;
use Models\Mascota as Mascota;

class DuenosController{
    
    private $DueñosDAO;
    private $MascotasDAO;

    public function __construct(){

        $this->DueñosDAO = new DueñosDAO();
        $this->MascotasDAO = new MascotasDAO();
    }

    public function RegisterView(){

        require_once(VIEWS_PATH . "regDueño.php");
    }

    public function RegMascotasView(){

        require_once(VIEWS_PATH . "regMascota.php");
    }

    public function Add($nombre=null, $raza=null, $peso=null, $fotoUrl=null, $urlvacunacion=null, $urlVideo=null){

        $dueño =  unserialize($_SESSION["DuenoTemp"]);

        unset($_SESSION["DuenoTemp"]);
        
        if($_POST){

            $mascota = new Mascota();
            $mascota->setId($this->MascotasDAO->returnIdPlus());
            $mascota->setIdDueño($dueño->getId());
            $mascota->setNombre($nombre);
            $mascota->setRaza($raza);
            $mascota->setPeso($peso);
            $mascota->setFotoURL($fotoUrl);
            $mascota->setPlanVacURL($urlvacunacion);
            $mascota->setVideoURL($urlVideo);

            $this->MascotasDAO->Add($mascota);

            $dueño->pushMascotaId($mascota->getId());

            var_dump($dueño);

            $this->DueñosDAO->Add($dueño);

        }
        else{

            $this->DueñosDAO->Add($dueño);  
        }


    }
    
    public function RegisterUser($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion,$password, $rePassword)
        {
            $dueño = new Dueño();
            $dueño->setId($this->DueñosDAO->returnIdPlus());
            $dueño->setUsername($username);
            $dueño->setDni($dni);
            $dueño->setNombre($nombre);
            $dueño->setApellido($apellido);
            $dueño->setCorreoelectronico($mail);
            $dueño->setTelefono($telefono);
            $dueño->setDireccion($direccion);

            if(!$this->DueñosDAO->checkDueño($dni, $mail)){

                if($password == $rePassword){

                    $dueño->setPassword($password);
    
                    $_SESSION["DuenoTemp"] = serialize($dueño);
                    $this->RegMascotasView();
                }
                else{
                    var_dump($password);
                    echo "<script> if(confirm('La contraseñas no coinciden')); </script>";
    
                    $this->RegisterView();
                }


            }
            else{
    
                echo "<script> if(confirm('El usuario ya existe')); </script>";

                $this->RegisterView();
            }

            
        }
}