<?php
namespace Controllers;

use Models\Dueño as Dueño;
use DAO\DueñoDAO as DueñosDAO;
use Models\Guardian as Guardian;
use DAO\GuardianDAO as GuardianDAO;
use DAO\MascotaDAO as MascotaDAO;
use DAO\MensajeDAO;
use DAO\ReservaDAO as ReservaDAO;
use Exception;
use Models\Reserva as Reserva;
use Models\Alert as Alert;
use Models\Mail as Mail;
use Models\Mensaje;

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

            $reserva=unserialize($_SESSION["ReservaTemp"]);
            unset($_SESSION["ReservaTemp"]);
          
            try{

                if($this->ReservaDAO->crearReserva($reserva)){

                    header("location: ../Reservas/VerReservasDueno?alert=Reserva Exitosa&tipo=success"); 

                }else{ //Le pongo el else porque a veces sigue la ejecucion aunque se agregue la reserva

                    throw new Exception("No se pudo crear la reserva, intente nuevamente");
                }

            }catch(Exception $ex){

                header("location: ../Reservas/VerReservasDueno?alert=" .$ex->getMessage(). "&tipo=danger");
            } 
        }
    }

    public function VerReservasDueno($alert = null, $tipo = null){

        if(isset($_SESSION["UserId"])){

            try{

                $listaReservas = $this->ReservaDAO->listarReservasDueno();

                require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");
                
            }catch(Exception $ex){

                header("location: ../Duenos/vistaDashboard?alert=" .$ex->getMessage(). "&tipo=danger");

            }     

        }
    }

    public function VerReservasGuardian($alert  = null){

        if(isset($_SESSION["UserId"])){

            $listaReservas = $this->ReservaDAO->listarSolicitudesOrReservas("Aceptada");
            require_once(VIEWS_PATH. "DashboardGuardian/Reservas.php");

        }
    }

    public function VerSolicitudesGuardian($alert  = null){

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
                            header("location: ../Reservas/VerReservasDueno?alert=No se puede cancelar la solicitud aceptada. Por favor, envie un mensaje al guardian&tipo=danger");   
                        break;

                        case "Pendiente":

                            if($this->ReservaDAO->cancelarReserva($id)){
    
                                header("location: ../Reservas/VerReservasDueno?alert=Cancelacion exitosa&tipo=success");
                            }
                            
                            throw new Exception("No se pudo cancelar la reserva");

                        break;

                        case "Rechazado":

                            if($this->ReservaDAO->cancelarReserva($id)){
    
                                header("location: ../Reservas/VerReservasDueno?alert=Reserva quitada del historial&tipo=success");
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
        
            $type = "danger";

            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                $guardian = $this->GuardianDAO->devolverGuardianPorId($reserva->getId());
                $mascota = $this->MascotaDAO->devolverMascotaPorId($reserva->getMascota());

                $checkTipoEstadia = $this->checkTipoEstadia($reserva, $guardian, $mascota);

                switch($checkTipoEstadia){

                    case 0:
                    if($this->ReservaDAO->aceptarSolicitud($idReserva)){

                        $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                        
                        
                        //$mail= new Mail();
    
                        //$mail->enviarMail($reserva);
                        
                        header("location: ../Reservas/VerReservasGuardian?alert=La solicitud fue confirmada con exito");
    
                    }
                    throw new Exception("No se pudo aceptar la solicitud. Error de servidor");
                    
                    break;
                    
                    

                    case 1:          
                    throw new Exception("Ya esta cuidando una mascota de la raza ".$mascota->getRaza(). " entre las fechas solicitadas. Rechazela y se le enviara un mensaje al dueño");
                    break;


                }

            }catch(Exception $ex){

                $alert= new Alert($type, $ex->getMessage());
                $this->VerSolicitudesGuardian($alert);

            }
        
    }
    }

    public function RechazarSolicitud($idReserva){

        if(isset($_SESSION["UserId"])){
        
            $mensajeDAO = new MensajeDAO();
            $mensaje = new Mensaje;
            
            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);

                if($this->ReservaDAO->rechazarSolicitud($idReserva)){


                    header("location: ../Reservas/VerSolicitudesGuardian");
                }
                throw new Exception("No se pudo rechazar la solicitud");

            }catch(Exception $ex){

                $alert= new Alert("danger", $ex->getMessage());
                echo $ex;

            }
        }

    }

    public function Iniciar($idGuardian, $alert=null){

        if(isset($_SESSION["UserId"])){
            

            try{

                $guardian=$this->GuardianDAO->devolverGuardianPorId($idGuardian);              
                $listaMascotas = $this->MascotaDAO->GetAll();
    
                if($listaMascotas){
    
                    $_SESSION["GuardianId"] = $guardian->getId();
    
                    //Guardo el id en sesion para llevarlo al metodo confirmar y mantener el usuario elegido
                    require_once(VIEWS_PATH. "DashboardDueno/Solicitud.php");
    
                }else{
    
                    header("location: ../Mascotas/VerFiltroMascotas?alert=Registre una mascota para solicitar el cuidado de un guardian");
                }
            }
            catch(Exception $ex){

                echo $ex;

            }
   
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){

        if(isset($_SESSION["UserId"])){

            try{

                $guardian = $this->GuardianDAO->devolverGuardianPorId($_SESSION["GuardianId"]);

                unset($_SESSION["GuardianId"]);
    
                $dueño = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);

                $mascota = $this->MascotaDAO->devolverMascotaPorId($idMascota);

                $reserva = new Reserva();
        
                $reserva->setFecha(date("Y-m-d H:i:s"));
                $reserva->setFechaInicio($fechaIn);
                $reserva->setFechaFin($fechaOut);
                $reserva->setMascota($mascota->getId());
                $reserva->setGuardian($guardian->getId());
                $reserva->setDueño($dueño->getId());
                $costo = $guardian->getCosto() * $this->calcularFecha($fechaIn,$fechaOut);
                $reserva->setCosto($costo);
                $reserva->setEstado("Pendiente");

                switch($this->checkSolicitud($guardian, $mascota, $reserva)){


                    case 0:

                        throw new Exception("El tamaño de su mascota no coincide con el que cuida el guardian");
                        break;

                    case 1:

                        throw new Exception("La fecha de fin tiene que ser mayor a la de inicio");
                        break;
                
                    case 2:
                        $_SESSION["ReservaTemp"] = serialize($reserva);   
                        require_once(VIEWS_PATH. "DashboardDueno/ConfirmarSolicitud.php");
                    break;
    
                }

            }catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                $this->Iniciar($guardian->getId(), $alert);

            }
            

        }
    }

    public function checkTipoEstadia($reserva, $guardian, $mascota){

        $resultado = 0;

        try{

            $listaReservas = $this->ReservaDAO->devolverReservasEnRango($reserva->getFechaInicio(), $reserva->getFechaFin());
            //Recorro todas las reservas que estan entre la fecha de inicio y final de la que se quiere aceptar

            foreach($listaReservas as $reservaEnRango){
                //Obtengo la mascota de cada reserva dentro del rango
                $mascotaTemp = $this->MascotaDAO->devolverMascotaPorId($reservaEnRango->getMascota());


                if($mascota->getRaza() == $mascotaTemp->getRaza()){

                    $resultado = 1;
                }
            }

            return $resultado;

        }catch(Exception $ex){

            throw $ex;
        }
        
    }

    public function checkSolicitud($guardian, $mascota, $reserva){

        $resultado = 0;

        if($reserva->getFechaFin() < $reserva->getFechaInicio()){

            $resultado = 1;
            
        }else{

            foreach($guardian->getTipoMascota() as $tamaño){

                if($mascota->getTamaño() == $tamaño){
    
                    $resultado = 2;
                }
            }

        }

        return $resultado;

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