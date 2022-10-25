<?php
namespace Controllers;
use jsonDAO\GuardianesDAO;
use jsonDAO\DueñosDAO;
class HomeController{
    
    private $DueñosDAO;
    private $GuardianesDAO;
    
    public function __construct()
    {
        $this->GuardianesDAO = new GuardianesDAO();
        $this->DueñosDAO = new DueñosDAO();
    }
    
    public function Index(){

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH."index.php");

    }

    public function DashDuenoView(){

        if(isset($_SESSION["DuenoId"])){

            require_once(VIEWS_PATH."dashboardDueno/dashboardDueno.php");

        }
        
        
    }

    public function DashGuardianView(){

        if(isset($_SESSION["GuardianId"])){

            require_once(VIEWS_PATH."dashboardGuardian/dashGuardian.php");

        }
    }

    public function Login($username, $password){

        $flag = false;

        if($_POST){

            if($flag == false){

                foreach($this->DueñosDAO->GetAll() as $dueño){

                    if($dueño->getUsername() == $username and $dueño->getPassword() == $password){
    
                        $_SESSION["DuenoId"] = $dueño->getId();

                        $flag = true;
    
                        $this->DashDuenoView();
    
                    }
    
                }
    
            }
            

            if($flag == false){

                foreach($this->GuardianesDAO->GetAll() as $guardian){

                    if($guardian->getUsername() == $username and $guardian->getPassword() == $password){
    
                        $_SESSION["GuardianId"] = $guardian->getId();

                        $flag = true;
    
                        $this->DashGuardianView();
    
                    }
    
                }

            }

            if($flag == false){

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
        
        require_once(VIEWS_PATH."filtroRegistro.php");
    }
}
?>