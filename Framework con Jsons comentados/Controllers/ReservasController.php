<?php
namespace Controllers;


use DAO\DueñoDAO as DueñosDAO;
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

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") { //CHECKED

            $reserva=unserialize($_SESSION["ReservaTemp"]);
            unset($_SESSION["ReservaTemp"]);
            $type = "danger";
          
            try{

                if($this->ReservaDAO->crearReserva($reserva)){

                    $type = "success";
                    throw new Exception("Solicitud enviada exitosamente");

                }else{

                    throw new Exception("No se pudo crear la reserva, intente nuevamente");

                }


            }catch(Exception $ex){

                $alert = new Alert($type, $ex->getMessage());
                $this->VerReservasDueno($alert);
            }

        }else{

            header("location: ../Home");
        }
    }

    public function VerReservasDueno($alert = null){ //CHECKED

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            try{

                $listaReservas = $this->ReservaDAO->listarReservasDueno();

                if($listaReservas){
                  
                    
                    require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");

                }else{

                    throw new Exception("No hay reservas pendientes");

                }

                
            }catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                
                require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");

            }     

        }else{

            header("location: ../Home");
        }
    }

    public function VerReservasGuardian($alert = null){

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "G") {

            try{

                $listaReservas = $this->ReservaDAO->listarSolicitudesOrReservas("Aceptada");

                if($listaReservas){

                    require_once(VIEWS_PATH. "DashboardGuardian/Reservas.php");

                }else{
            
                    throw new Exception("No posee reservas");
                }

            }
            catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                
                require_once(VIEWS_PATH. "DashboardGuardian/Reservas.php");
            }  
            
        }else{

            header("location: ../Home");
        }
    }

    public function VerSolicitudesGuardian($alert = null){

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "G") {

            try{

                $listaSolicitudes = $this->ReservaDAO->listarSolicitudesOrReservas("Pendiente");

                if($listaSolicitudes){

                    require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");

                }else{

                    throw new Exception("No tiene solicitudes pendientes");
                }

            }catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");

            }

        }else{

            header("location: ../Home");
        }
    }

    public function CancelarSolicitud($id){

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            $type = "danger";

            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($id);
                $estado = $reserva->getEstado();

                if($reserva){

                    switch($estado){

                        case "Aceptada":
                            throw new Exception("No se puede cancelar la solicitud aceptada. Por favor, envie un mensaje al guardian");  
                        break;

                        case "Pendiente":

                            if($this->ReservaDAO->cancelarSolicitud($id)){

                                $type = "success";
                                throw new Exception("La reserva fue cancelada");

                            }else{
                                
                                throw new Exception("No se pudo cancelar la solicitud");
                            }
                            
                            

                        break;

                        case "Rechazado":

                            if($this->ReservaDAO->cancelarSolicitud($id)){
    
                                throw new Exception("Reserva quitada del historial");

                            }else{

                                throw new Exception("No se pudo cancelar la solicitud");
                            }
        
                        break;

                    }
 
                }else{

                    throw new Exception("No se pudo encontrar la reserva");
                }

            }catch (Exception $ex){

                $alert = new Alert($type, $ex->getMessage());
                $this->VerReservasDueno($alert);
                     
            }

        }else{

            header("location: ../Home");
        }   


    }

    public function AceptarSolicitud($idReserva){

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "G") {
        
            $type = "danger";

            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                $mascota = $this->MascotaDAO->devolverMascotaPorId($reserva->getMascota());

                if($reserva){

                    $checkTipoEstadia = $this->checkTipoEstadia($reserva, $mascota);

                    switch($checkTipoEstadia){
    
                        case 0:

                            if($this->ReservaDAO->aceptarSolicitud($idReserva)){
        
                                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                                
                                
                                //$mail= new Mail();
            
                                //$mail->enviarMail($reserva);

                                $type = "success";
                                throw new Exception("La solicitud fue confirmada con exito");
        
                            }else{

                                throw new Exception("No se pudo aceptar la solicitud. Error de servidor");

                            }            
                        break;

                        case 3:

                            if($this->ReservaDAO->aceptarSolicitud($idReserva)){
        
                                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);
                                
                                //$mail= new Mail();
            
                                //$mail->enviarMail($reserva);
                                
                               $type = "success";
                               throw new Exception("La solicitud fue confirmada con exito");

        
                            }else{

                                throw new Exception("No se pudo aceptar la solicitud. Error de servidor");

                            }            
                        break;
                        
                        case 1:          
                        throw new Exception("Raza incompatible con la que se cuida ese rango de fecha");
                        break;
    
                    }

                }else{

                    throw new Exception("No se pudo encontrar la reserva");
                }

                

            }catch(Exception $ex){

                $alert= new Alert($type, $ex->getMessage());
                $this->VerReservasGuardian($alert);

            }
        
        }else{

            header("location: ../Home");
        }  
    }

    public function RechazarSolicitud($idReserva){

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "G") {
              
            try{

                $reserva = $this->ReservaDAO->devolverReservaPorId($idReserva);

                if($reserva){

                    if($this->ReservaDAO->rechazarSolicitud($idReserva)){

                        header("location: ../Reservas/VerSolicitudesGuardian");

                    }else{

                        throw new Exception("No se pudo rechazar la solicitud");
                    }
    
                    
                }else{

                    throw new Exception("Error al encontrar la reserva");
                }

            }catch(Exception $ex){

                header("location: ../Guardianes/VistaDashboard?alert=".$ex->getMessage()."&tipo=danger");

            }

        }else{

            header("location: ../Home");
        }

    }

    public function Iniciar($idGuardian, $alert=null){

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {
            

            try{

                $guardian=$this->GuardianDAO->devolverGuardianPorId($idGuardian);              
                $listaMascotas = $this->MascotaDAO->GetAll();
    
                if($guardian){

                    if($listaMascotas){
    
                        $_SESSION["GuardianId"] = $guardian->getId();
        
                        //Guardo el id en sesion para llevarlo al metodo confirmar y mantener el usuario elegido
                        require_once(VIEWS_PATH. "DashboardDueno/Solicitud.php");
        
                    }else{
        
                        header("location: ../Mascotas/VerFiltroMascotas?alert=Registre una mascota para solicitar el cuidado de un guardian");
                    }

                }else{

                    throw new Exception("No se pudo inicar la reserva. Error al encontrar el Guardian");

                }

            }
            catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                $this->VerReservasDueno($alert);

            }
   
        }else{

            header("location: ../Home");
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            try{

                $guardian = $this->GuardianDAO->devolverGuardianPorId($_SESSION["GuardianId"]);

                unset($_SESSION["GuardianId"]);

                $mascota = $this->MascotaDAO->devolverMascotaPorId($idMascota);

                $reserva = new Reserva();
        
                $reserva->setFecha(date("Y-m-d H:i:s"));
                $reserva->setFechaInicio($fechaIn);
                $reserva->setFechaFin($fechaOut);
                $reserva->setMascota($mascota->getId());
                $reserva->setGuardian($guardian->getId());
                $reserva->setDueño($_SESSION["UserId"]);
                $costo = $guardian->getCosto() * $this->calcularFecha($fechaIn,$fechaOut);
                $reserva->setCosto($costo);
                $reserva->setEstado("Pendiente");

                switch($this->CheckSolicitud($guardian, $mascota, $reserva)){


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
            
        }else{

            header("location: ../Home");
        }
    }

    public function VistaPago($id){

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            try{

                $reserva=$this->ReservaDAO->devolverReservaPorId($id);
                
                if($reserva and $reserva->getEstado()=="Aceptada"){

                    $guardian=$this->GuardianDAO->devolverGuardianPorId($reserva->getGuardian());
                    $mascota=$this->MascotaDAO->devolverMascotaPorId($reserva->getMascota());

                    require_once(VIEWS_PATH."DashboardDueno/CuponDePago.php");
                   
                }else{

                    throw new Exception("No se pudo encontrar la reserva o no cumple con la aprobacion.");
                }
                

             }catch(Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                $this->VerReservasDueno($alert);
            }

        }else{

            header("location: ../Home");
        }   
         
    }

    public function CheckTipoEstadia($reserva, $mascota){


        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "G"){

            $resultado = 0;

            try{

                $listaReservas = $this->ReservaDAO->devolverReservasEnRango($reserva->getFechaInicio(), $reserva->getFechaFin());
                //Recorro todas las reservas que estan entre la fecha de inicio y final de la que se quiere aceptar

                if($listaReservas){

                    foreach($listaReservas as $reservaEnRango){
                        //Obtengo la mascota de cada reserva dentro del rango
                        $mascotaTemp = $this->MascotaDAO->devolverMascotaPorId($reservaEnRango->getMascota());
    
    
                        if($mascota->getRaza() != $mascotaTemp->getRaza()){
    
                            $resultado = 1;
                        }
                    }


                }else{

                    $resultado = 3;

                }  
                
                return $resultado;

            }catch(Exception $ex){

                throw $ex;
            }

        }else{

            header("location: ../Home");
        }
        
    }

    public function CheckSolicitud($guardian, $mascota, $reserva){

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){

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

        }else{

            header("location: ../Home");
        }

    }

    public function CalcularFecha($fechaIn,$fechaOut){
        //0 indice años, 1 meses, 2 dias, 11 total de dias.
        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){
            $fecha1=date_create($fechaIn);
            $fecha2=date_create($fechaOut);    
            $intervalo=date_diff($fecha1,$fecha2);
            $tiempo=array();
            foreach($intervalo as $medida){
                $tiempo[]=$medida;

            }
            return $tiempo[11];

        }else{

            header("location: ../Home");
        }

    }
         
}