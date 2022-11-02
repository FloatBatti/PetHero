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

            //require_once(VIEWS_PATH."dashboardGuardian/");

        }
    }

    public function Login($username, $password){


        if($_POST){

            $homeSet= $this->UserDAO->returnLogedUser($username,$password);

            if($homeSet){

                if($homeSet[0] == "G"){

                    $_SESSION["UserId"] = $homeSet[1];
                    $this->DashGuardianView();
                    
                }
                else if($homeSet[0] == "D"){
                
                    $_SESSION["UserId"] = $homeSet[1];
                    $this->DashDuenoView();
                }

            }
            else{

                echo "<script> if(confirm('Usuario no encontrado')); </script>";
                $this->Index();
            }

        }  

    }

    public function LogOut(){
        session_destroy();
        $this->Index();
    }

    public function Eleccion(){
        
        require_once(VIEWS_PATH."FiltroRegistro.php");
    }
}
?>