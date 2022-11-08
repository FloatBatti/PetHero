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

       
    }

    public function VerRegistroPerro(){

        $listaRazas = $this->MascotasDAO->listarRazas("Perro");
        require_once(VIEWS_PATH. "dashboardDueno/RegistroPerro.php");

    }

    public function VerFiltroMascotas(){

        require_once(VIEWS_PATH. "dashboardDueno/filtroRegistroMascota.php");
    }

    public function AddGato($nombre, $raza, $tamano, $archivos ,$videoUrl){

        echo "<pre>";
        var_dump($archivos); 
        echo"</pre>";


        $MascotasDAO = new MascotaDAO();

        $mascota = new Mascota();
        $mascota->setNombre($nombre);
        $mascota->setRaza($raza);
        $mascota->setEspecie("Perro");
        $mascota->setTamaño($tamano);

        
        $mascota->setFotoURL($archivos[0]);
        $mascota->setPlanVacURL($archivos[1]);
        $mascota->setVideoURL($videoUrl);

    
/*
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
        */


        try{

            $var = $MascotasDAO->Add($mascota);
            var_dump($var);
            if($var){

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

        
        echo "<pre>";
        var_dump($fotoPerro); 
        echo"</pre>";
        
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