<?php
    namespace jsonDAO;
    
    use jsonDAO\InterfaceDAO as InterfaceDAO; 
    use Models\Guardian as Guardian;

    class GuardianesDAO implements InterfaceDAO{

        private $listaGuardianes=array();

        public function Add($guardian)
        {
            $this->RetrieveData();
            
            array_push($this->listaGuardianes, $guardian);

            $this->SaveData();
        }
        public function GetAll()
        {
            $this->RetrieveData();

            return $this->listaGuardianes;
        }

        public function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->listaGuardianes as $guardian)
            {
                $valuesArray["disponibilidad"] = $guardian->getDisponibilidad();
                $valuesArray["tipoMascota"] = $guardian->getTipoMascota();
                $valuesArray["fotoEspacioURL"] = $guardian->getFotoEspacioURL();
                $valuesArray["descripcion"] = $guardian->getDescripcion();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/Guardianes.json', $jsonContent);
        }
        public function RetrieveData()
        {
            $this->listaGuardianes = array();

            if(file_exists('../Data/Guardianes.json'))
            {
                $jsonContent = file_get_contents('../Data/Guardianes.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $guardian = new Guardian();
                    $guardian->setId($valuesArray["id"]);
                    $guardian->set_username($valuesArray["username"]);
                    $guardian->set_dni($valuesArray["dni"]);
                    $guardian->set_nombre($valuesArray["nombre"]);
                    $guardian->set_apellido($valuesArray["apellido"]);
                    $guardian->set_correoelectronico($valuesArray["correoelectronico"]);
                    $guardian->set_password($valuesArray["password"]);
                    $guardian->setTelefono($valuesArray["telefono"]);
                    $guardian->setDireccion($valuesArray["direccion"]);
                    
                    
                    $guardian->setDisponibilidad($valuesArray["disponibilidad"]);
                    $guardian->setTipoMascota($valuesArray["tipoMascota"]);
                    $guardian->setFotoEspacioURL($valuesArray["fotoEspacioURL"]);
                    $guardian->setDescripcion($valuesArray["descripcion"]);

                    array_push($this->listaGuardianes, $guardian);
                }
            }
        }





    }