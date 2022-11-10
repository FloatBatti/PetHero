<?php
namespace Controllers;

use Models\Dueño as Dueño;
use DAO\DueñoDAO as DueñosDAO;
use Models\Guardian as Guardian;
use DAO\GuardianDAO as GuardianDAO;
use DAO\MascotaDAO as MascotaDAO;
use DAO\ReservaDAO as ReservaDAO;
use Exception;
use Models\Reserva as Reserva;
use Models\Alert as Alert;
use Models\Mail as Mail;

class ReservasController{
    
    private $ReservaDAO;
    private $GuardianeDAO;
    private $MascotaDAO;
    private $DueñoDAO;


    public function __construct(){

        $this->ReservaDAO = new ReservaDAO();
        $this->GuardianDAO = new GuardianDAO();
        $this->MascotaDAO = new MascotaDAO();
        $this->DueñoDAO = new DueñosDAO();
    }

    public function Add(){

        try{

            $reserva=unserialize($_SESSION["Reserva"]);
            unset($_SESSION["Reserva"]);

            if($this->ReservaDAO->crearReserva($reserva)){

                header("location: ../Reservas/VerReservasDueno");   
            }
            throw new Exception("No se pudo crear la reserva, intente nuevamente");

        }catch(Exception $ex){

            $alert=new Alert($ex->getMessage(),"error");
        } 

    }

    public function VerConfimacion()
    {
        $reserva=unserialize($_SESSION["Reserva"]);
        require_once(VIEWS_PATH. "DashboardDueno/ConfirmarSolicitud.php");
    }

    public function VerReservasDueno(){

        $listaReservas = $this->ReservaDAO->listarReservasDueno();
        require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");
    }

    public function VerReservasGuardian(){

        $listaReservas = $this->ReservaDAO->listarSolicitudesOrReservas("Aceptada");
        require_once(VIEWS_PATH. "DashboardGuardian/Reservas.php");
    }

    public function VerSolicitudesGuardian(){

        $listaSolicitudes = $this->ReservaDAO->listarSolicitudesOrReservas("Pendiente");
        
        require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");
    }

    public function AceptarSolicitud($idReserva){

        /*
        try{

            if($this->ReservaDAO->aceptarSolicitud($idReserva)){

                $mail= new Mail();

                $reserva = $this->ReservaDAO->

                $mail->enviarMail()

                header("location: ../Reservas/VerReservasGuardian");
            }
            throw new Exception("No se pudo aceptar la solicitud");

        }catch(Exception $ex){

            $alert= new Alert($ex->getMessage(),"error");

        }
        */

    }


    public function RechazarSolicitud($idReserva){

        try{

            if($this->ReservaDAO->rechazarSolicitud($idReserva)){

                header("location: ../Reservas/VerSolicitudesGuardian");
            }
            throw new Exception("No se pudo rechazar la solicitud");

        }catch(Exception $ex){

            $alert= new Alert($ex->getMessage(),"error");

        }

    }

    public function Iniciar($idGuardian){

        if(isset($_SESSION["UserId"])){
            
            $DueñosDAO = new DueñosDAO();
            $dueño=$DueñosDAO->devolverDueñoPorId($_SESSION["UserId"]);
            $listaMascotas = $this->MascotaDAO->GetAll();
            $guardianes=new GuardianDAO();
            $guardian=$guardianes->devolverGuardianPorId($idGuardian);
            //Guardo el id en sesion para llevarlo a l metodo confirmar y mantener el usuario elegido
            $_SESSION["GuardianId"] = $guardian->getId();
            require_once(VIEWS_PATH. "DashboardDueno/Solicitud.php");
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){

        if(isset($_SESSION["DuenoId"])){


            $listaMascotas = $this->MascotaDAO->GetAll();
            $guardian = $this->GuardianDAO->devolverGuardianPorId($_SESSION["GuardianId"]);
            unset($_SESSION["GuardianId"]);

            $dueño = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);
            $mascota = $this->MascotaDAO->devolverMasctotaPorId($idMascota);
            
            $reserva = new Reserva();
            $reserva->setFecha(date("Y-m-d H:i:s"));
            $reserva->setFechaInicio($fechaIn);
            $reserva->setFechaFin($fechaOut);
            $reserva->setMascota($mascota);
            $reserva->setGuardian($guardian);
            $reserva->setDueño($dueño);
            $costo = $guardian->getCosto() * $this->calcularFecha($fechaIn,$fechaOut);
            $reserva->setCosto($costo);
            $reserva->setEstado("Pendiente");

            // NO TOCAR PORQUE SE ESTA CREANDO EL PROCEDURE

            $_SESSION["Reserva"] = serialize($reserva);
            
            $this->VerConfimacion();
        
        }
    }

    public function calcularFecha($fechaIn,$fechaOut){
        //0 indice años, 1 meses, 2 dias, 11 total de dias.
        $fecha1=date_create($fechaIn);
        $fecha2=date_create($fechaOut);    
        $intervalo=date_diff($fecha1,$fecha2);
        $tiempo=array();
        foreach($intervalo as $medida){
            $tiempo[]=$medida;
        }
        return $tiempo[11];
    }

           
}