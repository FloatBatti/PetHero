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
                require_once(VIEWS_PATH."Mensajes.php");
            }

            
        }
    }
    public function interlocutor($mensaje){
            if($mensaje->getEmisor()== $_SESSION["UserId"]){
                
                $usuario=$this->usersDAO->retornarNombrePorId($mensaje->getReceptor());
                return $usuario;
            }
            

    } 
    public function Add($id,$chat){

        if(isset($_SESSION["UserId"])){
        
            $mensaje=new Mensaje();

            $mensaje->setFecha(date("Y-m-d"));
            $mensaje->setEmisor($_SESSION["UserId"]);
            $mensaje->setReceptor($id);
            $mensaje->setContenido($chat);

        try{
            if($this->mensajeDAO->Add($mensaje)){
                //header("location: ../Mensaje/vistaChat");
                header("location: ../Home");
            }
            $type = "alert alert-primary";
                throw new Exception("No se pudo enviar el mensaje..."); 

        }catch (Exception $ex){

            $alert = new Alert($type, $ex->getMessage());
            header("location: ../Home");

        }

        }
    }
}
?>