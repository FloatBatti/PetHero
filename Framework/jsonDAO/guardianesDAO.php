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
                
                $valuesArray["id"]= $guardian->getId();
                $valuesArray["username"]= $guardian->getUsername();
                $valuesArray["dni"]= $guardian->getDni();
                $valuesArray["nombre"]= $guardian->getNombre();
                $valuesArray["apellido"]= $guardian->getApellido();
                $valuesArray["correoelectronico"]= $guardian->getCorreoelectronico();
                $valuesArray["password"]= $guardian->getPassword();
                $valuesArray["telefono"]= $guardian->getTelefono();
                $valuesArray["direccion"]= $guardian->getDescripcion();

                //Disponibilidad
                $valuesArray["disponibilidad"] = array();

                foreach($guardian->getDisponibilidad() as $dia){

                    $valuesArray["disponibilidad"][] = $dia;
                }

                //Tipo Mascota
                $valuesArray["tipoMascota"] = array();
                foreach($guardian->getTipoMascota() as $tamaño){

                    $valuesArray["tipoMascota"][] = $tamaño;
                }

                $valuesArray["horarioInicio"] = $guardian->getHorarioIncio();
                $valuesArray["horarioFin"] = $guardian->getHorarioFin();
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

            if(file_exists('Data/Guardianes.json'))
            {
                $jsonContent = file_get_contents('Data/Guardianes.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $guardian = new Guardian();
                    $guardian->setId($valuesArray["id"]);
                    $guardian->setUsername($valuesArray["username"]);
                    $guardian->setDni($valuesArray["dni"]);
                    $guardian->setNombre($valuesArray["nombre"]);
                    $guardian->setApellido($valuesArray["apellido"]);
                    $guardian->setCorreoelectronico($valuesArray["correoelectronico"]);
                    $guardian->setPassword($valuesArray["password"]);
                    $guardian->setTelefono($valuesArray["telefono"]);
                    $guardian->setDireccion($valuesArray["direccion"]);
                    
                    //Disponbilidad
                    foreach($valuesArray["disponibilidad"] as $dia){
                        $guardian->pushDisponibilidad($dia);
                    }
                    
                    //Tipo Mascota
                    foreach($valuesArray["tipoMascota"] as $tamaño){
                        $guardian->pushTipoMascota($tamaño);
                    }

                    $guardian->getHorarioIncio($valuesArray["horarioInicio"]);
                    $guardian->getHorarioFin($valuesArray["horarioFin"]);
                    $guardian->setFotoEspacioURL($valuesArray["fotoEspacioURL"]);
                    $guardian->setDescripcion($valuesArray["descripcion"]);

                    array_push($this->listaGuardianes, $guardian);
                }
            }
        }

        public function existeID($id){
            $lista=$this->listaGuardianes;
    
            foreach($lista as $guardian){
                if($id == $guardian->getId()){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function returnIdPlus(){

            $id = 0;

            foreach($this->GetAll() as $guardian) {
                
                if ($guardian->getId() > $id){

                    $id = $guardian->getId();
                }
            }

            return $id + 1;

        }
        public function encontrarGuardian($id){
            $lista=$this->listaGuardianes;
            
            foreach($lista as $guardian){
                if($id == $guardian->getId()){
                    return $guardian;
                }
                else{
                    return null;
                }
            }
        }

    }