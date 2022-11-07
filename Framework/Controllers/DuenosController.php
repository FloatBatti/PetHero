<?php
namespace Controllers;

use DAO\DueñoDAO as DueñoDAO;
use DAO\GuardianDAO;
use Models\Dueño as Dueño;
use DAO\UserDAO as UserDAO;
use Exception;



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

        $usuario=$this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);
        require_once(VIEWS_PATH . "/DashboardDueno/editarPerfil.php");
       
    }
    




    public function vistaGuardianes(){
        
        if(isset($_SESSION["UserId"])){
            
            $DAOGuardianes=new GuardianDAO();
            $listaGuardianes=$DAOGuardianes->GetAll();
            require_once(VIEWS_PATH."DashboardDueno/Guardianes.php");

        }

    }
    public function vistaFavoritos(){
        
        if(isset($_SESSION["UserId"])){
            
            $DAOGuardianes=new GuardianDAO();
            $listaGuardianes=$DAOGuardianes->GetFavoritos();
            require_once(VIEWS_PATH."DashboardDueno/Favoritos.php");

        }
    }
    public function agregarFavorito($id){

        $DAOusuarios=new UserDAO();
        $usuarios=$DAOusuarios->AddFavorito($id);

    }
   public function borrarFavorito($idGuardian){
        $DAOusuarios=new UserDAO();
        $usuarios=$DAOusuarios->deleteFavorito($idGuardian);
   }
    
    

    public function RegistroTerminado(){

        
        //require_once(VIEWS_PATH . "index.php");

        header("Location: ../Views/index.php");
    }

    public function Add($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion,$password, $rePassword, $fotoPerfil)
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

                
                $nameImg = $dueño->getUsername()."-".$fotoPerfil["name"];
                $temp_name = $fotoPerfil["tmp_name"];
                $error = $fotoPerfil["error"];
                $size = $fotoPerfil["size"];
                $type = $fotoPerfil["type"];

                
                if(!$error){

                    $rutaImagen = FRONT_ROOT. "assets/FotosUsuarios/". $nameImg;
                    move_uploaded_file($temp_name, $rutaImagen);

                    $dueño->setFotoPerfil($nameImg);

                }

                if(!$this->UserDAO->checkUsuario($username,$dni, $mail)){ 
    
                    if($password == $rePassword){
    
                        $dueño->setPassword($password);

                        if($this->UserDAO->AddDueño($dueño)){

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

         
        
           
}