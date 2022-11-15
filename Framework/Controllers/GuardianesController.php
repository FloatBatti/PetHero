<?php

namespace Controllers;

use DAO\GuardianDAO as GuardianDAO;
use DAO\MascotaDAO;
use Models\Guardian as Guardian;
use DAO\UserDAO as UserDAO;
use Models\Alert as Alert;
use Exception;
use Models\Archivos;

class GuardianesController
{

    private $GuardianDAO;
    private $UserDAO;
    

    public function __construct()
    {
        $this->GuardianDAO = new GuardianDAO();
        $this->UserDAO = new UserDAO();
    }



    public function vistaGuardianes($fechaMin=null, $fechaMax= null, $nombreGuardian=null)
    {

        if (isset($_SESSION["UserId"])) {

            $listaGuardianes = array();

            try{

                if($_POST){

                    $resultado = $this->filtrarGuardianes($fechaMin,$fechaMax,$nombreGuardian);

                    if($resultado){

                        if(is_array($resultado)){

                            $listaGuardianes = $resultado;
                        }
                        else{
    
                            header("location: ../Guardianes/VerPerfilGuardian?idGuardian=".$resultado->getId());
                            
                        }

                    }else{

                        throw new Exception("No se encuentra el guardian filtrado");
                    }
                    
                }else{
    
                    $listaGuardianes = $this->GuardianDAO->GetAll();
                }
                
                require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");

            }catch(Exception $ex){

                
                header("location: ../Guardianes/vistaGuardianes");
            }

        }
    }

