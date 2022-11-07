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
        
        if($password==$rePassword){
            
            $this->userDAO->grabarDatosActualizados($telefono,$direccion,$password);
        
            header("location: ../Duenos/vistaDashboard");

        }
        else{
            throw new Exception;
        }
        

    }


}



?>



