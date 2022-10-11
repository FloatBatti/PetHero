<?php
namespace jsonDAO;

include("../Views/header.php");

use Models\Dueño as Dueño;
use jsonDAO\InterfaceDAO as InterfaceDAO; 

class DueñosDAO implements InterfaceDAO{
    
    private $listaDueños= array();


    public function GetAll(){
        
        $this->RetrieveData();

        return $this->listaDueños;
    }

    public function RetrieveData(){

        $this->listaDueños = array();

            if(file_exists('../Data/Dueños.json'))
            {
                $jsonContent = file_get_contents('../Data/Dueños.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    //Dueño
                    $dueño = new Dueño();
                    $dueño->setId($valuesArray["id"]);
                    $dueño->set_username($valuesArray["username"]);
                    $dueño->set_dni($valuesArray["dni"]);
                    $dueño->set_nombre($valuesArray["nombre"]);
                    $dueño->set_apellido($valuesArray["apellido"]);
                    $dueño->set_correoelectronico($valuesArray["correoelectronico"]);
                    $dueño->set_password($valuesArray["password"]);
                    $dueño->setTelefono($valuesArray["telefono"]);
                    $dueño->setDireccion($valuesArray["direccion"]);
                    
                    //Guardianes Favoritos
                    foreach($valuesArray["guardianesFav"] as $guardianId){
                     
                        $dueño->agregarGuardFav($guardianId);

                    }

                    //Mascotas
                    foreach($valuesArray["mascotas"] as $mascotaId){
                     
                        $dueño->agregarMascota($mascotaId);

                    }

                    
                    array_push($this->listaDueños, $dueño);
                }
            }


    }

    public function Add($dueño){

        $this->RetrieveData();
            
            array_push($this->listaDueños, $dueño);

            $this->SaveData();

    }

    public function SaveData(){
        
        $arrayToEncode = array();

            foreach($this->listaDueños as $dueño)
            {
                $valuesArray["id"] = $dueño->getId();
                $valuesArray["username"] = $dueño->get_username();
                $valuesArray["dni"] = $dueño->get_dni();
                $valuesArray["nombre"] = $dueño->get_nombre();
                $valuesArray["apellido"] = $dueño->get_apellido();
                $valuesArray["correoelectronico"] = $dueño->get_correoelectronico();
                $valuesArray["password"] = $dueño->get_password();
                $valuesArray["telefono"] = $dueño->getTelefono();
                $valuesArray["direccion"] = $dueño->getDireccion();
                $valuesArray["reviews"] = $dueño->getReviews();

                //Guardianes Favoritos
                $valuesArray["guardianesFav"] = array();

                foreach($dueño->getGuardianesFav() as $guardianId){

                    $valuesArray["guardianesFav"][] = $guardianId;
            
                }

                //Mascotas
                $valuesArray["mascotas"]= array();

                foreach($dueño->getMascotas() as $mascotaId){

                    $valuesArray["mascotas"][] = $mascotaId;
            
                }

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('../Data/Dueños.json', $jsonContent);


    }

}