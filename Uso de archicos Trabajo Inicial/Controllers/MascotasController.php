<?php
namespace Controllers;

use jsonDAO\DueñosDAO;
use jsonDAO\MascotasDAO;

use Models\Mascota as Mascota;

class MascotasController{
    
    private $MascotasDAO;

    public function __construct(){

        $this->MascotasDAO = new MascotasDAO();
    }
    
}