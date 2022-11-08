<?php

namespace Controllers;

use DAO\DueñoDAO as DueñoDAO;
use DAO\GuardianDAO;
use Models\Dueño as Dueño;
use DAO\UserDAO as UserDAO;
use Exception;
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

    public function VistaRegistro()
    {

        require_once(VIEWS_PATH . "RegistroDueño.php");
    }

    public function EditarPerfil()
    {
        try{
            if($usuario = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"])){
                require_once(VIEWS_PATH . "/DashboardDueno/editarPerfil.php");
            }
            throw new Exception("error");
        }catch(Exception $ex){
            $alert=new Alert($ex->getMessage(),"error");
            $this->vistaDashboard();
        }   
    }
    public function vistaDashboard()
    {
        require_once(VIEWS_PATH . "DashboardDueno/Dashboard.php");
    }




    public function vistaGuardianes()
    {

        if (isset($_SESSION["UserId"])) {

            $DAOGuardianes = new GuardianDAO();
            $listaGuardianes = $DAOGuardianes->GetAll();
            require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");
        }
    }
    public function vistaFavoritos()
    {

        if (isset($_SESSION["UserId"])) {

            $DAOGuardianes = new GuardianDAO();
            $listaGuardianes = $DAOGuardianes->GetFavoritos();
            require_once(VIEWS_PATH . "DashboardDueno/Favoritos.php");
        }
    }

    public function borrarFavorito($idGuardian)
    {
        try{
            $DAOusuarios = new UserDAO();
            if($DAOusuarios->deleteFavorito($idGuardian)){
                header("location: ../Duenos/vistaFavoritos");
            }throw new Exception("Error al eliminar el guardian...");
        }catch (Exception $ex){
                $aler=new Alert($ex->getMessage(),"error");        
                $this->vistaFavoritos();
            }
    }
        
    

    public function agregarFavorito($id){
        try{
            $DAOusuarios=new UserDAO();
            if($DAOusuarios->AddFavorito($id)){
                header("location: ../Duenos/vistaFavoritos");
            }throw new Exception("El guardian ya esta en favoritos");
        }catch(Exception $ex){
            $aler=new Alert($ex->getMessage(),"error");        
            $this->vistaFavoritos();
        }
    }    
 
    public function RegistroTerminado()
    {


        //require_once(VIEWS_PATH . "index.php");

        header("Location: ../Views/index.php");
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

        echo "<pre>";
        var_dump($fotoPerfil); 
        echo"</pre>";

        $nameImg = $dueño->getUsername() ."-". $fotoPerfil["name"];

        $dueño->setFotoPerfil($nameImg);

        $temp_name = $fotoPerfil["tmp_name"];
        $error = $fotoPerfil["error"];
        $size = $fotoPerfil["size"];
        $type = $fotoPerfil["type"];


        if(!$this->UserDAO->checkUsuario($username,$dni, $mail)){ 

            if($password == $rePassword){

                $dueño->setPassword($password);

                if($this->UserDAO->AddDueño($dueño)){

                    if(!$error){

                        $rutaImagen = UPLOAD_FILE. "FotosUsuarios\\" . $nameImg;
                        move_uploaded_file($temp_name, $rutaImagen);
                    }

                    header("location: ../Home");
                }

                throw new Exception("El guardian no pudo registrarse"); //Mensaje que funciona como alert
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
