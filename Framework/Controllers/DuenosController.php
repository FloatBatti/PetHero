<?php

namespace Controllers;

use DAO\DueñoDAO as DueñoDAO;
use DAO\GuardianDAO;
use Models\Dueño as Dueño;
use DAO\UserDAO as UserDAO;
use Exception;
use Models\Archivos;
use Models\Alert;


class DuenosController
{

    private $DueñoDAO;
    private $UserDAO;

    public function __construct()
    {

        $this->DueñoDAO = new DueñoDAO();
        $this->UserDAO = new UserDAO();
    }

    /* FUNCIONES DE REGISTRO */

    public function VistaRegistro($alert = null) //CHECKED
    {
        require_once(VIEWS_PATH . "RegistroDueño.php");
    }

    public function Add($username, $nombre, $apellido, $dni, $mail, $telefono, $direccion, $password, $rePassword, $fotoPerfil) //CHECKED
    {

        
        $dueño = new Dueño();
        $dueño->setUsername($username);
        $dueño->setDni($dni);
        $dueño->setNombre($nombre);
        $dueño->setApellido($apellido);
        $dueño->setCorreoelectronico($mail);
        $dueño->setTelefono($telefono);
        $dueño->setDireccion($direccion);

        $nameImg = $dueño->getUsername() ."-". $fotoPerfil["name"];

        $dueño->setFotoPerfil($nameImg);

        
        try{

            if(!$this->UserDAO->checkUsuario($username,$dni, $mail)){ 

                if($password == $rePassword){
    
                    $dueño->setPassword($password);

                    if($this->UserDAO->addDueño($dueño)){

                        Archivos::subirArch("fotoPerfil", $fotoPerfil, "FotosUsuarios/", $dueño->getUsername());

                        $this->DueñoDAO->Add($dueño);
                        
                        header("location: ../Home?alert=Perfil creado con exito. Puede loguearse&tipo=success");

                    }else{

                        throw new Exception("Error de servidor, intente nuevamente"); 
                    }

                    
    
                }else{

                    throw new Exception("Las contraseñas no coinciden"); 
                }
                
                
            
            }else{

                throw new Exception("El usuario ya existe");

            }
            

        }catch (Exception $ex){
            
            $this->VistaRegistro($ex->getMessage());
    
        }   
            
    }

    /* FUNCIONES VARIAS */

