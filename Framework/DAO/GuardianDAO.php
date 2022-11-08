<?php

namespace DAO;

use DAO\Connection;
use Models\Guardian as Guardian;
use Models\Usuario as Usuario;
use DAO\InterfaceDAO as InterfaceDAO;
use \Exception as Exception;

class GuardianDAO implements InterfaceDAO
{

    private $connection;

    public function GetAll()
    {

        try {

            $guardianesList = array();

            $query = "SELECT 
            g.id_usuario,
            u.username,
            u.nombre,
            u.apellido,
            u.correo,
            u.telefono,
            u.foto_perfil,
            g.dia_inicio,
            g.dia_fin,
            g.descripcion,
            g.costo_diario,
            g.foto_espacio
            FROM
            usuarios u
            INNER JOIN
            guardianes g ON g.id_usuario = u.id_usuario";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $reg){
                $guardian=new Guardian();
                $guardian->setId($reg["id_usuario"]);
                $guardian->setUsername($reg["username"]);
                $guardian->setNombre($reg["nombre"]);
                $guardian->setApellido($reg["apellido"]);
                $guardian->setCorreoelectronico($reg["correo"]);
                $guardian->setTelefono($reg["telefono"]);
                $guardian->setFotoPerfil($reg["foto_perfil"]);
                $guardian->setFechaInicio($reg["dia_inicio"]);
                $guardian->setDescripcion($reg["descripcion"]);
                $guardian->setFechaFin($reg["dia_fin"]);
                $guardian->setCosto($reg["costo_diario"]);
                $guardian->setFotoEspacioURL($reg["foto_espacio"]);
                $guardian->setTipoMascota($this->obtenerTamañosMascotas($reg["id_usuario"]));

                array_push($guardianesList,$guardian);

            }
            return $guardianesList;
        } catch (Exception $ex) {

            throw $ex;
        }
    }
    public function GetFavoritos()
    {

        try {

            $listaFavoritos = array();

            $query = "SELECT
            g.id_guardian, 
            g.id_usuario,
            u.username,
            u.nombre,
            u.apellido,
            u.correo,
            u.telefono,
            u.foto_perfil,
            g.dia_inicio,
            g.dia_fin,
            g.descripcion,
            g.costo_diario,
            g.foto_espacio
            from favoritos f
            inner join guardianes g on f.id_guardianFav=g.id_guardian
            inner join usuarios u on g.id_usuario=u.id_usuario
            inner join dueños d on f.id_dueño=d.id_dueño";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $reg){
                $guardian=new Guardian();
                $guardian->setId($reg["id_usuario"]);
                $guardian->setUsername($reg["username"]);
                $guardian->setNombre($reg["nombre"]);
                $guardian->setApellido($reg["apellido"]);
                $guardian->setCorreoelectronico($reg["correo"]);
                $guardian->setTelefono($reg["telefono"]);
                $guardian->setFotoPerfil($reg["foto_perfil"]);
                $guardian->setFechaInicio($reg["dia_inicio"]);
                $guardian->setDescripcion($reg["descripcion"]);
                $guardian->setFechaFin($reg["dia_fin"]);
                $guardian->setCosto($reg["costo_diario"]);
                $guardian->setFotoEspacioURL($reg["foto_espacio"]);
                $guardian->setTipoMascota($this->obtenerTamañosMascotas($reg["id_guardian"]));

                array_push($listaFavoritos,$guardian);

            }
            return $listaFavoritos;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function Add($guardian)
    {

        try {

            $query = "INSERT INTO 
                guardianes (id_usuario, dia_inicio, dia_fin, descripcion, costo_diario, foto_espacio) 
                values ((select id_usuario from usuarios where username = '" . $guardian->getUsername() . "'), 
                :dia_inicio, :dia_fin, :descripcion, :costo_diario, :foto_espacio)";

            $parameters["dia_inicio"] = $guardian->getFechaInicio();
            $parameters["dia_fin"] = $guardian->getFechaFin();
            $parameters["descripcion"] = $guardian->getDescripcion();
            $parameters["costo_diario"] = $guardian->getCosto();
            $parameters["foto_espacio"] = $guardian->getFotoEspacioURL();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            foreach ($guardian->getTipoMascota() as $tamaño) {

    
                $query = "INSERT INTO tamaños_x_guardianes(id_tamaño, id_guardian) 
                    VALUES ((select id_tamaño from tamaños where nombre_tamaño = '" . $tamaño . "'), 
                    (select id_guardian from guardianes g inner join usuarios u on u.id_usuario = g.id_usuario where u.username = '" . $guardian->getUsername() . "'));";


                $resultado = $this->connection->ExecuteNonQuery($query);
            }


            return $resultado;
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function devolverGuardianPorId($idGuardian){
        
        $guardian = new Guardian();
        try{
            $query = "SELECT 
        * 
        FROM usuarios u 
        inner join guardianes g 
        on u.id_usuario = g.id_usuario
        where g.id_usuario = " . $idGuardian . ";";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        
        foreach($resultSet as $reg){

            $guardian->setId($reg["id_usuario"]);
            $guardian->setUsername($reg["username"]);
            $guardian->setDni($reg["dni"]);
            $guardian->setNombre($reg["nombre"]);
            $guardian->setApellido($reg["apellido"]);
            $guardian->setCorreoelectronico($reg["correo"]);
            $guardian->setPassword($reg["password"]);
            $guardian->setTelefono($reg["telefono"]);
            $guardian->setDireccion($reg["direccion"]);
            $guardian->setFotoPerfil($reg["foto_perfil"]);
            $guardian->setTipoUsuario($reg["tipo_usuario"]);
            $guardian->setFechaInicio($reg["dia_inicio"]);
            $guardian->setFechaFin($reg["dia_fin"]);
            $guardian->setDescripcion($reg["descripcion"]);
            $guardian->setCosto($reg["costo_diario"]);
            $guardian->setFotoEspacioURL($reg["foto_espacio"]);
            $guardian->setTipoMascota($this->obtenerTamañosMascotas($reg["id_guardian"]));
            
            return $guardian;
        }
        }catch (Exception $ex) {
            throw $ex;
        }
            
                
        


    }

    public function obtenerTamañosMascotas($idGuardian){

        $listaTamaños = array();

        $query = "SELECT 
        t.nombre_tamaño
        FROM
        tamaños t
        INNER JOIN
        tamaños_x_guardianes txg ON txg.id_tamaño = t.id_tamaño
        INNER JOIN
        guardianes g ON txg.id_guardian = g.id_guardian
        INNER JOIN
        usuarios u on u.id_usuario = g.id_usuario
        WHERE g.id_usuario=".$idGuardian.";";
          

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);

        foreach ($resultSet as $reg){

            array_push($listaTamaños, $reg["nombre_tamaño"]);

        }

        return $listaTamaños;


    }
    public function grabarDisponibilidad($fechaInicio,$fechaFin,$costo){
        try{
            $query = "UPDATE guardian g
                set g.dia_inicio = :fechaInicio, g.dia_fin=:fechaFin, g.costo_diario=:costo WHERE g.id_usuario=:buscado";

               $parameters["fechaInicio"] = $fechaInicio;
               $parameters["fechaFin"] = $fechaFin;
               $parameters["costo"] = $costo;
               $parameters["buscado"] = ($_SESSION["UserId"]);
               
               $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);


        }
        catch (Exception $ex) {
            throw $ex;
        }

    }
}
