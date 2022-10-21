<?php
namespace jsonDAO;

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

            if(file_exists('Data/Dueños.json'))
            {
                $jsonContent = file_get_contents('Data/Dueños.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    //Dueño
                    $dueño = new Dueño();
                    $dueño->setId($valuesArray["id"]);
                    $dueño->setUsername($valuesArray["username"]);
                    $dueño->setDni($valuesArray["dni"]);
                    $dueño->setNombre($valuesArray["nombre"]);
                    $dueño->setApellido($valuesArray["apellido"]);
                    $dueño->setCorreoelectronico($valuesArray["correoelectronico"]);
                    $dueño->setPassword($valuesArray["password"]);
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
                $valuesArray["username"] = $dueño->getUsername();
                $valuesArray["dni"] = $dueño->getDni();
                $valuesArray["nombre"] = $dueño->getNombre();
                $valuesArray["apellido"] = $dueño->getApellido();
                $valuesArray["correoelectronico"] = $dueño->getCorreoelectronico();
                $valuesArray["password"] = $dueño->getPassword();
                $valuesArray["telefono"] = $dueño->getTelefono();
                $valuesArray["direccion"] = $dueño->getDireccion();

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
            
            file_put_contents('Data/Dueños.json', $jsonContent);


    }

    public function returnIdPlus()
    {
        $id = 0;

        
        foreach ($this->GetAll() as $dueño) {

            if ($dueño->getId() > $id) {

                $id = $dueño->getId();
            }
        }

        return $id + 1;
    }

    public function checkDueño($dni, $mail){

        $flag = false;

        foreach($this->GetAll() as $dueño){
            
            if($dni == $dueño->getDni() or $mail == $dueño->getCorreoelectronico()){

                $flag = true;
            }

        }

        return $flag;
    }

    public function agregarMascotaById($id, $mascotaId){

        foreach ($this->GetAll() as $dueño){

            if ($dueño->getId() == $id){

                $dueño->pushMascotaId($mascotaId);
            }

        }

        $this->SaveData();

    }

    public function encontrarDueño($id){

        $lista=$this->listaDueños;
        
        foreach($lista as $dueño){
            if($id == $dueño->getId()){
                return $dueño;
            }
            else{
                return null;
            }
        }
    }

}