<?php
namespace Controllers;

use Models\Dueño as Dueño;
use jsonDAO\DueñosDAO as DueñosDAO;
use Models\Guardian as Guardian;
use jsonDAO\GuardianesDAO as GuardianesDAO;
use jsonDAO\MascotasDAO as MascotasDAO;
use jsonDAO\ReservasDAO as ReservasDAO;
use Models\Reserva as Reserva;

class ReservasController{
    
    private $ReservasDAO;
    private $GuardianesDAO;
    private $MascotasDAO;

    public function __construct(){

        $this->ReservasDAO = new ReservasDAO();
        $this->GuardianesDAO = new GuardianesDAO();
        $this->MascotasDAO = new MascotasDAO();
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
        
        require_once(VIEWS_PATH. "dashboardDueno/verReservas.php");
    }
    
    public function Iniciar($id){

        if(isset($_SESSION["DuenoId"])){
            
            $_SESSION["GuardianId"] = $id;
            $DueñosDAO = new DueñosDAO();
            $dueño=new Dueño();
            $dueño=$DueñosDAO->encontrarDueño($_SESSION["DuenoId"]);
            $listaMascotas = $this->MascotasDAO->GetAll();
            require_once(VIEWS_PATH. "dashboardDueno/solicitud.php");
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
                $reserva->setEstado("Pendiente.");
                
                $_SESSION["Reserva"] = serialize($reserva);
                require_once(VIEWS_PATH. "dashboardDueno/confirmarSolicitud.php");

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