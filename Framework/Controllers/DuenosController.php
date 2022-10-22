<?php
namespace Controllers;

use jsonDAO\DueñosDAO as DueñosDAO;
use jsonDAO\MascotasDAO as MascotasDAO;
use jsonDAO\GuardianesDAO as GuardianesDAO;
use Models\Dueño as Dueño;
use Models\Mascota as Mascota;

class DuenosController{
    
    private $DueñosDAO;

    public function __construct(){

        $this->DueñosDAO = new DueñosDAO();
    }

    public function RegisterView(){

        require_once(VIEWS_PATH . "regDueño.php");
    }

    public function RegisterMascotaView(){

        require_once(VIEWS_PATH . "dashboardDueno/registrarMascota.php");
    }

    public function ListMascotasView(){

        if(isset($_SESSION["DuenoId"])){

            $MascotasDAO = new MascotasDAO();
            $listaMascotas = $MascotasDAO->GetAll();

            require_once(VIEWS_PATH."dashboardDueno/verMascotas.php");

        }
    }

    public function ListGuardianesView(){

        if(isset($_SESSION["DuenoId"])){

            $GuardianesDAO = new GuardianesDAO();
            $listaGuardianes = $GuardianesDAO->GetAll();

            require_once(VIEWS_PATH."dashboardDueno/verGuardianes.php");

        }


    }
    public function ListFavoritosView(){

        if(isset($_SESSION["DuenoId"])){

            $GuardianesDAO = new GuardianesDAO();
            $listaGuardianes = $GuardianesDAO->GetAll();
            //desarrollar logica para q el arreglo q se pasa sea filtrado
            //$listaFavoritos =
            require_once(VIEWS_PATH."dashboardDueno/verFavoritos.php");

        }


    }

    public function finishRegister(){

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "index.php");

    }

    public function Add($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion,$password, $rePassword)
    {

            if($_POST){

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
                        $this->DueñosDAO->Add($dueño); 
                        echo "<script> if(confirm('Perfil creado con exito')); </script>";
                        $this->finishRegister();
                    }
                    else{

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

        
    public function AddMascota($nombre, $raza, $peso, $fotoUrl, $urlvacunacion, $urlVideo=null){

  
            if($_POST){
    
                $MascotasDAO = new MascotasDAO();

                $idUser = $_SESSION["DuenoId"];
                $mascota = new Mascota();
                $mascota->setId($MascotasDAO->returnIdPlus());
                $mascota->setIdDueño($idUser);
                $mascota->setNombre($nombre);
                $mascota->setRaza($raza);
                $mascota->setPeso($peso);
                $mascota->setFotoURL($fotoUrl);
                $mascota->setPlanVacURL($urlvacunacion);
                $mascota->setVideoURL($urlVideo);
    
                $MascotasDAO->Add($mascota);
    
                $this->DueñosDAO->agregarMascotaById($idUser,$mascota->getId());
    
                //echo "<script> if(confirm('Mascota agregada con exito')); </script>";
    
                $this->ListMascotasView();
                
    
            }
            else{
    
                 
            }
    
    
        }
           
}