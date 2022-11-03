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
            g.id_guardian,
            u.username,
            u.dni,
            u.nombre,
            u.apellido,
            u.correo,
            u.contraseña,
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

            //Falta el foreach


            return $guardianesList;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function Add(Guardian $guardian)
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


                $this->connection->ExecuteNonQuery($query);
            }

            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
