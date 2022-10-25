<?php
namespace Controllers;

use jsonDAO\DueñosDAO as DueñosDAO;
use jsonDAO\GuardianesDAO as GuardianesDAO;
use jsonDAO\MascotasDAO as MascotasDAO;
use jsonDAO\ReservasDAO as ReservasDAO;
use Models\Reserva as Reserva;

class ReservasController{
    
    private $ReservasDAO;

    public function __construct(){

        $this->ReservasDAO = new ReservasDAO();
    }

    public function Iniciar($id){

        if(isset($_SESSION["DuenoId"])){
            
            $_SESSION["GuardianId"] = $id;
            $DueñosDAO = new DueñosDAO();
            $MascotasDAO = new MascotasDAO();
            $dueño=$DueñosDAO->encontrarDueño($_SESSION["DuenoId"]);
            $listaMascotas = $MascotasDAO->GetAll();
            require_once(VIEWS_PATH. "dashboardDueno/solicitud.php");
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){
        
        
        if($_POST){

            if(isset($_SESSION["DuenoId"])){

                $GuardianesDAO = new GuardianesDAO();
                $guardian = $GuardianesDAO->encontrarGuardian($_SESSION["GuardianId"]);
                unset($_SESSION["GuardianId"]);
                
                $reserva = new Reserva();
                $reserva->setId($this->ReservasDAO->returnIdPlus());
                $reserva->setFecha(date("Y-m-d H:i:s"));
                $reserva->setFechaInicio($fechaIn);
                $reserva->setFechaFin($fechaOut);
                $reserva->setMascotaID($idMascota);
                $reserva->setGuardianID($guardian->getId());
                $reserva->setDueñoID($_SESSION["DuenoId"]);
    
                $costo = $guardian->getCosto() * 
    
            
                require_once(VIEWS_PATH. "dashboardDueno/confirmarSolicitud.php");
    
                        /*
            private $estado;
            */
            } 



        }
        

    }

           
}