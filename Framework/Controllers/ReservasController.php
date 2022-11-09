<?php
namespace Controllers;

use Models\Dueño as Dueño;
use DAO\DueñoDAO as DueñosDAO;
use Models\Guardian as Guardian;
use DAO\GuardianDAO as GuardianDAO;
use DAO\MascotaDAO as MascotaDAO;
use DAO\ReservaDAO as ReservaDAO;
use Models\Reserva as Reserva;

class ReservasController{
    
    private $ReservasDAO;
    private $GuardianesDAO;
    private $MascotasDAO;

    public function __construct(){

        $this->ReservaDAO = new ReservaDAO();
        $this->GuardianDAO = new GuardianDAO();
        $this->MascotaDAO = new MascotaDAO();
    }

    public function Add(){
        $reserva=unserialize($_SESSION["Reserva"]);
        unset($_SESSION["Reserva"]);
        $this->ReservasDAO->Add($reserva);
        $this->ListReservasView();
    }

    public function ListReservasView(){

        $listaMascotas = $this->MascotasDAO->GetAll();
        $listaGuardianes= $this->GuardianesDAO->GetAll();
        $listaReservas= $this->ReservasDAO->GetAll();
        
        require_once(VIEWS_PATH. "DashboardDueno/Reservas.php");
    }
    
    public function Iniciar($idGuardian){

        if(isset($_SESSION["UserId"])){
            
            $DueñosDAO = new DueñosDAO();
            $dueño=$DueñosDAO->devolverDueñoPorId($_SESSION["UserId"]);
            $listaMascotas = ["ejemplo1","ejemplo2","ejemplo3"];
            $guardianes=new GuardianDAO();
            $guardian=$guardianes->devolverGuardianPorId($idGuardian);
            require_once(VIEWS_PATH. "DashboardDueno/Solicitud.php");
        } 
    }

    public function Confirmar($fechaIn,$fechaOut,$idMascota){
        
        
        if($_POST){

            if(isset($_SESSION["DuenoId"])){


                $listaMascotas = $this->MascotasDAO->GetAll();

                $guardian = $this->GuardianesDAO->encontrarGuardian($_SESSION["GuardianId"]);
                unset($_SESSION["GuardianId"]);
                
                $reserva = new Reserva();
                $reserva->setId($this->ReservasDAO->returnIdPlus());
                $reserva->setFecha(date("Y-m-d H:i:s"));
                $reserva->setFechaInicio($fechaIn);
                $reserva->setFechaFin($fechaOut);
                $reserva->setMascotaID((int)$idMascota);
                $reserva->setGuardianID($guardian->getId());
                $reserva->setDueñoID($_SESSION["DuenoId"]);
                
                $costo = $guardian->getCosto() * $this->calcularFecha($fechaIn,$fechaOut);
                $reserva->setCosto($costo);
                $reserva->setEstado("Pendiente");
                
                $_SESSION["Reserva"] = serialize($reserva);
                require_once(VIEWS_PATH. "DashboardDueno/ConfirmarSolicitud.php");

            } 
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