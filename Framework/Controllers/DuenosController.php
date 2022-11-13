<?php

namespace Controllers;

use DAO\DueñoDAO as DueñoDAO;
use DAO\GuardianDAO;
use Models\Dueño as Dueño;
use DAO\UserDAO as UserDAO;
use Exception;
use Models\Archivos;
use Models\Alert;



class DuenosController
{

    private $DueñoDAO;
    private $UserDAO;

    public function __construct()
    {

        $this->DueñoDAO = new DueñoDAO();
        $this->UserDAO = new UserDAO();
    }

    public function VistaRegistro($alert = null)
    {
        require_once(VIEWS_PATH . "RegistroDueño.php");
    }

    public function VistaEditarPerfil()
    {
        try{

            if($usuario = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"])){

                require_once(VIEWS_PATH . "/DashboardDueno/editarPerfil.php");
            }

            throw new Exception("No se pudo editar perfil");

        }catch(Exception $ex){

            $alert=new Alert("warning", $ex->getMessage());
            $this->vistaDashboard();
        }   
    }
    public function vistaDashboard()
    {
        require_once(VIEWS_PATH . "DashboardDueno/Dashboard.php");
    }
    public function verMensajes(){
        
        require_once(VIEWS_PATH. "/DashboardDueno/verMensajes.php");
    }


    public function vistaGuardianes()
    {

        if (isset($_SESSION["UserId"])) {

            $guardianesDAO = new GuardianDAO();

            $listaGuardianes = $guardianesDAO->GetAll();

            require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");
        }
    }
    public function vistaFavoritos()
    {

        if (isset($_SESSION["UserId"])) {

            $guardianesDAO = new GuardianDAO();
            $listaGuardianes = $guardianesDAO->GetFavoritos();
            require_once(VIEWS_PATH . "DashboardDueno/Favoritos.php");
        }
    }

    public function borrarFavorito($idGuardian)
    {
        $usuarioDAO = new UserDAO();

        try{
            
            if($usuarioDAO->deleteFavorito($idGuardian)){

                header("location: ../Duenos/vistaFavoritos");

            }
            throw new Exception("Error al eliminar el guardian");

        }catch (Exception $ex){

                $alert=new Alert("danger", $ex->getMessage()); 
                      
                $this->vistaFavoritos();
            }
    }
        
    

    public function agregarFavorito($id){

        $usuarioDAO=new UserDAO();

        try{

            if($usuarioDAO->AddFavorito($id)){

                header("location: ../Duenos/vistaFavoritos");

            }
            throw new Exception("El guardian ya esta en favoritos");

        }catch(Exception $ex){

            $alert=new Alert("warning", $ex->getMessage());        
            $this->vistaFavoritos();
        }
    }    
 

    public function Add($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword, $fotoPerfil)
    {

        
        $dueño = new Dueño();
        $dueño->setUsername($username);
        $dueño->setDni($dni);
        $dueño->setNombre($nombre);
        $dueño->setApellido($apellido);
        $dueño->setCorreoelectronico($mail);
        $dueño->setTelefono($telefono);
        $dueño->setDireccion($direccion);

        $nameImg = $dueño->getUsername() ."-". $fotoPerfil["name"];

        $dueño->setFotoPerfil($nameImg);

        
        try{

            if(!$this->UserDAO->checkUsuario($username,$dni, $mail)){ 

                if($password == $rePassword){
    
                    $dueño->setPassword($password);

                    if($this->UserDAO->AddDueño($dueño)){

                        Archivos::subirArch("fotoPerfil", $fotoPerfil, "FotosUsuarios/", $dueño->getUsername());
                        
                        header("location: ../Home?alert=Perfil creado con exito. Puede loguearse");
                    }

                    throw new Exception("Error de servidor, intente nuevamente"); 
    
                }
                
                throw new Exception("Las contraseñas no coinciden"); 
            
    
            }
            
            throw new Exception("El usuario ya existe");


        }catch (Exception $ex){
            
            $this->VistaRegistro($ex->getMessage());

        }
        
    
          
            
    }
    
    
}
