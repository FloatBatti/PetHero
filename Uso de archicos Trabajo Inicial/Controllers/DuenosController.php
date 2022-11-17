<?php
namespace Controllers;

use DAO\DueñoDAO as DueñoDAO;
use Models\Dueño as Dueño;
use DAO\UserDAO as UserDAO;


class DuenosController{
    
    private $DueñoDAO;
    private $UserDAO;

    public function __construct(){

        $this->DueñoDAO = new DueñoDAO();
        $this->UserDAO = new UserDAO();
    }

    public function VistaRegistro(){

        require_once(VIEWS_PATH . "RegistroDueño.php");
    }

    public function EditarPerfil(){

       
    }

    public function VistaRegistroMascota(){

        require_once(VIEWS_PATH . "DashboardDueno/RegistroMascota.php");
    }

    public function VistaMascotas(){

       
    }

    public function VistaGuardianes(){

        if(isset($_SESSION["DuenoId"])){


            require_once(VIEWS_PATH."DashboardDueno/Guardianes.php");

        }


    }
    public function VistaFavoritos(){

        if(isset($_SESSION["DuenoId"])){

           
            require_once(VIEWS_PATH."DashboardDueno/Favoritos.php");

        }


    }

    public function RegistroTerminado(){

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "index.php");

    }

    public function Add($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion,$password, $rePassword)
    {

            if($_POST){

                $dueño = new Dueño();
                $dueño->setUsername($username);
                $dueño->setDni($dni);
                $dueño->setNombre($nombre);
                $dueño->setApellido($apellido);
                $dueño->setCorreoelectronico($mail);
                $dueño->setTelefono($telefono);
                $dueño->setDireccion($direccion);
    
                if(!$this->UserDAO->checkUsuario($username,$dni, $mail)){
    
                    if($password == $rePassword){
    
                        $dueño->setPassword($password);

                        $this->UserDAO->Add($dueño, "D");
                        $this->DueñoDAO->Add($dueño);

                        echo "<script> if(confirm('Perfil creado con exito')); </script>";

                        $this->registroTerminado();
                    }
                    else{

                        echo "<script> if(confirm('La contraseñas no coinciden')); </script>";
        
                        $this->vistaRegistro();
                    }
    
                }
                else{
        
                    echo "<script> if(confirm('El usuario ya existe')); </script>";
    
                    $this->vistaRegistro();
                }
    
                
            }

        }

        
    public function AddMascota($nombre, $raza, $peso, $fotoUrl, $urlvacunacion, $urlVideo=null){

  /*
            if($_POST){
    
                $MascotasDAO = new MascotasDAO();

                $idUser = $_SESSION["DuenoId"];
                $mascota = new Mascota();
                $mascota->setId($MascotasDAO->returnIdPlus());
                $mascota->setNombre($nombre);
                $mascota->setRaza($raza);
                $mascota->setPeso($peso);
                $mascota->setFotoURL($fotoUrl);
                $mascota->setPlanVacURL($urlvacunacion);
                $mascota->setVideoURL($urlVideo);
    
                $MascotasDAO->Add($mascota);
    
                $this->DueñoDAO->agregarMascotaById($idUser,$mascota->getId());
    
                echo "<script> if(confirm('Mascota agregada con exito')); </script>";
    
                $this->vistaMascotas();
            }
            else{       
            }

            */
    }
        
        
           
}