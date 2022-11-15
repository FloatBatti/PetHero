<?php
namespace Controllers;
use DAO\UserDAO as UserDAO;
use \Exception as Exception;
use Models\Alert;

class HomeController{
    
    private $UserDAO;
    
    public function __construct()
    {
        $this->UserDAO = new UserDAO();
    }
    
    public function Index($alert=null){

        require_once(VIEWS_PATH."index.php");

    }

    public function DashDuenoView(){

        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH."DashboardDueno/Dashboard.php");

        }
        
    }

    public function DashGuardianView(){

        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH."dashboardGuardian/Dashboard.php");

        }
    }

    public function Login($username, $password){

        
        try{

            if($username and $password){

                $usuario = $this->UserDAO->retornarUsuarioLogueado($username);

                if($usuario){
                
                    if($usuario->getPassword() == $password){

                        switch($usuario->getTipoUsuario()){
        
                            case "G":
                            $_SESSION["UserId"] = $usuario->getId();
                            $_SESSION["Tipo"]=$usuario->getTipoUsuario();
                            $this->DashGuardianView();
                            break;
                
                            case "D":
                            $_SESSION["UserId"] = $usuario->getId();
                            $_SESSION["Tipo"]=$usuario->getTipoUsuario();
                            $this->DashDuenoView();
                            break;
                        }

                    }
                    else{

                        throw new Exception("Contraseña Incorrecta");
                    }   
                }
                else{
                    throw new Exception("Usuario o contraseña incorrecta. Si no tiene una cuenta, registrese");
                }
            }
            else{
                throw new Exception("Complete todos los campos");
            }

        }catch(Exception $ex){

            header("location: ../Home?tipo=danger&alert=".$ex->getMessage());

        }
            
        
    }

    public function LogOut(){
        
        unset($_SESSION["UserId"]);
        unset($_SESSION["Tipo"]);
        $this->Index();
    }

    public function Eleccion($alert = null){
        
        require_once(VIEWS_PATH."FiltroRegistro.php");
    }
}
?>