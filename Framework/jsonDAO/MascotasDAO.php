<?php 

namespace jsonDAO;
require_once("../Config/Autoload.php");

use Config\Autoload;
use Models\Mascota;
use jsonDAO\InterfaceDAO;

Autoload::Start();
class MascotasDAO implements InterfaceDAO{

    private $listMascotas = array();

    public function GetAll(){

        $this->RetrieveData();
        return $this->listMascotas;
        
    }
    public function Add($mascota){

        $this->RetrieveData();
            
            array_push($this->listMascotas, $mascota);

            $this->SaveData();

    }
    public function SaveData(){

        $arrayToEncode = array();

        foreach($this->listMascotas as $mascota)
        {
            
            $valuesArray["id"] = $mascota->getId();
            $valuesArray["idDueño"] = $mascota->getIdDueño();
            $valuesArray["nombre"] = $mascota->getNombre();
            $valuesArray["raza"] = $mascota->getRaza();
            $valuesArray["peso"] = $mascota->getPeso();
            $valuesArray["fotoURL"] = $mascota->getFotoURL();
            $valuesArray["planVacURL"] = $mascota->getPlanVacURL();
            $valuesArray["videoURL"] = $mascota->getVideoURL();


            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents("../Data/mascotas.json", $jsonContent);
    }
    public function RetrieveData(){

        $this->listMascotas = array();

        $jsonContent = file_get_contents("../Data/mascotas.json");

        $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, True) : array();

        foreach ($arrayToDecode as $valuesArray){

            $mascota = new Mascota();

            $mascota->setId($valuesArray["id"]);
            $mascota->setIdDueño($valuesArray["idDueño"]);
            $mascota->setNombre($valuesArray["nombre"]);
            $mascota->setRaza($valuesArray["raza"]);
            $mascota->setPeso($valuesArray["peso"]);
            $mascota->setFotoURL($valuesArray["fotoURL"]);
            $mascota->setPlanVacURL($valuesArray["planVacURL"]);
            $mascota->setVideoURL($valuesArray["videoURL"]);

            array_push($this->listMascotas, $mascota);

        }


    }

}


?>