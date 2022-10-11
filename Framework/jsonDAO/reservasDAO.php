<?php
    namespace jsonDAO;

    use jsonDAO\InterfaceDAO as InterfaceDAO;
    use Models\Reservas as Reservas;

    class ReservasDAO implements InterfaceDAO
    {
        private $listaReservas = array();

        public function Add(Reserva $reserva)
        {
            $this->RetrieveData();
            
            array_push($this->listaReservas, $reserva);

            $this->SaveData();
        }
        public function GetAll()
        {
            $this->RetrieveData();

            return $this->listaReservas;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->listaReservas as $reserva)
            {
                $valuesArray["id"] = $reserva->getId();
                $valuesArray["fecha"] = $reserva->getFecha();
                $valuesArray["fechaInicio"] = $reserva->getFechaInicio();
                $valuesArray["fechaFin"] = $reserva->getFechaFin();
                $valuesArray["mascota"] = $reserva->getMascota();
                $valuesArray["guardian"] = $reserva->getGuardian();
                $valuesArray["dueño"] = $reserva->getDueño();
                $valuesArray["costo"] = $reserva->getCosto();
                $valuesArray["estado"] = $reserva->getEstado();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/reservas.json', $jsonContent);
        }

        



    }