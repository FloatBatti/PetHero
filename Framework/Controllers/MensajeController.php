<?php 
namespace Controllers;

    class MensajeController{

    public function vistaChat(){
        
        if(isset($_SESSION["UserId"])){
            require_once(VIEWS_PATH."Mensajes.php");
        }
    }   

}
?>