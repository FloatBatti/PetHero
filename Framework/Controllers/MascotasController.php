<?php
namespace Controllers;

use DAO\DueñoDAO;
use DAO\MascotaDAO as MascotaDAO;

use Models\Mascota as Mascota;

class MascotasController{
    
    private $MascotasDAO;

    public function __construct(){

        $this->MascotasDAO = new MascotaDAO();
    }

    public function VistaMascotas(){

       
    }

    public function VerRegistroPerro(){

        $listaRazas = $this->MascotasDAO->listarRazas("Perro");
        require_once(VIEWS_PATH. "dashboardDueno/RegistroPerro.php");

    }

    public function VerFiltroMascotas(){

        require_once(VIEWS_PATH. "dashboardDueno/filtroRegistroMascota.php");
    }

    public function AddGato(){}

    public function AddPerro($nombre, $raza, $tamano, $planVacunacion, $videoUrl, $fotoPerfil){

        
        var_dump($_FILES);


        
        /*
        $MascotasDAO = new MascotaDAO();

        $mascota = new Mascota();
        $mascota->setNombre($nombre);
        $mascota->setRaza($raza);
        $mascota->setEspecie("Perro");
        $mascota->setTamaño($tamano);

        
        $mascota->setFotoURL($foto);
        $mascota->setPlanVacURL($fotoVacunacion);
        $mascota->setVideoURL($video);

        echo "<pre>"; 
        var_dump($mascota);
        echo"</pre>";


        //FOTO MASCOTA
        $nameImg = $mascota->getNombre()."-User".$_SESSION["UserId"]."-".$foto["name"];
        $temp_name = $foto["tmp_name"];
        $error = $foto["error"];
        $size = $foto["size"];
        $type = $foto["type"];

        if(!$error){

            $rutaImagen = FRONT_ROOT. "assets/Mascotas/FotosMascotas". $nameImg;
            move_uploaded_file($temp_name, $rutaImagen);
        }

        //FOTO VACUNACION
        $nameImg = $mascota->getNombre()."-Plan"."-User".$_SESSION["UserId"]."-".$fotoVacunacion["name"];
        $temp_name = $fotoVacunacion["tmp_name"];
        $error = $fotoVacunacion["error"];
        $size = $fotoVacunacion["size"];
        $type = $fotoVacunacion["type"];

        if(!$error){

            $rutaImagen = FRONT_ROOT. "assets/Mascotas/PlanesVacunacion". $nameImg;
            move_uploaded_file($temp_name, $rutaImagen);
        }

        $MascotasDAO->Add($mascota);


        echo "<script> if(confirm('Mascota agregada con exito')); </script>";

        $this->vistaMascotas();

        */
    }
 
    
}