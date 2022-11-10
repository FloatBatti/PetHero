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

    public function listarSolicitudesOrReservas($estado){ //Devuelve solicitudes o reservas del guardian dependendiendo del estado

        $guardianDAO = new GuardianDAO();
        $dueñoDAO = new DueñoDAO();
        $mascotaDAO = new MascotaDAO();

        $listaReservas = array();

        $query = "CALL listar_solicitud_reservas(:estado, :id_usuario);";

        $paramaters["estado"] = $estado;
        $paramaters["id_usuario"] = $_SESSION["UserId"];

        $this->connection = Connection::GetInstance();

        try{
                
            $resultSet = $this->connection->Execute($query, $paramaters);

            foreach($resultSet as $reg){

                $reserva = new Reserva();

                $reserva->setId($reg["id_reserva"]);
                $reserva->setFecha($reg["fecha_reserva"]);
                $reserva->setFechaInicio($reg["fecha_inicio"]);
                $reserva->setFechaFin($reg["fecha_fin"]);
                $reserva->setGuardian($guardianDAO->devolverGuardianPorId($_SESSION["UserId"]));
                $reserva->setDueño($dueñoDAO->devolverDueñoPorId($reg["dueño"]));
                $reserva->setMascota($mascotaDAO->devolverMasctotaPorId($reg["id_mascota"]));
                $reserva->setCosto($reg["costo_total"]);
                $reserva->setEstado($reg["estado"]);

                array_push($listaReservas, $reserva);
            }

            return $listaReservas;


        }catch(Exception $ex){

            throw $ex;
        }


    }

    public function rechazarSolicitud($idReserva){

        
        $query = "UPDATE reservas set estado= 'Rechazado' where id_reserva = :id_reserva;";

        $paramaters["id_reserva"] = $idReserva;

        $this->connection = Connection::GetInstance();

        try{

            return $this->connection->ExecuteNonQuery($query, $paramaters);

        }catch(Exception $ex){

            throw $ex;
        }
    }

    public function aceptarSolicitud($idReserva){

        $query = "UPDATE reservas set estado= 'Aceptada' where id_reserva = :id_reserva;";

        $paramaters["id_reserva"] = $idReserva;

        $this->connection = Connection::GetInstance();

        try{

            return $this->connection->ExecuteNonQuery($query,$paramaters);

        }catch(Exception $ex){

            throw $ex;
        }
    }

    public function listarReservasDueno(){ // GUARDAR NOMBRES EN VEZ DE OBJETO

        $guardianDAO = new GuardianDAO();
        $dueñoDAO = new DueñoDAO();
        $mascotaDAO = new MascotaDAO();

        $listaReservas = array();

        $query = "SELECT
        r.id_reserva,
        r.fecha_reserva,
        r.fecha_inicio,
        r.fecha_fin,
        g.id_usuario as guardian,
        r.id_mascota,
        r.costo_total,
        r.estado 
        from 
        reservas r
        inner join guardianes g on r.id_guardian = g.id_guardian
        inner join usuarios u on u.id_usuario = g.id_usuario
        where r.id_dueño = (select d.id_dueño from dueños d inner join usuarios u on d.id_usuario = u.id_usuario where u.id_usuario = :id_ususario);";

        $parameters["id_usuario"] = $_SESSION["UserId"];

        $this->connection = Connection::GetInstance();
        
        try{

            $resultSet = $this->connection->Execute($query, $parameters);
    
            foreach($resultSet as $reg){
    
                $reserva = new Reserva();

                $reserva->setId($reg["id_reserva"]);
                $reserva->setFecha($reg["fecha_reserva"]);
                $reserva->setFechaInicio($reg["fecha_inicio"]);
                $reserva->setFechaFin($reg["fecha_fin"]);
                $reserva->setGuardian($guardianDAO->devolverGuardianPorId($reg["guardian"]));
                $reserva->setDueño($dueñoDAO->devolverDueñoPorId($_SESSION["UserId"]));
                $reserva->setMascota($mascotaDAO->devolverMasctotaPorId($reg["id_mascota"]));
                $reserva->setCosto($reg["costo_total"]);
                $reserva->setEstado($reg["estado"]);

                array_push($listaReservas, $reserva);
            }

            return $listaReservas;

        }
        catch(Exception $ex){

            throw $ex;
        }


    }

    public function devolverReservaPorId($idReserva){

        $guardianDAO = new GuardianDAO();
        $dueñoDAO = new DueñoDAO();
        $mascotaDAO = new MascotaDAO();

        $query = "SELECT
        r.id_reserva,
        r.fecha_reserva,
        r.fecha_inicio,
        r.fecha_fin,
        d.id_usuario as dueño,
        r.id_mascota,
        r.costo_total,
        r.estado 
        from 
        reservas r
        inner join dueños d on r.id_dueño = d.id_dueño
        inner join usuarios u on u.id_usuario = d.id_usuario
        where r.id_guardian = (select g.id_guardian from guardianes g inner join usuarios u on g.id_usuario = u.id_usuario where u.id_usuario =". $_SESSION["UserId"].")
        and r.id_reserva = ". $idReserva. ";";

        $this->connection = Connection::GetInstance();

        try{
    
            $resultSet = $this->connection->Execute($query);

            $reserva = new Reserva();
    
            foreach($resultSet as $reg){
    
                $reserva->setId($reg["id_reserva"]);
                $reserva->setFecha($reg["fecha_reserva"]);
                $reserva->setFechaInicio($reg["fecha_inicio"]);
                $reserva->setFechaFin($reg["fecha_fin"]);
                $reserva->setGuardian($guardianDAO->devolverGuardianPorId($_SESSION["UserId"]));
                $reserva->setDueño($dueñoDAO->devolverDueñoPorId($reg["dueño"]));
                $reserva->setMascota($mascotaDAO->devolverMasctotaPorId($reg["id_mascota"]));
                $reserva->setCosto($reg["costo_total"]);
                $reserva->setEstado($reg["estado"]);
            }

            return $reserva;

        }catch(Exception $ex){

            throw $ex;
        }
    }
}