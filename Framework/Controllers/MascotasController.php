<?php
namespace Controllers;

use DAO\DueñoDAO;
use DAO\MascotaDAO as MascotaDAO;
use Exception;
use Models\Alert as Alert;
use Models\Mascota as Mascota;
use Models\Archivos as Archivos;

class MascotasController{
    
    private $MascotasDAO;

    public function __construct(){

        $this->MascotasDAO = new MascotaDAO();
    }

    public function VistaMascotas(){

        $listaMascotas = $this->MascotasDAO->GetAll();
        require_once(VIEWS_PATH. "dashboardDueno/Mascotas.php");
       
    }

    public function VerRegistroGato(){

        $listaRazas = $this->MascotasDAO->listarRazas("Gato");
        require_once(VIEWS_PATH. "dashboardDueno/RegistroGato.php");

    }

    public function VerRegistroPerro(){

        $listaRazas = $this->MascotasDAO->listarRazas("Perro");
        require_once(VIEWS_PATH. "dashboardDueno/RegistroPerro.php");

    }

    public function VerFiltroMascotas(){

        require_once(VIEWS_PATH. "dashboardDueno/filtroRegistroMascota.php");
    }

    public function AddGato($nombre, $raza, $tamano ,$fotoGato,$fotoPlan, $videoUrl=null){

        $MascotasDAO = new MascotaDAO();

        $mascota = new Mascota();
        $mascota->setNombre($nombre);
        $mascota->setRaza($raza);
        $mascota->setEspecie("Perro");
        $mascota->setTamaño($tamano);
        
        $nameImgPerro = $mascota->getNombre() ."-". $fotoGato["name"];
        $nameImgPlan = $mascota->getNombre() ."-". $fotoPlan["name"];

        $mascota->setFotoURL($nameImgPerro);
        $mascota->setPlanVacURL($nameImgPlan);
        $mascota->setVideoURL($videoUrl);

        try{

            if($MascotasDAO->Add($mascota)){

                Archivos::subirArch("fotoGato", $fotoGato, "Mascotas/FotosMascotas/", $mascota->getNombre());
                Archivos::subirArch("fotoPlan", $fotoPlan, "Mascotas/PlanesVacunacion/", $mascota->getNombre());
                header("location:../Mascotas/VerFiltroMascotas");

            }
            throw new Exception("No se pudo agregar la mascota");

        }
        catch (Exception $ex){

            $alert = new Alert ($ex->getMessage(),"error");
            $this->VistaMascotas();
        }
        
    }

    public function AddPerro($nombre, $raza, $tamano ,$fotoPerro,$fotoPlan, $videoUrl=null){

        $MascotasDAO = new MascotaDAO();

        $mascota = new Mascota();
        $mascota->setNombre($nombre);
        $mascota->setRaza($raza);
        $mascota->setEspecie("Perro");
        $mascota->setTamaño($tamano);
        
        $nameImgPerro = $mascota->getNombre() ."-". $fotoPerro["name"];
        $nameImgPlan = $mascota->getNombre() ."-". $fotoPlan["name"];

        $mascota->setFotoURL($nameImgPerro);
        $mascota->setPlanVacURL($nameImgPlan);
        $mascota->setVideoURL($videoUrl);

        try{

            if($MascotasDAO->Add($mascota)){

                Archivos::subirArch("fotoPerro", $fotoPerro, "Mascotas/FotosMascotas/", $mascota->getNombre());
                Archivos::subirArch("fotoPlan", $fotoPlan, "Mascotas/PlanesVacunacion/", $mascota->getNombre());
                header("location:../Mascotas/VerFiltroMascotas");

            }
            throw new Exception("No se pudo agregar la mascota");

        }
        catch (Exception $ex){

            $alert = new Alert ($ex->getMessage(),"error");
            $this->VistaMascotas();
        }

        
    }


 
    
}