    public function VistaRegistro($alert = null)
    {
        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH . "RegistroGuardian.php");
        }
    }

    public function RegistrarDisponibilidad($alert = null)
    {
        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH . "RegistroDisponibilidad.php");
        }
    }

    public function Add($inicio, $fin, $sizes, $costo, $fotoEspacio, $descripcion)
    {

        if(isset($_SESSION["UserId"])){

            $guardian =  unserialize($_SESSION["GuardTemp"]);

            unset($_SESSION["GuardTemp"]);

            $guardian->setFechaInicio($inicio);
            $guardian->setFechaFin($fin);

            foreach ($sizes as $size) {
                $guardian->pushTipoMascota($size);
            }

            $guardian->setCosto($costo);

            $nameImg = $guardian->getUsername() ."-". $fotoEspacio["name"];

            $guardian->setFotoEspacioURL($nameImg);
            $guardian->setDescripcion($descripcion);


            try{

                if($this->UserDAO->AddGuardian($guardian)){

                    Archivos::subirArch("fotoEspacio", $fotoEspacio, "EspaciosGuardianes/", $guardian->getUsername());
                    header("location: ../Home?alert=Perfil creado con exito. Puede loguearse&tipo=success");
                }
                
                throw new Exception("Error de servidor, intente nuevamente"); //Mensaje que funciona como alert


            }catch (Exception $ex){

                $alert = new Alert("danger", $ex->getMessage());
                $this->RegistrarDisponibilidad($alert);

            }
        }
    }

    public function Registro($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword, $fotoPerfil=null)
    {

        if(isset($_SESSION["UserId"])){
            $guardian = new Guardian();
            $guardian->setUsername($username);
            $guardian->setDni($dni);
            $guardian->setNombre($nombre);
            $guardian->setApellido($apellido);
            $guardian->setCorreoelectronico($mail);
            $guardian->setTelefono($telefono);
            $guardian->setDireccion($direccion);
            
            if(empty($fotoPerfil["name"])){
                
                $nameImg="perfil-default.png";

            }else{

                $nameImg = $guardian->getUsername() ."-". $fotoPerfil["name"];

            }               
            
            $guardian->setFotoPerfil($nameImg);


            $type = null;

            try{

                if (!$this->UserDAO->checkUsuario($username, $dni, $mail)) {

                    if ($password == $rePassword) {
                       
                        Archivos::subirArch("fotoPerfil", $fotoPerfil, "FotosUsuarios/", $guardian->getUsername());
        
                        $guardian->setPassword($password);
        
                        $_SESSION["GuardTemp"] = serialize($guardian);
        
                        header("location: ../Guardianes/RegistrarDisponibilidad");
        
                    }

                    $type = "danger";
                    throw new Exception("Las contraseñas no coinciden");
                  
                }

                $type = "danger";
                throw new Exception("El usuario ya existe");

                
        
            }catch (Exception $ex){

                $alert = new Alert($type, $ex->getMessage());
                $this->VistaRegistro($alert);

            }

        }
        
    }
    
    public function VerPerfilGuardian($idGuardian){
        
        if(isset($_SESSION["UserId"])){
            
            try{

                $guardian=$this->GuardianDAO->devolverGuardianPorId($idGuardian);
                $tamaños=$this->GuardianDAO->obtenerTamañosMascotas($guardian->getId());
                $fotopuntaje=$this->fotoValoracion($guardian->getCalificacion());
                require_once(VIEWS_PATH . "DashboardDueno/PerfilGuardian.php");


            }catch(Exception $ex){

                header("location: ../Duenos/vistaDashboard?alert=" .$ex->getMessage(). "&tipo=danger");
            }
   
        }
    }
    public function editarDisponibilidad(){

        if(isset($_SESSION["UserId"])){

            try{

                $guardian=$this->GuardianDAO->devolverGuardianPorId($_SESSION["UserId"]);
                
                if($guardian){
                    
                    require_once(VIEWS_PATH . "/DashboardGuardian/EditarDisponibilidad.php");

                }
                throw new Exception("Error al cargar usuario");
            
            }catch(Exception $ex){
                $alert=new Alert("danger", $ex->getMessage());
                $this->vistaDashboard();
            }

        }
    }

    public function actualizarDisponibilidad($fechaInicio,$fechaFin,$sizes,$costo,$fotoUrl,$descripcion){

        if(isset($_SESSION["UserId"])){
        
            try {

                if($this->GuardianDAO->grabarDisponibilidad($fechaInicio,$fechaFin,$sizes,$costo,$fotoUrl,$descripcion)){

                    header("location: ../Guardianes/vistaDashboard");
                }
                throw new Exception("No se pudieron actulizar los datos");
                  
            } catch (Exception $ex) {
                
                $alert = new Alert("warning", $ex->getMessage());
                header("location: ../Guardianes/vistaDashboard?=". $alert);
            }
            
        }
    }

    public function EditarPerfil(){
        
        if(isset($_SESSION["UserId"])){
        
            $type = null;

            try{

                $usuario = $this->GuardianDAO->devolverGuardianPorId($_SESSION["UserId"]);

                if($usuario){

                    require_once(VIEWS_PATH . "DashboardGuardian/EditarPerfil.php");
                }
                $type = "alert alert-primary";
                throw new Exception("Error al editar perfil");

            }catch(Exception $ex){

                $alert=new Alert($type,$ex->getMessage());
                $this->vistaDashboard();
            }   

        }
    }

    public function vistaDashboard(){
        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH . "DashboardGuardian/Dashboard.php");
        }
    }

    public function vistaSolicitudes(){
        if(isset($_SESSION["UserId"])){

            require_once(VIEWS_PATH. "DashboardGuardian/Solicitudes.php");
        }
    }
    
    public function filtrarGuardianes($fechaMin, $fechaMax, $nombreGuardian){

        if(isset($_SESSION["UserId"])){
      
            $resultado= null;
           
            try{

                if(empty($nombreGuardian)){

                    $resultado = $this->GuardianDAO->getGuardianesFiltradosFecha($fechaMin,$fechaMax);
                     
                }else{

                    $resultado = $this->GuardianDAO->getGuardianPorNombre($nombreGuardian);
                    
                }

                return $resultado;
                
            }catch(Exception $ex){

                //throw $ex;
                throw new Exception("Error en el filtrado. Intente mas tarde");
            }
        }

    }
    public function fotoValoracion($puntaje){
        
        if($puntaje>=1 and $puntaje<2){

            return "1_stars.png";
        }
        else if($puntaje>=2 and $puntaje<3){

            return "2_stars.png";

        }
        else if($puntaje>=3 and $puntaje<4){

            return "3_stars.png";

        }
        else if($puntaje>=4 and $puntaje<4.7){

            return "4_stars.png";

        }
        else{

            return "5_stars.png";
        }
        
        
    }
}