    public function VistaEditarPerfil() //CHECKED
    {

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){

            try{

                $usuario = $this->DueñoDAO->devolverDueñoPorId($_SESSION["UserId"]);

                if($usuario){
    
                    require_once(VIEWS_PATH . "/DashboardDueno/EditarPerfil.php");
                    
                }else{

                    throw new Exception("Error al intentar editar el pefil");
                }
    
            
            }catch(Exception $ex){
    
                header("location: ../Home?alert=" .$ex->getMessage()."&tipo=danger");
            }        

        }else{

            header("location: ../Home");
        }
        
        
    }

    public function VistaDashboard($alert=null, $tipo=null) //CHECKED
    {
        
        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){

            require_once(VIEWS_PATH . "DashboardDueno/Dashboard.php");

        }else{

            header("location: ../Home");
        }
    }
    
    public function VerMensajes(){ //CHECKED
        
        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){

            require_once(VIEWS_PATH. "/DashboardDueno/VerMensajes.php");

        }else{

            header("location: ../Home");
        }
        
    }

    /* PARTE QUE INTERACTUA CON LOS GUARDIANES */

    public function VistaGuardianes($alert=null, $fechaMin=null, $fechaMax=null, $nombreGuardian=null) //CHECKED
    {
            
        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            $guardianDAO = new GuardianDAO();

            $listaGuardianes = array();
            $resultBuscado = null;
            
            try{

                if($_POST){

                    $resultBuscado= $this->FiltrarGuardianes($fechaMin, $fechaMax, $nombreGuardian);
                }

                if($resultBuscado){

                    if(is_array($resultBuscado)){

                        $listaGuardianes = $resultBuscado;
                        require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");
                        
                    }else{

                        header("location: ../Duenos/VerPerfilGuardian?idGuardian=".$resultBuscado->getId());
                        
                    }

                }else{

                    $listaGuardianes = $guardianDAO->GetAll();
                    require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");
                }
                    
                
            }catch(Exception $ex){

                $alert = new Alert("danger",$ex->getMessage());
                $listaGuardianes = $guardianDAO->GetAll();
                require_once(VIEWS_PATH . "DashboardDueno/Guardianes.php");
                
            }

             
        }else{

            header("location: ../Home");
        }

       
    }

    public function VerPerfilGuardian($idGuardian){ //CHECKED
        
        $guardianDAO = new GuardianDAO(); 
        
        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){
            
            try{

                $guardian=$guardianDAO ->devolverGuardianPorId($idGuardian);
                $tamaños=$guardianDAO ->obtenerTamañosMascotas($guardian->getId());

                require_once(VIEWS_PATH . "DashboardDueno/PerfilGuardian.php");


            }catch(Exception $ex){
       
                header("location: ../Duenos/VistaDashboard?alert=".$ex->getMessage()."&tipo=danger");
            }
   
        }else{

            header("location: ../Home");
            
        }
    }

    public function VistaFavoritos($alert = null) //CHECKED
    {

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            $guardianesDAO = new GuardianDAO();

            try{

                $listaGuardianes = $guardianesDAO->getFavoritos();
                require_once(VIEWS_PATH . "DashboardDueno/Favoritos.php");

            }catch(Exception $ex){

                header("location: ../Duenos/VistaDashboard?alert=".$ex->getMessage()."&tipo=danger");
            }


        }else{

            header("location: ../Home");
        }
    }

    public function AgregarFavorito($id){ //CHECKED

        $usuarioDAO=new UserDAO();

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {

            try{

                if($usuarioDAO->addFavorito($id)){

                    header("location: ../Duenos/VistaFavoritos");

                }
                throw new Exception("El guardian ya esta en favoritos");

            }catch(Exception $ex){

                $alert=new Alert("danger", $ex->getMessage());        
                $this->vistaFavoritos($alert);
            }

        }else{

            header("location: ../Home");
        }
    }

    public function BorrarFavorito($idGuardian) //CHECKED
    {
        $usuarioDAO = new UserDAO();

        if (isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D") {
        
            try{
                
                if($usuarioDAO->deleteFavorito($idGuardian)){

                    header("location: ../Duenos/VistaFavoritos");

                }else{

                   throw new Exception("Error al eliminar el guardian");
                }
                
                

            }catch (Exception $ex){

                $alert=new Alert("danger", $ex->getMessage());       
                $this->vistaFavoritos($alert);
            }

        }else{

            header("location: ../Home");
        }
    }  

    public function FiltrarGuardianes($fechaMin, $fechaMax, $nombreGuardian){ //CHECKED
 
        $guardianDAO = new GuardianDAO();

        if(isset($_SESSION["UserId"]) and $_SESSION["Tipo"] == "D"){
      
            $resultado= null;
           
            try{

                if(empty($nombreGuardian) and (!empty($fechaMin) and !empty($fechaMax))){

                    $resultado = $guardianDAO->getGuardianesFiltradosFecha($fechaMin,$fechaMax);

                    if($resultado){

                        return $resultado;

                    }else{

                        throw new Exception("No se encontró un guardian para esas fechas");
                    }
                               
                }else{

                    $resultado = $guardianDAO->getGuardianPorNombre($nombreGuardian);

                    if($resultado){

                        return $resultado;

                    }else{

                        throw new Exception("No se encontró el guardian buscado");
                    }
    
                }

            }catch(Exception $ex){

                throw $ex;
            }

        }else{

            header("location: ../Home");
        }
    }  
}
