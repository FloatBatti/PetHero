<?php
namespace Controllers;

use DAO\UserDAO;

class UsuarioControllers{

    private $userDAO;

    function __construct(){

        $this->userDAO=new UserDAO();
    }


    public function ActualizarDatos($telefono,$direccion,$password){
        

        $this->userDAO->grabarDatosActualizados($telefono,$direccion,$password);
        
        header("location: ../Home/Index");

    }


}



?>



