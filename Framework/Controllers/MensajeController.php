<?php 
namespace Controllers;

use Models\Mensaje as Mensaje;
use DAO\MensajeDAO as MensajeDAO;
use DAO\UserDAO as UserDAO;
use Models\Usuario as Usuario;
use Exception;
use Models\Alert;

    class MensajeController{
        private $mensajeDAO;
        private $usersDAO;

    public function __construct()
    {
        $this->mensajeDAO=new MensajeDAO();
        $this->usersDAO = new UserDAO();
    }

    public function vistaChat($id){
        
        if(isset($_SESSION["UserId"])){
            if($listaMensajes=$this->mensajeDAO->GetMsg($id)){
                $usuario=$this->interlocutor($listaMensajes[0]);
                if($_SESSION["Tipo"]=="D"){
                    
                    require_once(VIEWS_PATH."/DashboardDueno/Mensajes.php");
                }else{
                    require_once(VIEWS_PATH."/DashboardGuardian/Mensajes.php");
                }
        
            }
            
        }
    }
    public function interlocutor($mensaje){
            if($mensaje->getEmisor() != $_SESSION["UserId"]){
                
                $usuario=$this->usersDAO->retornarNombrePorId($mensaje->getEmisor());
                
            }else{
                $usuario=$this->usersDAO->retornarNombrePorId($mensaje->getReceptor());
            }
            return $usuario; 

    }
    public function bandejaEntrada(){
        if(isset($_SESSION["UserId"])){
            if($bandeja=$this->mensajeDAO->traerBandeja()){
                switch($_SESSION["Tipo"]){
                    case "D":
                        require_once(VIEWS_PATH."/DashboardDueno/verMensajes.php");
                    break;
                    case "G":
                        require_once(VIEWS_PATH."/DashboardGuardian/verMensajes.php");
                    break;
                }

            }else{
                switch($_SESSION["Tipo"]){
                    case "D":
                        require_once(VIEWS_PATH."/DashboardDueno/Dashboard.php");
                    break;
                    case "G":
                        require_once(VIEWS_PATH."/DashboardGuardian/Dashboard.php");
                    break;
            } 

        }
    }else{
        header("location: ../Home");
    }
    }
    public function nuevoMensaje($id,$nombre){
        if(isset($_SESSION["UserId"])){
            if($_SESSION["Tipo"]=="D"){
                
                require_once(VIEWS_PATH."DashboardDueno/enviarNuevoMensaje.php");
           
            }else{
                header("location: ../Home");
            } 
        }else{
            header("location: ../Home");
        }         
    }
    public function Add($id,$chat){
        
        if(isset($_SESSION["UserId"])){
        
            $mensaje=new Mensaje();
            $mensaje->setEmisor($_SESSION["UserId"]);
            $mensaje->setReceptor($id);
            $mensaje->setContenido($chat);

        try{
            if($this->mensajeDAO->Add($mensaje)){
                
                header("location: ../Mensaje/vistaChat?id=$id");
                                
            }
                throw new Exception("No se pudo enviar el mensaje..."); 
               

        }catch (Exception $ex){
            
           $alert=new Alert("alert alert-primary",$ex->getMessage());
            //header("location: ../Home");

        }

        }
    }
}
?>