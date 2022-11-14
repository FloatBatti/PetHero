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
    private $GuardianDAO;
    private $MascotaDAO;
    private $DueñoDAO;


    public function __construct(){

        $this->ReservaDAO = new ReservaDAO();
        $this->GuardianDAO = new GuardianDAO();
        $this->MascotaDAO = new MascotaDAO();
        $this->DueñoDAO = new DueñosDAO();
    }

    public function Add(){

        if(isset($_SESSION["UserId"])){

            $reserva=unserialize($_SESSION["Reserva"]);
            unset($_SESSION["Reserva"]);
          
            try{

                if($this->ReservaDAO->crearReserva($reserva)){

                    header("location: ../Reservas/VerReservasDueno");   
                }

                throw new Exception("No se pudo crear la reserva, intente nuevamente");

            }catch(Exception $ex){

                $alert=new Alert("danger", $ex->getMessage());
            } 
        }
    }

    public function VerConfimacion()
    {
        if(isset($_SESSION["UserId"])){

            $reserva=unserialize($_SESSION["Reserva"]);
            require_once(VIEWS_PATH. "DashboardDueno/ConfirmarSolicitud.php");

        }
    }

    public function VerReservasDueno($alert = null, $type = null){

        if(isset($_SESSION["UserId"])){

            $listaReservas = $this->ReservaDAO->listarReservasDueno();

            require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");

        }
    }

    public function VerReservasGuardian(){

        if(isset($_SESSION["UserId"])){

            $listaReservas = $this->ReservaDAO->listarSolicitudesOrReservas("Aceptada");
            require_once(VIEWS_PATH. "DashboardGuardian/Reservas.php");

        }
    }

    public function VerSolicitudesGuardian(){

        if(isset($_SESSION["UserId"])){

            $listaSolicitudes = $this->ReservaDAO->listarSolicitudesOrReservas("Pendiente");
            require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");
        }
    }

    public function CancelarSolicitud($id){

        if(isset($_SESSION["UserId"])){

            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($id);
                $estado = $reserva->getEstado();

                if($reserva){

                    switch($estado){

                        case "Aceptada":
                            header("location: ../Reservas/VerReservasDueno?alert=No se puede cancelar la solicitud aceptada. Por favor, envie un mensaje al guardian&type=danger");   
                        break;

                        case "Pendiente":

                            if($this->ReservaDAO->cancelarReserva($id)){
    
                                header("location: ../Reservas/VerReservasDueno?alert=Cancelacion exitosa. Se le avisara al guardian&type=success");
                            }
        
                            throw new Exception("No se pudo cancelar la reserva");

                        break;

                        case "Rechazado":

                            if($this->ReservaDAO->cancelarReserva($id)){
    
                                header("location: ../Reservas/VerReservasDueno?alert=Reserva quitada del historial&type=success");
                            }
        
                            throw new Exception("No se pudo cancelar la reserva");

                        break;

                    }
 
                }

                throw new Exception("Error al encontrar al usuario");

            }catch (Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                $this->VerReservasDueno($alert);
                
            }

        }   


    }

    public function AceptarSolicitud($idReserva){

        if(isset($_SESSION["UserId"])){
        
            try{

                if($this->ReservaDAO->aceptarSolicitud($idReserva)){

                    $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                    
                   /*
                    $mail= new Mail();

                    $mail->enviarMail($reserva);
                    */

                    header("location: ../Reservas/VerReservasGuardian");

                }
                throw new Exception("No se pudo aceptar la solicitud");

            }catch(Exception $ex){

                $alert= new Alert($ex->getMessage(),"error");

                throw $ex;

            }
        
    }
    }


    public function RechazarSolicitud($idReserva){

        if(isset($_SESSION["UserId"])){
        
        try{

            if($this->ReservaDAO->rechazarSolicitud($idReserva)){

                header("location: ../Reservas/VerSolicitudesGuardian");
            }
            throw new Exception("No se pudo rechazar la solicitud");

        }catch(Exception $ex){

            $alert= new Alert("danger", $ex->getMessage());

        }
    }

    }

    public function Iniciar($idGuardian){

        if(isset($_SESSION["UserId"])){
            

            $dueño=$this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);
            $listaMascotas = $this->MascotaDAO->GetAll();
            $guardian=$this->GuardianDAO->devolverGuardianPorId($idGuardian);
            //Guardo el id en sesion para llevarlo a l metodo confirmar y mantener el usuario elegido
            $_SESSION["GuardianId"] = $guardian->getId();
            require_once(VIEWS_PATH. "DashboardDueno/Solicitud.php");
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){

        if(isset($_SESSION["UserId"])){

            $listaMascotas = $this->MascotaDAO->GetAll();
            $guardian = $this->GuardianDAO->devolverGuardianPorId($_SESSION["GuardianId"]);
            unset($_SESSION["GuardianId"]);

            $dueño = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);
            $mascota = $this->MascotaDAO->devolverMascotaPorId($idMascota);
            
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