<?php
namespace Controllers;
use DAO\UserDAO as UserDAO;
use \Exception as Exception;
class HomeController{
    
    private $UserDAO;
    
    public function __construct()
    {
        $this->UserDAO = new UserDAO();
    }
    
    public function Index(){

        require_once(VIEWS_PATH . "header.php");
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

        $usuario = $this->UserDAO->retornarUsuarioLogueado($username,$password);


        switch($usuario->getTipoUsuario()){

            case "G":$_SESSION["UserId"] = $usuario->getId();
            $this->DashGuardianView();
            break;

            case "D":$_SESSION["UserId"] = $usuario->getId();
            $this->DashDuenoView();
            break;

            default:
            $this->Index();
        }
        
    }

    public function LogOut(){
        
        unset($_SESSION["UserId"]);
        $this->Index();
    }

    public function Eleccion(){
        
        require_once(VIEWS_PATH."FiltroRegistro.php");
    }
}
?>