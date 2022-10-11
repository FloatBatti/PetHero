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

    public function add($username, $dni, $nombre,$apellido, $correoelectronico, $password, $telefono,$direccion)
        {
            $dueño = new Dueño();
            $dueño->set_username($username);
            $dueño->set_dni($dni);
            $dueño->set_nombre($nombre);
            $dueño->set_apellido($apellido);
            $dueño->set_correoelectronico($correoelectronico);
            $dueño->set_password($password);
            $dueño->setTelefono($telefono);
            $dueño->setDireccion($direccion);

            $this->dueñosDao->Add($dueño);

            $this->ShowAddView();
        }
}