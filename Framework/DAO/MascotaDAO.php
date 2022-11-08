<?php
namespace DAO;

use DAO\Connection;
use Models\Mascota;
use DAO\IDueñoDAO as IDueñoDAO;
use DAO\UserDAO as UserDAO;
use Exception;

class MascotaDAO{
    
    private $connection;

    public function GetAll(){

        
    }
    
    public function Add(Mascota $mascota){

        try {

            $query = "CALL agregar_mascota(:nombre, :raza, :tamaño, :idUsuario, :planVacunacion, :foto, :video);";

            $parameters["nombre"] = $mascota->getNombre();
            $parameters["raza"] = $mascota->getRaza();
            $parameters["tamaño"] = $mascota->getTamaño();
            $parameters["idUsuario"] = $_SESSION["UserId"];
            $parameters["planVacunacion"] = $mascota->getPlanVacURL();
            $parameters["foto"] = $mascota->getFotoURL();
            $parameters["video"] = $mascota->getVideoURL();

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);


            
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    public function listarRazas($especie){

        try{

            $listaRazas = array();

            $query = "SELECT 
            r.nombre_raza
            FROM
            razas r
            INNER JOIN
            especies e ON r.id_especie = e.id_especie
            where e.nombre_especie = '".$especie."';";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach($resultSet as $reg){

                array_push($listaRazas, $reg["nombre_raza"]);

            }

            return $listaRazas;

        }
        catch(Exception $ex){

        }
    }


}