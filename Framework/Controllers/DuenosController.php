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

                    $rutaImagen = VIEWS_PATH. "FotoUsuarios/". $nameImg;
                    move_uploaded_file($temp_name, $rutaImagen);

                    $dueño->setFotoPerfil($nameImg);

                }

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

         
        
           
}