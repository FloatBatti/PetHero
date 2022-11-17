<?php

namespace jsonDAO;

use jsonDAO\InterfaceDAO as InterfaceDAO;
use Models\Reserva;
use Models\Reservas as Reservas;

class ReservasDAO implements InterfaceDAO
{
    private $listaReservas = array();

    public function Add($reserva)
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

    public function RetrieveData()
    {

        $this->listaReservas = array();

        if (file_exists("Data/Reservas.json")) {


            $jsonContent = file_get_contents("Data/Reservas.json");

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, True) : array();

            foreach ($arrayToDecode as $valuesArray) {

                $reservas = new Reserva();

                $reservas->setId($valuesArray["id"]);
                $reservas->setFecha($valuesArray["fecha"]);
                $reservas->setFechaInicio($valuesArray["fechaInicio"]);
                $reservas->setFechaFin($valuesArray["fechaFin"]);
                $reservas->setMascotaID($valuesArray["mascotaID"]);
                $reservas->setGuardianID($valuesArray["guardianID"]);
                $reservas->setDueñoID($valuesArray["dueñoID"]);
                $reservas->setCosto($valuesArray["costo"]);
                $reservas->setEstado($valuesArray["estado"]);

                array_push($this->listaReservas, $reservas);
            }
        }
    }

    public function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->listaReservas as $reserva) {
            $valuesArray["id"] = $reserva->getId();
            $valuesArray["fecha"] = $reserva->getFecha();
            $valuesArray["fechaInicio"] = $reserva->getFechaInicio();
            $valuesArray["fechaFin"] = $reserva->getFechaFin();
            $valuesArray["mascotaID"] = $reserva->getMascotaID();
            $valuesArray["guardianID"] = $reserva->getGuardianID();
            $valuesArray["dueñoID"] = $reserva->getDueñoID();
            $valuesArray["costo"] = $reserva->getCosto();
            $valuesArray["estado"] = $reserva->getEstado();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents('Data/reservas.json', $jsonContent);
    }

    public function returnIdPlus()
    {
        $id = 0;

        foreach ($this->GetAll() as $reserva) {

            if ($reserva->getId() > $id) {

                $id = $reserva->getId();
            }
        }

        return $id + 1;
    }
}
