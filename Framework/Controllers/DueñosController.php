<?php
namespace Controllers;

use jsonDAO\DueñosDAO as DueñosDAO;
use Models\Usuario as Usuario;
use Models\Dueño as Dueño;

class DueñosController{
    
    private $dueñosDao;

    public function __construct(){

        $this->dueñosDao = new DueñosDAO();
    }

    public function RegisterView(){

        include("../". VIEWS_PATH . "regDueño.php");
    }
    
    public function Add($username, $dni, $nombre,$apellido, $correoelectronico, $password, $telefono,$direccion)
        {
            $dueño = new Dueño();
            $dueño->setUsername($username);
            $dueño->setDni($dni);
            $dueño->setNombre($nombre);
            $dueño->setApellido($apellido);
            $dueño->setCorreoelectronico($correoelectronico);
            $dueño->setPassword($password);
            $dueño->setTelefono($telefono);
            $dueño->setDireccion($direccion);

            $this->dueñosDao->Add($dueño);

            header("../".VIEWS_PATH."index");
        }
}