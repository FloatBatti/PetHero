<?php
namespace Controllers;


use jsonDAO\MascotasDAO;

use Models\Mascota as Mascota;

class MascotasController{
    
    //private $MascotasDAO;

    public function __construct(){

        //$this->MascotasDAO = new MascotasDAO();
    }

    public function VistaMascotas(){

       
    }

    public function VistaRegistroMascota(){

        require_once(VIEWS_PATH . "DashboardDueno/RegistroMascota.php");
    }
    
    public function VerFiltroMascotas(){

        require_once(VIEWS_PATH. "dashboardDueno/filtroMascota.php");
    }

    public function Add($nombre, $raza, $peso, $fotoUrl, $urlvacunacion, $urlVideo=null){

        
                  if($_POST){
          
                      $MascotasDAO = new MascotasDAO();
      
                      $idUser = $_SESSION["DuenoId"];
                      $mascota = new Mascota();
                      $mascota->setId($MascotasDAO->returnIdPlus());
                      $mascota->setNombre($nombre);
                      $mascota->setRaza($raza);
                      $mascota->setPeso($peso);
                      $mascota->setFotoURL($fotoUrl);
                      $mascota->setPlanVacURL($urlvacunacion);
                      $mascota->setVideoURL($urlVideo);
          
                      $MascotasDAO->Add($mascota);
          
                      $this->DueñoDAO->agregarMascotaById($idUser,$mascota->getId());
          
                      echo "<script> if(confirm('Mascota agregada con exito')); </script>";
          
                      $this->vistaMascotas();
                  }
                  else{       
                  }
      
                  
          }
    
}