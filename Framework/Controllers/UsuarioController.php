<?php
namespace Controllers;

use DAO\UserDAO;
use Exception;

class UsuarioController{

    private $userDAO;

    function __construct(){

        $this->userDAO=new UserDAO();
    }


    public function ActualizarDatos($telefono,$direccion,$password,$rePassword){
        
        if(isset($_SESSION["UserId"])){

            if($password==$rePassword){
                
                $this->userDAO->grabarDatosActualizados($telefono,$direccion,$password);
            
                header("location: ../Home");

            }
            else{
                throw new Exception;
            }
        }

    }


}



?>



