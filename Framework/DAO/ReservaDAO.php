<?php 
namespace DAO;

use Exception;

use Models\Reserva as Reserva;
class ReservaDAO{

    private $connection;

    public function crearReserva(Reserva $reserva){

        try{

            $query = "CALL crear_reserva (:fechaRerva, :fechaInicio, :fechaFin, :idUserGuardian, :idUserDueno, :idMascota, :costoTotal, :estado);";

            $parameters["fechaRerva"] = $reserva->getFecha();
            $parameters["fechaInicio"] = $reserva->getFechaInicio();
            $parameters["fechaFin"] = $reserva->getFechaFin();
            $parameters["idUserGuardian"] = $reserva->getGuardian()->getId();
            $parameters["idUserDueno"] = $_SESSION["UserId"];
            $parameters["idMascota"] = $reserva->getMascota()->getId();
            $parameters["costoTotal"] = $reserva->getCosto();
            $parameters["estado"] = $reserva->getEstado();

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        }
        catch(Exception $ex){

            throw $ex;

        }
    }

    public function listarReservasDueno(){


    }
}