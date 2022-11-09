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

        try{

            $listaMascotas = array();

            $query = "SELECT 
            m.id_mascota,
            m.nombre,
            r.nombre_raza,
            t.nombre_tamaño,
            m.plan_vacunacion,
            m.foto_mascota,
            m.video
            FROM mascotas m
            inner join 
            tamaños t on t.id_tamaño = m.id_tamaño
            inner join
            razas r on r.id_raza = m.id_raza
            where id_dueño = (select id_dueño from dueños d inner join usuarios u on u.id_usuario = d.id_usuario where u.id_usuario =". $_SESSION["UserId"] . ");";
        
        
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $reg){

                $mascota = new Mascota();

                $mascota->setId($reg["id_mascota"]);
                $mascota->setNombre($reg["nombre"]);
                $mascota->setRaza($reg["nombre_raza"]);
                $mascota->setTamaño($reg["nombre_tamaño"]);
                $mascota->setPlanVacURL($reg["plan_vacunacion"]);
                $mascota->setFotoURL($reg["foto_mascota"]);
                $mascota->setVideoURL($reg["video"]);
                
                array_push($listaMascotas, $mascota);


            }

            return $listaMascotas;




        }catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    public function devolverMasctotaPorId($idMascota){

        $mascota = new Mascota();

        try{

            $query = "SELECT 
            m.id_mascota,
            m.nombre,
            r.nombre_raza,
            t.nombre_tamaño,
            m.plan_vacunacion,
            m.foto_mascota,
            m.video
            FROM mascotas m
            inner join 
            tamaños t on t.id_tamaño = m.id_tamaño
            inner join
            razas r on r.id_raza = m.id_raza
            where m.id_mascota =". $idMascota . ";";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $reg){

                $mascota->setId($reg["id_mascota"]);
                $mascota->setNombre($reg["nombre"]);
                $mascota->setRaza($reg["nombre_raza"]);
                $mascota->setTamaño($reg["nombre_tamaño"]);
                $mascota->setPlanVacURL($reg["plan_vacunacion"]);
                $mascota->setFotoURL($reg["foto_mascota"]);
                $mascota->setVideoURL($reg["video"]);
                
                
            }

            return $mascota;

        }catch(Exception $ex) {

            throw $ex;

        }




    }
    
    public function Add(Mascota $mascota){

        try {


            $query = "CALL agregar_mascota(:nombre, :raza, :tamano, :idUsuario, :planVacunacion, :foto, :video)";

            $parameters["nombre"] = $mascota->getNombre();
            $parameters["raza"] = $mascota->getRaza();
            $parameters["tamano"] = $mascota->getTamaño();
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